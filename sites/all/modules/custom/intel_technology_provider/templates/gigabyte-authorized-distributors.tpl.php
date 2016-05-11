<table style="font-family: 'ralewayregular', sans-serif; font-weight:700;margin:0px auto; width:850px; text-align:left; font-size:20px; color:#5d5d5e;">
    <tbody>
    <tr>
        <td>GIGABYTE AUTHORIZED DISTRIBUTORS</td>
    </tr>
    </tbody>
</table>
<table style="font-family: 'ralewayregular', sans-serif; font-weight:700;margin:0px auto; width:850px; text-align:left; font-size:20px; color:#5d5d5e;">
    <tbody>
    <?php if($variables['distributors']){
    foreach ($variables['distributors'] as $cid => $terms){
      $country_term = taxonomy_term_load($cid);
      $country_name = ($country_term->name == 'United States') ? 'USA' : 'Canada';
    ?>
    <tr>
        <td><?php print $country_name;?></td>
        <?php foreach ($terms as $k => $term){ ?>
        <td>
            <?php $path= file_create_url($term->term->field_distributor_image['und'][0]['uri']); ?>
            <a href="<?php echo $term->term->field_distributor_link['und'][0]['url'];?>" target="_blank">
                <img src="<?php print $path; ?>" />
            </a>
        </td>
        <?php } ?>
    </tr>
    <?php }
    } ?>
    </tbody>
</table>