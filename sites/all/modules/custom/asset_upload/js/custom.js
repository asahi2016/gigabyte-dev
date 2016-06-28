jQuery(document).ready(function($){
/*    $('.assets-upload-display table:first').DataTable({
        'paging':true
    });
    $(document).on('ready','.assets-upload-display table:first',function(){
        $(this).DataTable({
            'paging':true
        });
    });*/

    curr_url = document.URL.split('/');
    var searchterm = decodeURIComponent(curr_url[curr_url.length-1]);

    if(searchterm && searchterm != 'upload-assets'){
        $('#edit-field-image-name-entity-value').val(searchterm);
        $('#edit-field-image-name-entity-value').focus();
        $('#edit-field-image-name-entity-value').keyup();
    }


    $('.assets-preview-image').each(function(){
        imghref = $(this).find('img').attr('src');
        $(this).find('img').attr('href',imghref);
    });
    $(document).on('load','body',function(){
        $('.assets-preview-image').each(function(){
            imghref = $(this).find('img').attr('src');
            $(this).find('img').attr('href',imghref);
        });
    });

    $('.assets-preview-image img').colorbox();
    $('.assets-upload-display img.file-icon').hide();

    // Store download history
    $("ul.assets-list-partner li.assets-row-list-partner").each(function(){
        $(this).find('div.views-field-field-upload-file').find('table.download-file-type-info-table').find('td').find('a').click(function(){
            //alert('Clicked');
            var imgpath = $(this).attr('href');
            $.ajax({
                url:Drupal.settings.gigabyte.baseUrl+'/partner/asset/store/history',
                type:'post',
                data:{image:imgpath},
                success:function(data){
                    //alert(data);
                    if(data > 0){
                        console.log('Download Saved');
                    }
                }
            });
        });
    });

    // Store download history
    function file_ajax_save(imgpath){
        $.ajax({
            url:Drupal.settings.gigabyte.baseUrl+'/partner/asset/store/history',
            type:'post',
            data:{image:imgpath},
            success:function(data){
                alert(data);
                if(data > 0){
                    console.log('Download Saved');
                }
            }
        });
    }


});

