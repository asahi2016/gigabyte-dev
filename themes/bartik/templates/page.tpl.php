<script type="text/javascript">
    jQuery(document).ready(function($) {


        $('#scrol-top').click(function() {
           $("html,body").animate({scrollTop: 0}, 1000, 'swing');
        });
            scrolltop()
        $(window).scroll(function (event) {
            scrolltop()
        });
        function scrolltop(){
            var scroll = $(window).scrollTop();
            if(scroll > '400')
            {
                $('#scrol-top').show();
            }
            else{
                $('#scrol-top').hide();
            }
        }
    });
</script>
<?php
/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
//$ipcountry = json_decode(file_get_contents('http://api.ipinfodb.com/v3/ip-country/?key='.$apikey.'&ip='.$ip.'&format=json'));
if(!user_is_logged_in()){ $ipcountry = json_decode(file_get_contents('http://ipinfo.io/'.$ip.'/json')); }

$url = $_SERVER['REQUEST_URI'];
$current_url = explode('/',$url);
setcookie('curr_pg',$current_url[(count($current_url)-1)]);
if(empty($_COOKIE['curr_pg'])){
    $_COOKIE['curr_pg'] = $current_url[(count($current_url)-1)];
}
$_SESSION['curr_pg'] = $current_url[(count($current_url)-1)];
//echo $_SESSION['curr_pg'];
if($_SESSION['curr_pg'] == 'login' && user_is_logged_in()){
    header('Location:partner');
}
// GEt user and node information for a logged in user and the current page
global $user;
global $node;
$userinfo = user_load($user->uid);

$_SESSION['userid'] = $user->uid;
if (arg(0) == 'node' && is_numeric(arg(1))) {
    // Get the nid
    $nid = arg(1);

    // Load the node if you need to
    $node = node_load($nid);
}

$node_content = trim(!empty($node->field_canada_content['und'][0]['value'])?$node->field_canada_content['und'][0]['value']:'');
$country = db_select('field_data_field_country', 'f')
    ->fields('f', array('field_country_tid'))
    ->condition('entity_type', 'user')
    ->condition('bundle', 'user')
    ->condition('entity_id', $user->uid)
    ->execute()
    ->fetchField();

$getcountry = isset($_GET['country'])?$_GET['country']:0;

if(!user_is_logged_in()){
    if(!empty($getcountry)){
        if ($getcountry == 'ca') {
            $_SESSION['user_country_id'] = 2;
        } else {
            $_SESSION['user_country_id'] = 1;
        }
    }else{
        $_SESSION['user_country_id'] = !empty($ipcountry->country)?($ipcountry->country == 'CA')?2:1:1;
    }
}else{
    if(!empty($getcountry)){
        if ($getcountry == 'ca') {
            $_SESSION['user_country_id'] = 2;
        } else {
            $_SESSION['user_country_id'] = 1;
        }
    }else{
        $_SESSION['user_country_id'] = !empty($country)?$country:1;
    }
}
if (in_array('administrator', array_values($user->roles))) {
    $access = true;
}else{
    $access = false;
}
?>
<?php if(in_array('roadmap',$current_url) && in_array('submit',$current_url)){
    $vocabulary = taxonomy_vocabulary_machine_name_load('Roadmap');
    $terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));
    $tax_term = array();
    foreach($terms as $key => $term){
        $tax_term[] = $term->tid;
    }
    $entity_form_tid = $country = db_select('field_data_field_roadmap_products', 'f')
        ->fields('f', array('field_roadmap_products_tid'))
        ->execute()
        ->fetchAll();

    $roadmap_exists = array();

    foreach($entity_form_tid as $k => $tid){
        $exists = false;
        if(in_array($tid->field_roadmap_products_tid,$tax_term)){
            if(empty($roadmap_exists)){
                $roadmap_exists[] = $tid->field_roadmap_products_tid;
            }else{
                if(in_array($tid->field_roadmap_products_tid,$roadmap_exists)){
                    $exists = false;
                }else{
                    $roadmap_exists[] = $tid->field_roadmap_products_tid;
                }
            }
        }
    }

?>
<script>
    jQuery(document).ready(function($){

        <?php if(!empty($roadmap_exists)){ ?>
            <?php foreach($roadmap_exists as $k => $v){ ?>
            $("#edit-field-roadmap-products select#edit-field-roadmap-products-und option").each(function(){
                console.log(<?php echo $v; ?>);
                if($(this).val() == <?php echo $v; ?>){
                    $(this).attr('disabled',true);
                    $(this).attr('selected',false);
                }
            });
            <?php } ?>
        <?php drupal_set_message('Some of the Products might be disabled from selection if it already has a roadmap submitted.','warning'); } ?>

    });
