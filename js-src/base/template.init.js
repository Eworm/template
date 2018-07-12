jQuery(function()
{

	var template = window.template || {};

	for (var i in template)
	{

	    if ('init' in template[i]) {
	        template[i].init();
	    }

	}

});
