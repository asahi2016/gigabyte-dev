(function ($) {
    $(document).ready(function($) {

        $('#cboxLoadingOverlay').remove();
        $('#cboxLoadingGraphic').remove();

        if($('form#submission-node-form .image-preview img').length > 0){
            // open the other colorBox
            $('form#submission-node-form').show();
            var submission_form = $('form#submission-node-form').parent('div.submission-form').html();
            $.colorbox({
                html : submission_form,
                onClosed:function() {
                    $.cookie("submissionNode", '');
                }
            });
            $('div.submission-form form#submission-node-form').hide();
        }

        $('a.submission-image').click(function(){
            var ref = $(this).parents('div.group:first-child').html();
            var table_class = $(this).parents('div.group table:first-child').attr('class').split(' ')[0];
            var nodeId = $(this).parents('div.group table:first-child').attr('nodeId');

            $('.'+table_class).colorbox({rel:'"'+table_class+'"', slideshow:true, html: ref,
                height: "auto",
                slideshowAuto : false,
                onComplete:function(){
                    var position = $.colorbox.element().attr('nodeIndex');
                    var submission =  $('table#subContent'+nodeId+position).parent('div.group').html();
                    $("#cboxLoadedContent").html(submission);
                    $("#cboxLoadedContent").find('table input[rel="reply"]').show();
                    $("#cboxLoadedContent").find('table input[rel="admin-reply"]').show();
                    $("#cboxLoadedContent").find('table input[rel="approve"]').show();
                    $.colorbox.resize();
            }

            });
            $('.'+table_class).colorbox.resize();
        });

        $(document).on('click','input[rel="reply"]',function(){
                var submission_node = $(this).attr('submission-node');
                var submission_iteration = $(this).attr('submission-iteration');
                var submission_title = $(this).attr('submission-title');
                $.cookie("submissionNode", submission_node, {
                    expires : 10,           //expires in 10 days
                });
                $.colorbox({onClosed:function(){
                    // open the other colorBox
                    $('form#submission-node-form').show();
                    var submission_form = $('form#submission-node-form').parent('div.submission-form').html();
                    $.colorbox({
                        html : submission_form,
                        onClosed:function() {
                            $.cookie("submissionNode", '');
                        }
                    });
                    $('div.submission-form form#submission-node-form').hide();

                }});
                $.colorbox.close();
        });


        $(document).on('click','input[rel="admin-reply"]',function(){
            var submission_node = $(this).attr('submission-node');
            var submission_iteration = $(this).attr('submission-iteration');
            var submission_title = $(this).attr('submission-title');
            $('div.admin-comment').find('input#submission-node').val(submission_node);
            $('div.admin-comment').find('input#submission-iteration').val(submission_iteration);

            $.colorbox({onClosed:function(){

                // open the other colorBox
                $('.admin-comment-container div.admin-comment').find('h1').text(submission_title);
                $('.admin-comment-container div.admin-comment').show();
                var comment_form = $('.admin-comment-container').html();
                $('.admin-comment-container div.admin-comment').hide();

                $.colorbox({
                    html : comment_form,
                });
                $.colorbox.resize();

            }});
            $.colorbox.close();
        });


        $('input#new-submission').click(function(){
            $('form#submission-node-form').show();
            var submission_form = $('form#submission-node-form').parent('div.submission-form').html();
            $.colorbox({ html: submission_form});
            $('div.submission-form form#submission-node-form').hide();
            $.colorbox.resize();
        });


        $(document).on('click', '#submit-comment', function (event) {
            event.preventDefault();
            var submission_node = $('input[type="hidden"]#submission-node').val();
            var submission_iteration = $('input[type="hidden"]#submission-iteration').val();
            var comment = $('#cboxLoadedContent textarea').val();
            $.post(
                Drupal.settings.gigabyte.baseUrl + '/partner/update/submission/comment',
                {
                    node: submission_node,
                    iteration: submission_iteration,
                    comment: comment,
                    ajax: true
                },
                function (response) {
                    alert('Comment Updated Successfully');
                    $.colorbox.close();
                    window.location.reload();
                }
            );

        });

        $(document).on('click','input[rel="approve"]',function(){
            var submission_node = $(this).attr('submission-node');
            var submission_iteration = $(this).attr('submission-iteration');
            $.post(
                Drupal.settings.gigabyte.baseUrl + '/partner/update/submission/status',
                {
                    node: submission_node,
                    iteration: submission_iteration,
                    status: 'approve',
                    ajax: true
                },
                function (response) {
                    alert('Submission status approved Successfully');
                    $.colorbox.close();
                    window.location.reload();
                }
            );
        });
    });
})(jQuery);