</script>
<?php } ?>
<script type="text/javascript">
jQuery(document) . ready(function () {
        country_id = <?php echo (!empty($_SESSION['user_country_id']) ? $_SESSION['user_country_id'] : 1) ?>;
        country_content_length = '<?php echo (!empty($node_content)?strlen($node_content):0) ?>';
        country = location.search.split('country=')[1];
        if ((country == 'ca' || country_id == 2) && country_content_length > 0) {
            jQuery('#page-canada-content') . show();
            jQuery('#page-us-content') . hide();
            jQuery('#country-menu li:first-child') . removeClass('active');
            jQuery('#country-menu li:last-child') . addClass('active');
        } else if (country_id == 1) {
            jQuery('#page-canada-content') . hide();
            jQuery('#page-us-content') . show();
            if (country == 'us') {
                jQuery('#country-menu li:first-child') . addClass('active');
                jQuery('#country-menu li:last-child') . removeClass('active');
            } else if (country == 'ca') {
                jQuery('#country-menu li:first-child') . removeClass('active');
                jQuery('#country-menu li:last-child') . addClass('active');
            } else {
                jQuery('#country-menu li:first-child') . addClass('active');
                jQuery('#country-menu li:last-child') . removeClass('active');
            }
        } else {
            jQuery('#page-canada-content') . hide();
            jQuery('#page-us-content') . show();
            if (country == 'us' || country_id == 1) {
                jQuery('#country-menu li:first-child') . addClass('active');
                jQuery('#country-menu li:last-child') . removeClass('active');
            } else if (country == 'ca' || country_id == 2) {
                jQuery('#country-menu li:first-child') . removeClass('active');
                jQuery('#country-menu li:last-child') . addClass('active');
            } else {
                jQuery('#country-menu li:first-child') . addClass('active');
                jQuery('#country-menu li:last-child') . removeClass('active');
            }
        }
        <?php if(!$access){ ?>
        jQuery('table .views-field-edit-entityform, table .views-field-delete-entityform').hide();
        <?php } ?>

});
</script>
<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>">
     <div class="section clearfix">
            <?php if ($logo): ?>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            <?php endif; ?>

            <?php if ($site_name || $site_slogan): ?>
              <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

                <?php if ($site_name): ?>
                  <?php if ($title): ?>
                    <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
                      <strong>
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                      </strong>
                    </div>
                  <?php else: /* Use h1 when the content title is empty */ ?>
                    <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
                      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    </h1>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if ($site_slogan): ?>
                  <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
                    <?php print $site_slogan; ?>
                  </div>
                <?php endif; ?>

              </div> <!-- /#name-and-slogan -->
            <?php endif; ?>
            <div id="header-wrapper-right" class="header-wrapper-right" >
                <?php print render($page['header']); ?>
                <div id="country-menu" class="country-menu" >
                    <?php print render($page['country_menu']); ?>
                </div>
            </div>
    </div>
    <div class="full-width top_f">
        <div class="section clearfix">
          <div id="base-title-section">
                <?php if ($page['base_title']): ?>
                  <div id="base-title"><div class="section clearfix">
                          <?php
                            if($_SESSION['curr_pg'] == 'partner' || in_array('partner',$current_url) || in_array('entityform',$current_url ) || in_array('batch',$current_url ))
                                print render($page['base_title']['menu_menu-partner-portal-title']);
                            else
                                print render($page['base_title']['menu_menu-business-center']);
                          ?>
                      </div></div> <!-- /.section, /#base_title -->
                 <?php endif; ?>

                 <?php if (isset($page['search']) &&!empty($page['search']) ): ?>
                     <div id="site-search"><div class="section clearfix">
                          <?php print render($page['search']); ?>
                      </div></div> <!-- /.section, /#base_title -->
                 <?php endif; ?>
          </div>
        </div>
    </div>

    <div class="full-width top_s">
     <div class="section clearfix main-menu-nav" id="main-menu-nav">
         <?php if(user_is_logged_in() && ($_SESSION['curr_pg'] == 'partner' || in_array('partner',$current_url) || in_array('entityform',$current_url ) || in_array('batch',$current_url ))){ ?>
                <?php if (isset($page['menu']) && !empty($page['menu'])): ?>
                <?php
                     /*$partner_portal_menu_tree = menu_tree(variable_get('menu_main_links_source', 'menu_menu-partner-portal-menu'));
                     print drupal_render($partner_portal_menu_tree);*/
                 print render($page['menu']['menu_menu-partner-portal-menu']);
                 ?>
                <?php endif; ?>
         <?php }else if(user_is_logged_in() && $_SESSION['curr_pg'] != 'partner') { ?>
             <?php if ($main_menu): ?>
                 <?php $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                 print drupal_render($main_menu_tree);
                 ?>
             <?php endif; ?>
         <?php }else{ ?>
                 <?php if ($main_menu): ?>
                    <?php $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
                        print drupal_render($main_menu_tree);
                    ?>
                 <?php endif; ?>
         <?php } ?>
      </div>
    </div>
  </div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <?php if ($page['top_content']): ?>
     <div id="top_content"><div class="section clearfix">
         <?php print render($page['top_content']); ?>
     </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix">
      <div id="main" class="clearfix">
        <div class="inner-wrapper" >
    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column wrapper_full partner-portal-login <?php if($_SESSION['curr_pg'] == 'login' || in_array('login?destination=node',$current_url) || in_array('login?destination=partner',$current_url)){echo 'split-page';} ?>"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print ($title == 'Login')?'Partner Portal Description':$title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if (isset($tabs) && !empty($tabs)): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div></div> <!-- /#inner-wrapper, /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>
  <?php global $base_url; ?>
  <div id="footer-wrapper">
      <div class="section <?php if(user_is_logged_in() && (in_array('partner',$current_url) || in_array('admin',$current_url))){echo 'foot';} ?>">
          <img class="f_img" src="<?php echo $base_url;?>/themes/bartik/images/icon_top_mouseover.png" width="100" height="100" alt="" id="scrol-top" />
    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
