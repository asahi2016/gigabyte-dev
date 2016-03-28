
<div>
    <table>
        <thead>
        <th>Date</th>
        <th>User Name</th>
        <th>Contact Email</th>
        <th>Company Name</th>
        <th>Request</th>
        </thead>
        <tbody>
        <?php foreach($value as $customer_request){  ?>

            <tr>
                <td><?php echo $customer_request->date;?></td>
                <td><?php echo $customer_request->user_name;?></td>
                <td><?php echo $customer_request->contact_email;?></td>
                <td><?php echo $customer_request->company_name;?></td>
                <td><?php echo $customer_request->request;?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>