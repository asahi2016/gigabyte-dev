<table class="itp_b_table">
    <tbody>
    <tr>
        <td>GIGABYTE AUTHORIZED DISTRIBUTORSs</td>
    </tr>
    </tbody>
</table>
<table class="itp_b_table">
    <tbody>
    <?php if($variables['distributors']){
    foreach ($variables['distributors'] as $cid => $terms){
      $country_term = taxonomy_term_load($cid);
      $country_name = ($country_term->name == 'United States') ? 'USA' : 'Canada';
    ?>
    <tr>
        <td valign="top"><?php print $country_name;?></td>
        <td><ul>
        <?php foreach ($terms as $k => $term){ ?>
        <li>
            <?php $path= file_create_url($term->term->field_distributor_image['und'][0]['uri']); ?>
            <a href="<?php echo $term->term->field_distributor_link['und'][0]['url'];?>" target="_blank">
                <img src="<?php print $path; ?>" class="s_logo"/>
            </a>
        </li>
        <?php } ?>
        </ul></td>
    </tr>
    <?php }
    } ?>
    </tbody>
</table>