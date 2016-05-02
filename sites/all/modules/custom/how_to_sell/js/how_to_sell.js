(function ($) {
    $(document).ready(function($) {

        $('#edit-term-node-tid-depth-all').remove();

        $('#views-exposed-form-how-to-sell-amd-page .description').remove();
        $('#views-exposed-form-how-to-sell-view-page .description').remove();

        setInterval(function(){
            $(".view-how-to-sell-view .field-content a").colorbox({ iframe: true, width: "90%", height: "95%" });
        },600);

        $(".view-how-to-sell-view .field-content a").colorbox({ iframe: true, width: "90%", height: "95%" });

        setInterval(function(){
            $(".view-how-to-sell-amd .field-content a").colorbox({ iframe: true, width: "90%", height: "95%" });
        },600);

        $(".view-how-to-sell-amd .field-content a").colorbox({ iframe: true, width: "90%", height: "95%" });

        setInterval(function(){
            $('#views-exposed-form-how-to-sell-amd-page .description').remove();
        },10);

        setInterval(function(){
            $('#views-exposed-form-how-to-sell-view-page .description').remove();
        },10);

    });
})(jQuery);
