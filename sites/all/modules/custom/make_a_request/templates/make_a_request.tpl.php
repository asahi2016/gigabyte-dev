
<?php

global $base_url;

drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/jquery-1.12.0.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/dataTables.bootstrap.min.js');
drupal_add_js($base_url.'/sites/all/modules/custom/make_a_request/js/jquery.table2excel.js');
drupal_add_css($base_url.'/sites/all/modules/custom/make_a_request/css/dataTables.bootstrap.min.css');

?>

<div>
    <button id="export_request_review_to_excel">Export Request Review to Excel</button>
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

        $("#export_request_review_to_excel").click(function() {
            $("#pagination").table2excel({
                name: "Worksheet Name",
                filename: "cutomer_request_review"
            });
        });
        $('#pagination').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
    
</script>