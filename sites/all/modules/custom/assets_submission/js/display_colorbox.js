(function ($) {
    $(document).ready(function($) {
        $('div.user-submissions').click(function(){
            var ref = $(this).find('div.group:first-child').html();
            var table_class = $(this).find('div.group:first-child').attr('class');
            var position = null;
            $('.'+table_class).colorbox({rel:'"'+table_class+'"', slideshow:true, html: ref, onLoad:function(){
                position = $('.'+table_class).colorbox.element().index() + 1;
            },
            onComplete:function () {
                var submission =  $(this).find('table.subContent'+position).parent('div.group').html();
                $("#cboxLoadedContent").html(submission);
            }

            });
            $('.'+table_class).colorbox.resize();
        });

        $('input#new-submission').click(function(){
            $('form#submission-node-form').show();
            var submission_form = $('form#submission-node-form').parent('div.submission-form').html();
            $.colorbox({ html: submission_form,
                onClosed: function () {
                    $('form#submission-node-form').hide();
                    window.location.href = gigabyte.baseUrl + '/view/submissions'
                }
            });
            $.colorbox.resize();
        });
    });
})(jQuery);
