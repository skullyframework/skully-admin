/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

(function() {
	function addCombo( editor, comboName, styleType, lang, entries, defaultLabel, styleDefinition, order ) {
		var config = editor.config,
			style = new CKEDITOR.style( styleDefinition );

		// Gets the list of fonts from the settings.
		var names = entries.split( ';' ),
			values = [];

		// Create style objects for all fonts.
		var styles = {};
		for ( var i = 0; i < names.length; i++ ) {
			var parts = names[ i ];

			if ( parts ) {
				parts = parts.split( '/' );

				var vars = {},
					name = names[ i ] = parts[ 0 ];

				vars[ styleType ] = values[ i ] = parts[ 1 ] || name;

				styles[ name ] = new CKEDITOR.style( styleDefinition, vars );
				styles[ name ]._.definition.name = name;
			} else
				names.splice( i--, 1 );
		}

		editor.ui.addRichCombo( comboName, {
			label: lang.label,
			title: lang.panelTitle,
			toolbar: 'styles,' + order,
			allowedContent: style,
			requiredContent: style,

			panel: {
				css: [ CKEDITOR.skin.getPath( 'editor' ) ].concat( config.contentsCss ),
				multiSelect: false,
				attributes: { 'aria-label': lang.panelTitle }
			},

			init: function() {
				this.startGroup( lang.panelTitle );

				for ( var i = 0; i < names.length; i++ ) {
					var name = names[ i ];

					// Add the tag entry to the panel list.
					this.add( name, styles[ name ].buildPreview(), name );
				}
			},

			onClick: function( value ) {
				editor.focus();
				editor.fire( 'saveSnapshot' );
				var enterMode = editor.config.enterMode;

				var style = styles[ value ];

				// If element is contained within an li, change that li's style too. (#8741)
				var selection = editor.getSelection();
				var ranges = selection.getRanges();

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

				editor[ this.getValue() == value ? 'removeStyle' : 'applyStyle' ]( style );
				editor.fire( 'saveSnapshot' );
			},

			onRender: function() {
				editor.on( 'selectionChange', function( ev ) {
					var currentValue = this.getValue();

					var elementPath = ev.data.path,
						elements = elementPath.elements;

					// For each element into the elements path.
					for ( var i = 0, element; i < elements.length; i++ ) {
						element = elements[ i ];

						// Check if the element is removable by any of
						// the styles.
						for ( var value in styles ) {
							if ( styles[ value ].checkElementMatch( element, true ) ) {
								if ( value != currentValue )
									this.setValue( value );
								return;
							}
						}
					}

					// If no styles match, just empty it.
					this.setValue( '', defaultLabel );
				}, this );
			}
		});
	}

	CKEDITOR.plugins.add( 'font', {
		requires: 'richcombo',
		lang: 'af,ar,bg,bn,bs,ca,cs,cy,da,de,el,en,en-au,en-ca,en-gb,eo,es,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,ug,uk,vi,zh,zh-cn', // %REMOVE_LINE_CORE%
		init: function( editor ) {
			var config = editor.config;

			addCombo( editor, 'Font', 'family', editor.lang.font, config.font_names, config.font_defaultLabel, config.font_style, 30 );
			addCombo( editor, 'FontSize', 'size', editor.lang.font.fontSize, config.fontSize_sizes, config.fontSize_defaultLabel, config.fontSize_style, 40 );
		}
	});
})();

/**
 * The list of fonts names to be displayed in the Font combo in the toolbar.
 * Entries are separated by semi-colons (`';'`), while it's possible to have more
 * than one font for each entry, in the HTML way (separated by comma).
 *
 * A display name may be optionally defined by prefixing the entries with the
 * name and the slash character. For example, `'Arial/Arial, Helvetica, sans-serif'`
 * will be displayed as `'Arial'` in the list, but will be outputted as
 * `'Arial, Helvetica, sans-serif'`.
 *
 *		config.font_names =
 *			'Arial/Arial, Helvetica, sans-serif;' +
 *			'Times New Roman/Times New Roman, Times, serif;' +
 *			'Verdana';
 *
 *		config.font_names = 'Arial;Times New Roman;Verdana';
 *
 * @cfg {String} [font_names=see source]
 * @member CKEDITOR.config
 */
