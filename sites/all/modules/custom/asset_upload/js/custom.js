jQuery(document).ready(function($){
/*    $('.assets-upload-display table:first').DataTable({
        'paging':true
    });
    $(document).on('ready','.assets-upload-display table:first',function(){
        $(this).DataTable({
            'paging':true
        });
    });*/
    $('.assets-preview-image').colorbox();
    $('.field-name-field-upload-jpg .field-label').html('Download:');
    $('.assets-upload-display img.file-icon').hide();
});