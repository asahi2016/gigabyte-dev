<!-- Redirect browsers with JavaScript disabled to the origin page -->
<noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
<div class="row fileupload-buttonbar">
  <div class="span7">
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
      <i class="icon-plus icon-white"></i>
      <span>Add files...</span>
      <input type="file" name="files[]" multiple>
    </span>
    <button type="submit" class="btn btn-primary start">
      <i class="icon-upload icon-white"></i>
      <span>Start upload</span>
    </button>
    <button type="reset" class="btn btn-warning cancel">
      <i class="icon-ban-circle icon-white"></i>
      <span>Cancel upload</span>
    </button>
    <button type="button" class="btn btn-danger delete">
      <i class="icon-trash icon-white"></i>
      <span>Delete</span>
    </button>
    <input class="toggle" type="checkbox">
  </div>
    <!-- Select file type -->
    <div class="span7 filetypes">
        <label>JPG</label>
        <input type="checkbox" name="filetype" value="jpg" />
        <label>PNG</label>
        <input type="checkbox" name="filetype" value="png" />
        <label>PDF</label>
        <input type="checkbox" name="filetype" value="pdf" />
    </div>
  <!-- The global progress information -->
  <div class="span5 fileupload-progress fade">
    <!-- The global progress bar -->
    <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
      <div class="bar" style="width:0%;"></div>
    </div>
    <!-- The extended global progress information -->
    <div class="progress-extended">&nbsp;</div>
  </div>
</div>
<!-- The loading indicator is shown during file processing -->
<div class="fileupload-loading"></div>
<br>
<!-- The table listing the files available for upload/download -->
<table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>

<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
console.log(file);
    <tr class="template-upload fade">
        <td class="file-type" >{%= file.type.split('/')[1].toUpperCase() %}</td>
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>Start</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>Cancel</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>