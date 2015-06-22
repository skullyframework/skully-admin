/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.plugins.add( 'presets', {
	requires: 'dialog',
	icons: 'presets', // %REMOVE_LINE_CORE%
	init: function( editor ) {
		var command = editor.addCommand( 'presets', new CKEDITOR.dialogCommand( 'presets' ) );
		command.modes = { wysiwyg:1,source:1 };
		command.canUndo = false;
		command.readOnly = 1;

		editor.ui.addButton && editor.ui.addButton( 'Presets', {
			label: "Presets",
			command: 'presets',
			toolbar: 'presets'
		});

		CKEDITOR.dialog.add( 'presets', this.path + 'dialogs/presets.js' );
	}
});
