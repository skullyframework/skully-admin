jQuery.extend( jQuery.fn.dataTableExt.oSort, {
	"date-euro-pre": function ( a ) {
//		dd/mm/YYYY hh:mm or dd/mm/YYYY
		if ($.trim(a) != '') {
			var frDatea = $.trim(a).split(' ');
			var frDatea2 = frDatea[0].split('/');
			if (frDatea[1] != null) {
				var frTimea = frDatea[1].split(':');
				var x = (frDatea2[2] + frDatea2[1] + frDatea2[0] + frTimea[0] + frTimea[1]) * 1;
			}
			else {
				var x = (frDatea2[2] + frDatea2[1] + frDatea2[0]) * 1;
			}
		} else {
			var x = 10000000000000; // = l'an 1000 ...
		}

		return x;
	},

	"date-euro-asc": function ( a, b ) {
		return a - b;
	},

	"date-euro-desc": function ( a, b ) {
		return b - a;
	}
} );