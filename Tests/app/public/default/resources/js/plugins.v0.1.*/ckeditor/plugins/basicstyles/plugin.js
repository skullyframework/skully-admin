/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.plugins.add( 'basicstyles', {
	lang: 'af,ar,bg,bn,bs,ca,cs,cy,da,de,el,en,en-au,en-ca,en-gb,eo,es,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,ug,uk,vi,zh,zh-cn', // %REMOVE_LINE_CORE%
	icons: 'bold,italic,underline,strike,subscript,superscript', // %REMOVE_LINE_CORE%
	hidpi: true, // %REMOVE_LINE_CORE%
	init: function( editor ) {
		var order = 0;
		// All buttons use the same code to register. So, to avoid
		// duplications, let's use this tool function.
		var addButtonCommand = function( buttonName, buttonLabel, commandName, styleDefiniton ) {
				// Disable the command if no definition is configured.
				if ( !styleDefiniton )
					return;

				var style = new CKEDITOR.style( styleDefiniton ),
					forms = contentForms[ commandName ];

				// Put the style as the most important form.
				forms.unshift( style );

				// Listen to contextual style activation.
				editor.attachStyleStateChange( style, function( state ) {
					!editor.readOnly && editor.getCommand( commandName ).setState( state );
				});

				// Basic styling on lists. (#8741)
				// Create the command that can be used to apply the style.
				var command = new CKEDITOR.styleCommand( style, {
					contentForms: forms
				} );
				var execCopy = command.exec;
				command.exec = function(editor) {
					// If element is contained within an li, change that li's format too. (#8741)
					var selection = editor.getSelection();
					var ranges = selection.getRanges();
					var enterMode = editor.config.enterMode;

					var iterator = ranges.createIterator();
					// Iterate per range
					while ( ( range = iterator.getNextRange() ) ) {
						// Iterate per element each range
						var elIterator = range.createIterator();
						elIterator.enlargeBr = enterMode != CKEDITOR.ENTER_BR;
						var counter = 0;
						while ( ( el = elIterator.getNextParagraph(enterMode == CKEDITOR.ENTER_P ? 'p' : 'div') ) ) {
							// If element in li
							// Do by get list of parents, then change li parent.
							var parents = el.getParents(true);
							for ( var j = 0; j < parents.length; j++ ) {
								var parent = parents[j];
								// set color of li
								if (parent.$.tagName == 'LI') {
									// Checks if currently selected text is all text within li element.
									// if is start or end element, get text based on startOffset and endOffset
									var text = el.getText();
									if (counter == 0) {
										//chrome and mozilla have different behavior in range selection
										//mozilla will have 2 kind of startOffset & end Offset
										//for text without html element, mozilla will return the offset as number of characters but
										//for selection which ended at a html closing tag, mozilla will return the number of nodes before and no need to substr
										//so, we need to check the node type before doing substr
										//fortunately chrome will return exactly nodeType 3 and offset as number of characters before.
										if(range.startContainer.$.nodeType == CKEDITOR.NODE_TEXT) {// nodeType == DOMText
											text = range.startContainer.$.textContent.substr(range.startOffset);
											if(parent.getText().indexOf(range.startContainer.$.textContent) == 0) text = parent.getText();
										}
										else{
											// 1. <span >first</span><span> row</span> --> the startContainer is only "first"
											// so we need to check if the startContainer position is 0, set text = parent.getText();
											text = range.startContainer.$.textContent;
											if(parent.getText().indexOf(range.startContainer.$.textContent) == 0) text = parent.getText();

											//sometimes in mozilla range.startContainer.$.textContent return especially the same as parent.getText() with startOffset > 0
											if(range.startOffset > 0){
												var startOffset = 0;
												for(var it=0; it<range.startOffset; it++){
													startOffset += range.startContainer.$.childNodes[it].textContent.length;
												}
												text = text.substr(startOffset);
											}
										}
										// somehow if there is only one item there could be a possibility where
										// startController value is wrong.
										// To trigger this bug:
										// 1. Select half-way of first li, all the way to the end.
										// 2. Click "bold".
										// 3. Click "bold" again (to unbold).
										// 4. Then choose the whole first li.
										// 5. Click "bold". Somehow startContainer would choose only part of the whole
										//    text.
										// To fix this, create a condition of:
										// 1. First element selected.
										// 2. No next element.
										// 3. Both range.startOffset and endOffset are 0.
										// In that condition, text should be whole el text.
										if (elIterator._.nextNode == null && range.endOffset == 0 && range.startOffset == 0) {
											text = el.getText();
										}
									}
									if (elIterator._.nextNode == null && range.endOffset > 0) {
										if(range.endContainer.$.nodeType == CKEDITOR.NODE_TEXT){
											text = range.endContainer.$.textContent.substr(0, range.endOffset);
											if(parent.getText().lastIndexOf(range.endContainer.$.textContent) == parent.getText().length-range.endContainer.$.textContent.length) text = parent.getText();
										}
										else{
											text = range.endContainer.$.textContent;
											if(parent.getText().lastIndexOf(range.endContainer.$.textContent) == parent.getText().length-range.endContainer.$.textContent.length) text = parent.getText();
//										var endOffset = 0;
//										for(var it=0; it<range.endOffset; it++){
//											endOffset += range.endContainer.$.childNodes[it].textContent.length;
//										}
//										text = text.substr(0, endOffset);
										}
									}
									if (parent.getText() == text) {
										if ( this.state == CKEDITOR.TRISTATE_OFF ) {
											var normalize = function(theParent, style, value) {
												// Wrap the content of this list item with normal font-weight,
												// so we can have bolded list with non-bold content.
												var normalizer =  new CKEDITOR.dom.element('span');
												normalizer.addClass('_normalizer');
												normalizer.setStyle(style, value);
												normalizer.appendHtml(theParent.getHtml());
												theParent.setHtml(normalizer.getHtml());
											}
											// li can only have bold and italic styles
											if (style._.definition == CKEDITOR.config.coreStyles_bold) {
												parent.setStyle('font-weight', 'bold');
//												normalize(parent, 'fontWeight', 'normal');
											}
											else if (style._.definition == CKEDITOR.config.coreStyles_italic) {
												parent.setStyle('font-style', 'italic');
//												normalize(parent, 'fontStyle', 'normal');
											}
										}
										else if ( this.state == CKEDITOR.TRISTATE_ON ) {
											var denormalize = function(theParent) {
												// Remove the normalizer span element.
												var els = theParent.getElementsByTag('span');
												var normalizer = null;
												for ( var id = 0; id < els.$.length; id++) {
													var el = els.getItem(id);
													if (el.hasClass('_normalizer')) {
														normalizer = el;
														break;
													}
												}
												if (normalizer) {
													// get all content from normalizer, then replace normalizer with it.
//													debugger;
													var innerHTML = normalizer.getHtml();
													theParent.setHtml(theParent.getHtml().replace(normalizer.getOuterHtml(), innerHTML));
												}
											}
											if (style._.definition == CKEDITOR.config.coreStyles_bold) {
												parent.removeStyle('font-weight');
//												denormalize(parent);
											}
											else if (style._.definition == CKEDITOR.config.coreStyles_italic) {
												parent.removeStyle('font-style');
//												denormalize(parent);
											}
										}
									}
									break;
								}
							}
							counter++;
						}
					}
					execCopy.call(this, editor);
				}

				editor.addCommand( commandName, command);

			// Register the button, if the button plugin is loaded.
				if ( editor.ui.addButton ) {
					editor.ui.addButton( buttonName, {
						label: buttonLabel,
						command: commandName,
						toolbar: 'basicstyles,' + ( order += 10 )
					});
				}
			};

		var contentForms = {
				bold: [
					'strong',
					'b',
					[ 'span', function( el ) {
						var fw = el.styles[ 'font-weight' ];
						return fw == 'bold' || +fw >= 700;
					} ]
				],

				italic: [
					'em',
					'i',
					[ 'span', function( el ) {
						return el.styles[ 'font-style' ] == 'italic';
					} ]
				],

				underline: [
					'u',
					[ 'span', function( el ) {
						return el.styles[ 'text-decoration' ] == 'underline';
					} ]
				],

				strike: [
					's',
					'strike',
					[ 'span', function( el ) {
						return el.styles[ 'text-decoration' ] == 'line-through';
					} ]
				],

				subscript: [
					'sub'
				],

				superscript: [
					'sup'
				]
			},
			config = editor.config,
			lang = editor.lang.basicstyles;

		addButtonCommand( 'Bold', lang.bold, 'bold', config.coreStyles_bold );
		addButtonCommand( 'Italic', lang.italic, 'italic', config.coreStyles_italic );
		addButtonCommand( 'Underline', lang.underline, 'underline', config.coreStyles_underline );
		addButtonCommand( 'Strike', lang.strike, 'strike', config.coreStyles_strike );
		addButtonCommand( 'Subscript', lang.subscript, 'subscript', config.coreStyles_subscript );
		addButtonCommand( 'Superscript', lang.superscript, 'superscript', config.coreStyles_superscript );

		editor.setKeystroke( [
			[ CKEDITOR.CTRL + 66 /*B*/, 'bold' ],
			[ CKEDITOR.CTRL + 73 /*I*/, 'italic' ],
			[ CKEDITOR.CTRL + 85 /*U*/, 'underline' ]
			] );
	}
});

