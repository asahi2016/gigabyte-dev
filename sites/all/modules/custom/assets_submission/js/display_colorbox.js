(function ($) {
    $(document).ready(function($) {
        $('a.submission-image').click(function(){
            var ref = $(this).parents('div.group:first-child').html();
            var table_class = $(this).parents('div.group table:first-child').attr('class');
            var nodeId = $(this).parents('div.group table:first-child').attr('nodeId');
            var position = null;

            $('.'+table_class).colorbox({rel:'"'+table_class+'"', slideshow:true, html: ref,
                height: "auto",
                onLoad:function(){
                position = $('.'+table_class).colorbox.element().index() + 1;
            },
            onComplete:function () {
                $(this).parents('div.group').find('table#subContent'+nodeId+position +'input[rel="reply"]').show();
                var submission =  $(this).parents('div.group').find('table#subContent'+nodeId+position).parent('div.group').html();
                $("#cboxLoadedContent").html(submission);
                $("#cboxLoadedContent").find('table input[rel="reply"]').show();
            }

            });
            $('.'+table_class).colorbox.resize();
        });

        $(document).on('click','input[rel="reply"]',function(){
                var submission_node = $(this).attr('submission-node');
                $.cookie("submissionNode", submission_node, {
                    expires : 10,           //expires in 10 days
                });

                $('form#submission-node-form').show();
                var submission_form = $('form#submission-node-form').parent('div.submission-form').html();
                $('#cboxLoadedContent').html('');
                $('#cboxLoadedContent').html(submission_form);

               // $.colorbox.({height: "auto"});

                $('div.submission-form form#submission-node-form').hide();

        });


        $('input#new-submission').click(function(){
            $('form#submission-node-form').show();
            var submission_form = $('form#submission-node-form').parent('div.submission-form').html();
            $.colorbox({ html: submission_form,
                onClosed: function () {
                    $('form#submission-node-form').hide();
                }
            });
            $('div.submission-form form#submission-node-form').hide();
            $.colorbox.resize();
        });
    });
})(jQuery);
