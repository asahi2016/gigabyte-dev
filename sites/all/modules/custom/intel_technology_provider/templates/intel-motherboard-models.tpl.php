<table class="itp">
    <tbody>
    <tr style="color:#007dc5;">
        <td width="150" class="txt_center">POINTS</td>
        <td>QUALIFYING MOTHERBOARD MODELS <span style="color:black">(click to see more)</span></td>
    </tr>
    <?php if($variables['motherboard']){
    foreach ($variables['motherboard'] as $points => $terms){
    ?>
    <tr>
        <td class="number"><?php print $points; ?></td>
        <td>
            <ul>
                <?php foreach ($terms as $key => $term){?>
                <li>
                    <a class="inline root-term" href="javascript:void(0);" rel="<?php print $term->tid;?>"><?php print $term->name;?></a>
                    <div style="display: none;" id="term-<?php print $term->tid;?>">
                        <div id="<?php print $term->name;?>" style="height:400px;">
                            <table class="title">
                                <tbody>
                                <tr>
                                    <td>EARN <?php print $points; ?> INTEL® TECHNOLOGY PROVIDER POINTS<br>WITH THE FOLLOWING MODELS</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="serie_name">
                                <tbody>
                                <tr>
                                    <td><?php print $term->name;?> SERIES</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="pop">
                                <tbody>
                                <tr>
                                    <?php
                                    if(isset($term->subterm)) {
                                        foreach ($term->subterm as $skey => $subterm) { ?>
                                            <td>
                                                <a href="<?php print $subterm->term->field_motherboard_link['und'][0]['url']; ?>"
                                                   target="_blank"><?php print $subterm->term->field_motherboard_link['und'][0]['title']; ?></a>
                                            </td>
                                        <?php }
                                    } ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </td>
    </tr>
    <?php }
      }
    ?>
    </tbody>
</table>