// Basic Inline Styles.

/**
 * The style definition that applies the **bold** style to the text.
 *
 *		config.coreStyles_bold = { element: 'b', overrides: 'strong' };
 *
 *		config.coreStyles_bold = {
 *			element: 'span',
 *			attributes: { 'class': 'Bold' }
 *		};
 *
 * @cfg
 * @member CKEDITOR.config
 */
CKEDITOR.config.coreStyles_bold = { element: 'strong', overrides: 'b' };

/**
 * The style definition that applies the *italics* style to the text.
 *
 *		config.coreStyles_italic = { element: 'i', overrides: 'em' };
 *
 *		CKEDITOR.config.coreStyles_italic = {
 *			element: 'span',
 *			attributes: { 'class': 'Italic' }
 *		};
 *
 * @cfg
 * @member CKEDITOR.config
 */
CKEDITOR.config.coreStyles_italic = { element: 'em', overrides: 'i' };

/**
 * The style definition that applies the <u>underline</u> style to the text.
 *
 *		CKEDITOR.config.coreStyles_underline = {
 *			element: 'span',
 *			attributes: { 'class': 'Underline' }
 *		};
 *
 * @cfg
 * @member CKEDITOR.config
 */
CKEDITOR.config.coreStyles_underline = { element: 'u' };

/**
 * The style definition that applies the <strike>strike-through</strike> style to the text.
 *
 *		CKEDITOR.config.coreStyles_strike = {
 *			element: 'span',
 *			attributes: { 'class': 'StrikeThrough' },
 *			overrides: 'strike'
 *		};
 *
 * @cfg
 * @member CKEDITOR.config
 */
CKEDITOR.config.coreStyles_strike = { element: 's', overrides: 'strike' };

/**
 * The style definition that applies the subscript style to the text.
 *
 *		CKEDITOR.config.coreStyles_subscript = {
 *			element: 'span',
 *			attributes: { 'class': 'Subscript' },
 *			overrides: 'sub'
 *		};
 *
 * @cfg
 * @member CKEDITOR.config
 */
CKEDITOR.config.coreStyles_subscript = { element: 'sub' };

/**
 * The style definition that applies the superscript style to the text.
 *
 *		CKEDITOR.config.coreStyles_superscript = {
 *			element: 'span',
 *			attributes: { 'class': 'Superscript' },
 *			overrides: 'sup'
 *		};
 *
 * @cfg
 * @member CKEDITOR.config
 */
CKEDITOR.config.coreStyles_superscript = { element: 'sup' };
