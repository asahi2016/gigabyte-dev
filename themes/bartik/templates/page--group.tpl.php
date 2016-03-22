</br>
<table class="table-fill">
    <thead>
    <tr>
        <th class="text-left" colspan="2">Company Information</th>
    </tr>
    </thead>
    <tbody class="table-hover">
    <tr>
        <td class="text-left">Member Type</td>
        <td class="text-left"><?=$company['roles']->name ;?></td>
    </tr>
    <tr>
        <td class="text-left">Country</td>
        <td class="text-left"><?=$company['country']->name ;?></td>
    </tr>
    <tr>
        <td class="text-left">Business Address 1</td>
        <td class="text-left"><?=$company['business_address_1']?></td>
    </tr>
    <tr>
        <td class="text-left">Business Address 2</td>
        <td class="text-left"><?=$company['business_address_2']?></td>
    </tr>
    <tr>
        <td class="text-left">City</td>
        <td class="text-left"><?=$company['city']?></td>
    </tr>
    <tr>
        <td class="text-left">State</td>
        <td class="text-left"><?=$company['state']?></td>
    </tr>
    <tr>
        <td class="text-left">Zip Code</td>
        <td class="text-left"><?=$company['zip']?></td>
    </tr>
    </tbody>
</table>



