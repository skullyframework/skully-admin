/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.plugins.add( 'format', {
	requires: 'richcombo',
	lang: 'af,ar,bg,bn,bs,ca,cs,cy,da,de,el,en,en-au,en-ca,en-gb,eo,es,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,ug,uk,vi,zh,zh-cn', // %REMOVE_LINE_CORE%
	init: function( editor ) {
		if ( editor.blockless )
			return;

		var config = editor.config,
			lang = editor.lang.format;

		// Gets the list of tags from the settings.
		var tags = config.format_tags.split( ';' );

		// Create style objects for all defined styles.
		var styles = {},
			stylesCount = 0,
			allowedContent = [];
		for ( var i = 0; i < tags.length; i++ ) {
			var tag = tags[ i ];
			var style = new CKEDITOR.style( config[ 'format_' + tag ] );
			if ( !editor.filter.customConfig || editor.filter.check( style ) ) {
				stylesCount++;
				styles[ tag ] = style;
				styles[ tag ]._.enterMode = editor.config.enterMode;
				allowedContent.push( style );
			}
		}

		// Hide entire combo when all formats are rejected.
		if ( stylesCount === 0 )
			return;

		editor.ui.addRichCombo( 'Format', {
			label: lang.label,
			title: lang.panelTitle,
			toolbar: 'styles,20',
			allowedContent: allowedContent,

			panel: {
				css: [ CKEDITOR.skin.getPath( 'editor' ) ].concat( config.contentsCss ),
				multiSelect: false,
				attributes: { 'aria-label': lang.panelTitle }
			},

			init: function() {
				this.startGroup( lang.panelTitle );

				for ( var tag in styles ) {
					var label = lang[ 'tag_' + tag ];

					// Add the tag entry to the panel list.
					this.add( tag, styles[ tag ].buildPreview( label ), label );
				}
			},

			onClick: function( value ) {
				editor.focus();
				editor.fire( 'saveSnapshot' );

				var style = styles[ value ],
					elementPath = editor.elementPath();

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
									parent.setStyles(style._.definition.styles);
								}
								break;
							}
						}
						counter++;
					}
				}

				editor[ style.checkActive( elementPath ) ? 'removeStyle' : 'applyStyle' ]( style );

				// Save the undo snapshot after all changes are affected. (#4899)
				setTimeout( function() {
					editor.fire( 'saveSnapshot' );
				}, 0 );
			},

			onRender: function() {
				editor.on( 'selectionChange', function( ev ) {

					var currentTag = this.getValue(),
						elementPath = ev.data.path,
						isEnabled = !editor.readOnly && elementPath.isContextFor( 'p' );

					// Disable the command when selection path is "blockless".
					this[ isEnabled ? 'enable' : 'disable' ]();

					if ( isEnabled ) {

						for ( var tag in styles ) {
							if ( styles[ tag ].checkActive( elementPath ) ) {
								if ( tag != currentTag )
									this.setValue( tag, editor.lang.format[ 'tag_' + tag ] );
								return;
							}
						}

						// If no styles match, just empty it.
						this.setValue( '' );
					}
				}, this );
			}
		});
	}
});

/**
 * A list of semi colon separated style names (by default tags) representing
 * the style definition for each entry to be displayed in the Format combo in
 * the toolbar. Each entry must have its relative definition configuration in a
 * setting named `'format_(tagName)'`. For example, the `'p'` entry has its
 * definition taken from `config.format_p`.
 *
 *		config.format_tags = 'p;h2;h3;pre';
 *
 * @cfg {String} [format_tags='p;h1;h2;h3;h4;h5;h6;pre;address;div']
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_tags = 'p;h1;h2;h3;h4;h5;h6;pre;address;div';

/**
 * The style definition to be used to apply the `'Normal'` format.
 *
 *		config.format_p = { element: 'p', attributes: { 'class': 'normalPara' } };
 *
 * @cfg {Object} [format_p={ element: 'p' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_p = { element: 'p' };

/**
 * The style definition to be used to apply the `'Normal (DIV)'` format.
 *
 *		config.format_div = { element: 'div', attributes: { 'class': 'normalDiv' } };
 *
 * @cfg {Object} [format_div={ element: 'div' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_div = { element: 'div' };

/**
 * The style definition to be used to apply the `'Formatted'` format.
 *
 *		config.format_pre = { element: 'pre', attributes: { 'class': 'code' } };
 *
 * @cfg {Object} [format_pre={ element: 'pre' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_pre = { element: 'pre' };

/**
 * The style definition to be used to apply the `'Address'` format.
 *
 *		config.format_address = { element: 'address', attributes: { 'class': 'styledAddress' } };
 *
 * @cfg {Object} [format_address={ element: 'address' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_address = { element: 'address' };

/**
 * The style definition to be used to apply the `'Heading 1'` format.
 *
 *		config.format_h1 = { element: 'h1', attributes: { 'class': 'contentTitle1' } };
 *
 * @cfg {Object} [format_h1={ element: 'h1' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_h1 = { element: 'h1' };

/**
 * The style definition to be used to apply the `'Heading 2'` format.
 *
 *		config.format_h2 = { element: 'h2', attributes: { 'class': 'contentTitle2' } };
 *
 * @cfg {Object} [format_h2={ element: 'h2' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_h2 = { element: 'h2' };

/**
 * The style definition to be used to apply the `'Heading 3'` format.
 *
 *		config.format_h3 = { element: 'h3', attributes: { 'class': 'contentTitle3' } };
 *
 * @cfg {Object} [format_h3={ element: 'h3' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_h3 = { element: 'h3' };

/**
 * The style definition to be used to apply the `'Heading 4'` format.
 *
 *		config.format_h4 = { element: 'h4', attributes: { 'class': 'contentTitle4' } };
 *
 * @cfg {Object} [format_h4={ element: 'h4' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_h4 = { element: 'h4' };

/**
 * The style definition to be used to apply the `'Heading 5'` format.
 *
 *		config.format_h5 = { element: 'h5', attributes: { 'class': 'contentTitle5' } };
 *
 * @cfg {Object} [format_h5={ element: 'h5' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_h5 = { element: 'h5' };

/**
 * The style definition to be used to apply the `'Heading 6'` format.
 *
 *		config.format_h6 = { element: 'h6', attributes: { 'class': 'contentTitle6' } };
 *
 * @cfg {Object} [format_h6={ element: 'h6' }]
 * @member CKEDITOR.config
 */
CKEDITOR.config.format_h6 = { element: 'h6' };
