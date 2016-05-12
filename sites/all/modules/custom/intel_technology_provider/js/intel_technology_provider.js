(function ($) {
    $(document).ready(function($) {

         $('#terms-link').click(function() {
           var html =  $('#term-conditions').html();
           $.colorbox({type:'inline', html:html});
         });

         $('a.root-term').click(function () {
             var subterms = $('#term-'+$(this).attr('rel')).html();
             $.colorbox({html:subterms,width: "1000px",height: "400px"});
         });
    });
})(jQuery);