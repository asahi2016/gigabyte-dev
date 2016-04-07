
<?php

global $base_url;

drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/jquery-1.12.0.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/dataTables.bootstrap.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/jquery.dataTables.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/dataTables.buttons.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/jszip.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/pdfmake.min.jss');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/vfs_fonts.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/buttons.html5.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/buttons.flash.min.js');
drupal_add_css($base_url.'/sites/all/modules/custom/make_a_request/css/dataTables.bootstrap.min.css');
drupal_add_css($base_url.'/sites/all/modules/custom/make_a_request/css/jquery.dataTables.min.css');
drupal_add_css($base_url.'/sites/all/modules/custom/make_a_request/css/buttons.dataTables.min.css');

?>
<div>
    <table id="pagination" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <th>Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Contact Email</th>
        <th>Company Name</th>
        <th>Request</th>
        </thead>
        <tbody>
        <?php foreach($value as $customer_request){?>

            <tr>
                <td><?php echo $customer_request->date;?></td>
                <td><?php echo $customer_request->first_name;?></td>
                <td><?php echo $customer_request->last_name;?></td>
                <td> <a href="mailto:<?php echo $customer_request->contact_email; ?>"><?php echo $customer_request->contact_email; ?> </a></td>
                <td><?php echo $customer_request->company_name;?></td>
                <td><?php echo $customer_request->request;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type='text/javascript'>

    $(document).ready(function() {
        $('#pagination').DataTable( {
            jQueryUI: true,
            order:[[0,'desc']],
            dom: 'Bfrtip',
            buttons: [
                { extend: 'excel', text: 'Export Request Review to excel' },
            ]
        } );
    } );

</script>