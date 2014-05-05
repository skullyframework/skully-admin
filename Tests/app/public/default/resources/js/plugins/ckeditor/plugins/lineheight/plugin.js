/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
(function() {
	function addCombo( editor, comboName, styleType, lang, entries, defaultLabel, styleDefinition, order ) {
		var config = editor.config,
			style = new CKEDITOR.style( styleDefinition );

		// Gets the list of line heights from the settings.
		var names = entries.split( ';' ),
			values = [];

		// Create style objects for all line heights.
		var styles = {};
		for ( var i = 0; i < names.length; i++ ) {
			var parts = names[ i ];

			if ( parts ) {
				parts = parts.split( '/' );

				// In here, change names from (key;value) to (key).
				var vars = {},
					name = names[ i ] = parts[ 0 ];

				vars[ styleType ] = values[ i ] = parts[ 1 ] || name;

				styles[ name ] = new CKEDITOR.style( styleDefinition, vars );
				styles[ name ]._.definition.name = name;
			} else
				names.splice( i--, 1 );
		}

		editor.ui.addRichCombo( comboName, {
			label: "Line height",
			title: "The line height",
			toolbar: 'styles,' + order,

			// panel code below is required to style up the combo box options.
			panel: {
				css: [ CKEDITOR.skin.getPath( 'editor' ) ].concat( config.contentsCss ),
				multiSelect: false,
				attributes: { 'aria-label': lang.panelTitle }
			},

			onClick: function( value ) {
				// When clicking on a value.
				editor.focus();
				editor.fire( 'saveSnapshot' );

				// Get a style with key = value e.g. '8' to get '8px'.
				var style = styles[ value ];

				editor[ this.getValue() == value ? 'removeStyle' : 'applyStyle' ]( style );
				editor.fire( 'saveSnapshot' );
			},

			init: function() {
				// Preparing line height options
				this.startGroup( "Line Height" );

				for ( var i = 0; i < names.length; i++ ) {
					var name = names[ i ];

					// Add the tag entry to the panel list.
					this.add( name, styles[ name ].buildPreview(), name );
				}
			},

			onKeyup: function(value) {
				// Set line height by typing
				editor.focus();
				editor.fire( 'saveSnapshot' );

				var style = styles[ value ];
				if (style == null) {
					style = new CKEDITOR.style({
						element: 'div',
						styles: { 'line-height': (value.replace('%', ''))/100 }
					});
				}

				editor['applyStyle' ]( style );
				editor.fire( 'saveSnapshot' );
			},

			onRender: function() {
				editor.on( 'selectionChange', function( ev ) {
					var elementPath = ev.data.path,
						elements = elementPath.elements;

					// for each element, if found a paragraph (using 'div' in this project), get its line-height, then set the combo box.
					// Paragraph element is NOT always the second to last div since user can edit source directly.
					// To get paragraph element, traverse each parent until a div element found.
					var ptag = 'P';
					if (editor.config.enterMode == CKEDITOR.ENTER_DIV) {
						ptag = 'DIV';
					}
					for(var i=0; i<elements.length; i++) {
						if (elements[i].$.tagName == ptag) {
							var lineHeight = elements[i].getStyle('line-height');
//							console.log("lineheight is " + lineHeight);
							if (!isNaN(parseFloat(lineHeight)) && isFinite(lineHeight)) {
								this.setValue(lineHeight, Math.round(lineHeight*100)+'%');
								break;
							}
							else {
								this.setValue('normal', 'normal');
							}
						}
					}
				}, this );
			}
		});
	}

	CKEDITOR.plugins.add( 'lineheight', {
		requires: 'richcombo',
		init: function( editor ) {
			var config = editor.config;

			addCombo( editor, 'LineHeight', 'lineHeight', "Line Height", config.sizes, config.defaultLabel, config.lineHeight_style, 30 );
		}
	});
})();

/**
 * The text to be displayed in the Font combo is none of the available values
 * matches the current cursor position or text selection.
 *
 * @cfg {String} [font_defaultLabel='']
 * @member CKEDITOR.config
 */
CKEDITOR.config.defaultLabel = '';


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
CKEDITOR.config.sizes = 'normal/normal;100%/1.00;125%/1.25;150%/1.50;175%/1.75;200%/2.00;225%/2.25;250%/2.50';

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
CKEDITOR.config.defaultLabel = '';

CKEDITOR.config.lineHeight_style = {
	element: 'div', // Change this according to config.
	styles: { 'line-height': '#(lineHeight)' }
};