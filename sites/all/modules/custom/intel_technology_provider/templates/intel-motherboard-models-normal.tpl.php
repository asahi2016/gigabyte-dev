<table style="margin-top:10px;" class="itp">
    <tbody>
    <tr style="color:#007dc5;">
        <td>
            <table cellspacing="0" cellpadding="0" style="margin:10px 0 0 110px;float:left;table-layout:fixed">
                <tr>
                    <td>QUALIFYING MOTHERBOARD MODELS <span style="color:black">(click to see more)</span></td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="itp" style="margin:10px 0 0 240px;">
    <tbody>
    <?php if($variables['normal_motherboard']){
        $i=0;
        foreach ($variables['normal_motherboard'] as $points => $term) {
            $out = $i % 5;
            ?>
            <?php if ($out == 0) { ?>
                <tr>
            <?php } ?>
            <td style="padding:0 0 10px 0;">
                <ul>
                    <li>
                        <a class="inline root-term" href="javascript:void(0);" rel="<?php print $term->tid; ?>"><?php print $term->name; ?></a>
                        <div style="display: none;" id="term-<?php print $term->tid; ?>">
                            <div id="<?php print $term->name; ?>" style="height:400px;">
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
                                        <td><?php
                                            $lastword = end(explode(" ",$term->name));
                                            if(strtolower($lastword) != 'series'){
                                                print $term->name .' SERIES';
                                            }else{
                                                print $term->name;
                                            }
                                            ?> </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="pop">
                                    <tbody>
                                    <tr>
                                        <?php
                                        if (isset($term->subterm)) {
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
                </ul>
            </td>
            <?php if ($out == 4) { ?>
                </tr>
            <?php } ?>
            <?php
            $i = $i + 1;
        }
    }
    ?>
    </tbody>
</table>