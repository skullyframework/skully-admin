/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.dialog.add( 'presets', function( editor ) {
	return {
		title: "Presets / Text Replacements",
		minWidth: 390,
		minHeight: 230,
		contents: [
			{
				id: 'tab1',
				label: '',
				title: '',
				expand: true,
				padding: 0,
				elements: [
					{
						type: 'html',
						html: '<style type="text/css">' +
							'.cke_about_container' +
							'{' +
							'color:#000 !important;' +
							'padding:0px 10px 0;' +
							'margin-top:0px' +
							'}' +
							'.cke_about_container p' +
							'{' +
							'margin: 0 0 10px;' +
							'}' +
							'.cke_about_container a' +
							'{' +
							'cursor:pointer !important;' +
							'color:#00B2CE !important;' +
							'text-decoration:underline !important;' +
							'}' +
							'.cke_about_title' +
							'{' +
							'font-weight: bold !important;' +
							'font-size: 18px !important;' +
							'margin-bottom: 5px !important;' +
							'}' +
							'</style>' +
							'<div class="cke_about_container">' +
							'<div class="cke_about_title">You may enter any of the following presets to have them replaced upon delivery.</div>'+
							"%subject% : This email's subject<br />"+
							"%name% : Subscriber's name<br />"+
							"%first_name% : Subscriber's first name<br />"+
							"%email% : Subscriber's email<br />"+
							"%format% : Email format (Plain text or HTML)<br />"+
							"%unsubscribe% : Unsubscription link (to add in hyperlink, simply put this into URL field)<br />"+
							"%subscribe% : Link to subscription page (to add in hyperlink, simply put this into URL field)<br />"+
							"%date% : Date this email being sent<br />"+
							"%web_version_url% : URL to web page version of this mailout (similar to the url of the page destination when you click on \"View html in new window\" link).<br />"+
							"<br />"+
							"Additionally, you can display any custom field variables set up in subscribers > custom fields<br />"+
							"i.e. if you have \"Age joined\" custom field setup, then putting \"%Age Joined%\" in your template will display subscriber's Age joined field."+
							'</div>'
					}
				]
			}
		],
		buttons: [ CKEDITOR.dialog.cancelButton ]
	};
});