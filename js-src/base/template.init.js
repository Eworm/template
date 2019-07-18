jQuery(function()
{

    const template = window.template || {};

    for (let i in template)
    {

        if ('init' in template[i]) {
            template[i].init();
        }

    }

});
