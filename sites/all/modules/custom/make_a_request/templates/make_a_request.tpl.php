
<link href="/gigabyte/themes/bartik/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="/gigabyte/themes/bartik/js/jquery-1.12.0.min.js"></script>
<script src="/gigabyte/themes/bartik/js/dataTables.bootstrap.min.js"></script>

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
        $('#pagination').DataTable({
            "order": [[ 3, "desc" ]]
        });

    } );
</script>