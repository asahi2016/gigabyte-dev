(function ($) {
    $(document).ready(function($) {
        
        $('a.submission-image').click(function(){
            var ref = $(this).parents('div.group:first-child').html();
            var table_class = $(this).parents('div.group table:first-child').attr('class').split(' ')[0];
            var nodeId = $(this).parents('div.group table:first-child').attr('nodeId');

            $('.'+table_class).colorbox({rel:'"'+table_class+'"', slideshow:true, html: ref,
                height: "auto",
                slideshowAuto : false,
                onComplete:function(){
                    var position = $.colorbox.element().attr('nodeIndex');
                    $('table#subContent'+nodeId+position +'input[rel="reply"]').show();
                    $('table#subContent'+nodeId+position +'input[rel="admin-reply"]').show();
                    $('table#subContent'+nodeId+position +'input[rel="approve"]').show();
                    var submission =  $('table#subContent'+nodeId+position).parent('div.group').html();
                    $("#cboxLoadedContent").html(submission);
                    $("#cboxLoadedContent").find('table input[rel="reply"]').show();
                    $.colorbox.resize();
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
                //$.colorbox.resize();

               // $.colorbox.({height: "auto"});

                $('div.submission-form form#submission-node-form').hide();

        });

        $(document).on('click','input[rel="admin-reply"]',function(){
             $('.admin-comment').colorbox();
             $('.admin-comment').colorbox.resize();
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
