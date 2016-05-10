jQuery(document).ready(function($){
    //Colorbox Popup Load for E-Catalogs
    //$('a.catalog-popup-link img').attr('href');

    $('div.view-e-catalogs-view ul li.views-row').each(function(){
        $(this).find('a.catalog-popup-link').colorbox({ href:$(this).find('a.catalog-popup-link').attr('href'),iframe: true, width: "90%", height: "95%" });
    });
});

