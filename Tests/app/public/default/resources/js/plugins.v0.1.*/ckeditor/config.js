/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

/* see http://ckeditor.com/latest/samples/plugins/toolbar/toolbar.html for example */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,menu,contextmenu,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,link,list,liststyle,magicline,maximize,pagebreak,pastetext,pastefromword,preview,print,removeformat,selectall,showblocks,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,undo,wsc';
  config.toolbar = [
    { name: 'document',	items: ['Source', 'Preview', 'Print'] },
    { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'editing', items: [ 'Find', 'Replace', 'SelectAll', 'Scayt' ] },
    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
    { name: 'links', items: [ 'Link', 'Unlink' ] },
    { name: 'insert', items: [ 'Image', 'Smiley', 'SpecialChar' ] },
    { name: 'styles', items: [ 'Format' ] },
    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    { name: 'about' }
  ];

  //setting up kcfinder
  config.filebrowserBrowseUrl 		= _config.baseUrl + _config.publicDir + _config.theme + '/resources/js/plugins/ckeditor/plugins/kcfinder/browse.php?type=files';
  config.filebrowserImageBrowseUrl 	= _config.baseUrl + _config.publicDir + _config.theme + '/resources/js/plugins/ckeditor/plugins/kcfinder/browse.php?type=images';
  config.filebrowserUploadUrl 		= _config.baseUrl + _config.publicDir + _config.theme + '/resources/js/plugins/ckeditor/plugins/kcfinder/upload.php?type=files';
  config.filebrowserImageUploadUrl 	= _config.baseUrl + _config.publicDir + _config.theme + '/resources/js/plugins/ckeditor/plugins/kcfinder/upload.php?type=images';
};