CKEDITOR.config.font_names = 'Arial/Arial, Helvetica, sans-serif;' +
	'Comic Sans MS/Comic Sans MS, cursive;' +
	'Courier New/Courier New, Courier, monospace;' +
	'Georgia/Georgia, serif;' +
	'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
	'Tahoma/Tahoma, Geneva, sans-serif;' +
	'Times New Roman/Times New Roman, Times, serif;' +
	'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
	'Verdana/Verdana, Geneva, sans-serif';

/**
 * The text to be displayed in the Font combo is none of the available values
 * matches the current cursor position or text selection.
 *
 *		// If the default site font is Arial, we may making it more explicit to the end user.
 *		config.font_defaultLabel = 'Arial';
 *
 * @cfg {String} [font_defaultLabel='']
 * @member CKEDITOR.config
 */
CKEDITOR.config.font_defaultLabel = '';

/**
 * The style definition to be used to apply the font in the text.
 *
 *		// This is actually the default value for it.
 *		config.font_style = {
 *			element:		'span',
 *			styles:			{ 'font-family': '#(family)' },
 *			overrides:		[ { element: 'font', attributes: { 'face': null } } ]
 *     };
 *
 * @cfg {Object} [font_style=see example]
 * @member CKEDITOR.config
 */
CKEDITOR.config.font_style = {
	element: 'span',
	styles: { 'font-family': '#(family)' },
	overrides: [ {
		element: 'font', attributes: { 'face': null }
	}]
};

/**
 * The list of fonts size to be displayed in the Font Size combo in the
 * toolbar. Entries are separated by semi-colons (`';'`).
 *
 * Any kind of "CSS like" size can be used, like `'12px'`, `'2.3em'`, `'130%'`,
 * `'larger'` or `'x-small'`.
 *
 * A display name may be optionally defined by prefixing the entries with the
 * name and the slash character. For example, `'Bigger Font/14px'` will be
 * displayed as `'Bigger Font'` in the list, but will be outputted as `'14px'`.
 *
 *		config.fontSize_sizes = '16/16px;24/24px;48/48px;';
 *
 *		config.fontSize_sizes = '12px;2.3em;130%;larger;x-small';
 *
 *		config.fontSize_sizes = '12 Pixels/12px;Big/2.3em;30 Percent More/130%;Bigger/larger;Very Small/x-small';
 *
 * @cfg {String} [fontSize_sizes=see source]
 * @member CKEDITOR.config
 */
CKEDITOR.config.fontSize_sizes = '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;72/72px';

/**
 * The text to be displayed in the Font Size combo is none of the available
 * values matches the current cursor position or text selection.
 *
 *		// If the default site font size is 12px, we may making it more explicit to the end user.
 *		config.fontSize_defaultLabel = '12px';
 *
 * @cfg {String} [fontSize_defaultLabel='']
 * @member CKEDITOR.config
 */
CKEDITOR.config.fontSize_defaultLabel = '';

/**
 * The style definition to be used to apply the font size in the text.
 *
 *		// This is actually the default value for it.
 *		config.fontSize_style = {
 *			element:		'span',
 *			styles:			{ 'font-size': '#(size)' },
 *			overrides:		[ { element :'font', attributes: { 'size': null } } ]
 *		};
 *
 * @cfg {Object} [fontSize_style=see example]
 * @member CKEDITOR.config
 */
CKEDITOR.config.fontSize_style = {
	element: 'span',
	styles: { 'font-size': '#(size)' },
	overrides: [ {
		element: 'font', attributes: { 'size': null }
	}]
};
