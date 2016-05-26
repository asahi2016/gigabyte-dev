<script>
    jQuery(document).ready(function($) {
       
    });
</script>
<?php if (!$logo = theme_get_setting('logo_path')) { $logo = theme_get_setting('logo'); } ?>
<div class="txt_center"><a href="http://www.gigabyte.us/" target="_blank"><img src="<?php print $logo;?>" /></a></div>
<?php $uri = isset($node->field_promotion_banner['und'][0]['uri'])? file_create_url($node->field_promotion_banner['und'][0]['uri']):'';?>
<?php if(!isset($variables['terms']) && isset($variables['banner'])) { ?>
    <?php $uri = isset($banner['promo']['und'][0]['uri'])? file_create_url($banner['promo']['und'][0]['uri']):'';?>
<?php } ?>
<div class="txt_center"><img src="<?php print $uri;?>" style="width: 1000px;height:400px;margin: 20px 0px;"></div>

<?php if(isset($variables['terms'])) { ?>
       <?php global $base_url; ?>
        <table class="stores">
        <tbody>
        <tr>
            <?php foreach ($terms as $id => $term) {
                $uri = isset($term->term->field_distributor_image['und'][0]['uri'])? file_create_url($term->term->field_distributor_image['und'][0]['uri']):'';
                ?>
                <td><a href="<?php print $base_url .'/' .drupal_get_path_alias() .'/'. $term->name; ?>" target="_blank"><img src="<?php print $uri;?>" term='#term<?php print $term->tid;?>' class="distributor"/></a></td>
                <?php
            } ?>
        </tr>
        </tbody>
        </table>
<?php } ?>

<?php if(isset($variables['promotions'])) { ?>

    <?php foreach ($variables['promotions'] as $tid => $term) {
        ?>
        <div id="term<?php print $tid; ?>" class="promo">
            <table class="product">
                <tbody>
                <tr bgcolor="#0066FF" style="color:white;">
                    <td>GIGABYTE Model</td>
                    <td>Chipset</td>
                    <td>Stable Model</td>
                    <td>ITP Points</td>
                    <td>Intel® SBA</td>
                    <td>Instant Rebate</td>
                </tr>
                <?php foreach ($term['promotions'] as $pid => $promotion) { ?>
                <tr>
                    <td><a href="#" target="_blank"><?php print $promotion['model']; ?></a></td>
                    <td><?php print ($promotion['model'])?$promotion['model']:'-'; ?></td>
                    <td><?php print ($promotion['model'])?$promotion['model']:'-'; ?></td>
                    <td><?php print ($promotion['model'])?$promotion['model']:'-'; ?></td>
                    <td><?php print ($promotion['model'])?$promotion['model']:'-'; ?></td>
                    <td><?php print ($promotion['model'])?$promotion['model']:'-'; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <!--<div style="text-align:right; font-size:10px; width:800px;">*Instant Rebate Valid from January 18-22.
                Promotion cannot be combined with any other offer.
            </div>-->
            <table class="product_notes">
                <tbody>
            <?php
            $img_url = isset($term['term']->field_distributor_image['und'][0]['uri'])? file_create_url($term['term']->field_distributor_image['und'][0]['uri']):'';
            $term_url = isset($term['term']->field_distributor_link['und'][0]['url'])? $term['term']->field_distributor_link['und'][0]['url'] :'';
            foreach ($term['notes'] as $noteid => $note) {
                ?>
                <tr>
                    <td><a href="<?php print $term_url;?>" target="_blank"><img src="<?php print $img_url; ?>"/></a></td>
                    <td><?php print $note; ?></td>
                </tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
    <?php }
} ?>

