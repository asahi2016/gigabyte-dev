<?php

/**
 * Add body classes if certain regions have content.
 */
function bartik_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function bartik_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function bartik_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function bartik_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'bartik') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function bartik_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function bartik_preprocess_node(&$variables) {

  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }

  if ((arg(0) == 'node') && (is_numeric(arg(1)))) {

    if(isset($variables['node']->type) && ($variables['node']->type == 'group')){

        $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;

        $company_info = db_query("SELECT * FROM {company} WHERE nid =".$variables['nid'])->fetchAssoc();

        $roles = user_role_load($company_info['member_type']);
        $country = taxonomy_term_load($company_info['country']);

        $variables['company'] = $company_info;
        $variables['company']['roles'] = $roles;
        $variables['company']['country'] = $country;

    }
  }

}

/**
 * Override or insert variables into the block template.
 */
function bartik_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function bartik_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function bartik_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}


/**
 * Override or insert variables into the page template.
 */
function bartik_theme_preprocess_page(&$vars) {
    if (isset($vars['main_menu'])) {
        $vars['main_menu'] = theme('links__system_main_menu', array(
            'links' => $vars['main_menu'],
            'attributes' => array(
                'class' => array('links', 'main-menu', 'clearfix'),
            ),
            'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            )
        ));
    }
    else {
        $vars['main_menu'] = FALSE;
    }
    if (isset($vars['secondary_menu'])) {
        $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
            'links' => $vars['secondary_menu'],
            'attributes' => array(
                'class' => array('links', 'secondary-menu', 'clearfix'),
            ),
            'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            )
        ));
    }
    else {
        $vars['secondary_menu'] = FALSE;
    }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function bartik_theme_menu_local_tasks(&$variables) {
    $output = '';

    if (!empty($variables['primary'])) {
        $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
        $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
        $variables['primary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['primary']);
    }
    if (!empty($variables['secondary'])) {
        $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
        $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
        $variables['secondary']['#suffix'] = '</ul>';
        $output .= drupal_render($variables['secondary']);
    }
    return $output;
}

function bartik_menu_link($variables){
    $element = &$variables['element'];

    $pattern = '/\S+\.(png|gif|jpg)\b/i';
    if (preg_match($pattern, $element['#title'], $matches) > 0) {
        $element['#title'] = preg_replace($pattern,
            'Only local images are allowed.',
            $element['#title']);
        $element['#localized_options']['html'] = TRUE;
    }

    return theme_menu_link($variables);
}


function bartik_theme(){

    return array(
        'user_profile_form' => array(
            // Forms always take the form argument.
            'arguments' => array('form' => NULL),
            'render element' => 'form',
            'template' => 'templates/user-profile-edit',
        ),
    );

}


function bartik_preprocess_user_profile_form(&$variables) {

    $variables['form']['#submit'][] = 'group_registration_update_user_account';
    $variables['form']['actions']['submit']['#value'] = 'Update';

    $variables['account']['firstname']['value'] = $variables['form']['#user']->field_first_name['und'][0]['value'];
    $variables['account']['lastname']['value'] = $variables['form']['#user']->field_last_name['und'][0]['value'];
    $variables['account']['mail'] = $variables['form']['#user']->mail;
    $variables['account']['job_title']['value'] = $variables['form']['#user']->field_job_title['und'][0]['value'];
    $variables['account']['contact_number']['value'] = $variables['form']['#user']->field_contact_number['und'][0]['value'];
    $variables['account']['participating_programs']['value'] = $variables['form']['#user']->field_participating_programs['und'][0]['tid'];
    $variables['account']['choose_distributor']['value'] = $variables['form']['#user']->field_choose_distributor['und'][0]['tid'];
    $variables['account']['choose_sub_distributor']['value'] = $variables['form']['#user']->field_choose_sub_distributor['und'][0]['tid'];
    $variables['account']['rma_first_name']['value'] = $variables['form']['#user']->field_rma_first_name['und'][0]['value'];
    $variables['account']['rma_last_name']['value'] = $variables['form']['#user']->field_rma_last_name['und'][0]['value'];
    $variables['account']['rma_contact_number']['value'] = $variables['form']['#user']->field_rma_contact_number['und'][0]['value'];
    $variables['account']['rma_country']['value'] = $variables['form']['#user']->field_rma_country['und'][0]['tid'];
    $variables['account']['shipping_address_1']['value'] = $variables['form']['#user']->field_shipping_address_1['und'][0]['value'];
    $variables['account']['shipping_address_2']['value'] = $variables['form']['#user']->field_shipping_address_2['und'][0]['value'];
    $variables['account']['rma_city']['value'] = $variables['form']['#user']->field_rma_city['und'][0]['value'];
    $variables['account']['rma_state']['value'] = $variables['form']['#user']->field_rma_state['und'][0]['value'];
    $variables['account']['rma_zip_code']['value'] = $variables['form']['#user']->field_rma_zip_code['und'][0]['value'];
    $variables['account']['membership_account']['value'] = $variables['form']['#user']->field_membership_account['und'][0]['value'];
    $variables['account']['motherboard_qty']['value'] = $variables['form']['#user']->field_motherboard_qty['und'][0]['value'];
    $variables['account']['other_programs']['value'] = !empty($variables['form']['#user']->field_other_programs['und'])?$variables['form']['#user']->field_other_programs['und'][0]['value']:'';
    $variables['account']['other_distributor']['value'] = !empty($variables['form']['#user']->field_other_distributor['und'])?$variables['form']['#user']->field_other_distributor['und'][0]['value']:'';
    $variables['account']['other_sub_distributor']['value'] = !empty($variables['form']['#user']->field_other_sub_distributor['und'])?$variables['form']['#user']->field_other_sub_distributor['und'][0]['value']:'';
    $variables['account']['group_id'] = $variables['form']['#user']->og_user_node['und'][0]['target_id'];
    $variables['account']['company_id'] = $variables['form']['#user']->field_company_name['und'][0]['target_id'];

    $company_info = db_query("SELECT * FROM {company} WHERE nid =".$variables['account']['company_id'])->fetchAssoc();
    $roles = user_role_load($company_info['member_type']);
    $country = taxonomy_term_load($company_info['country']);

    $variables['account']['company'] = $company_info;
    $variables['account']['company']['roles'] = $roles;
    $variables['account']['company']['country'] = $country;

    $variables['account']['job_title']['form'] = drupal_render($variables['form']['group_personal_info']['field_job_title']);
    $variables['account']['contact_number']['form'] = drupal_render($variables['form']['group_personal_info']['field_contact_number']);
    $variables['account']['pass']['form'] = drupal_render($variables['form']['group_personal_info']['account']['pass']);
    $variables['account']['current_pass']['form'] = drupal_render($variables['form']['group_personal_info']['account']['current_pass']);

    $variables['account']['rma_first_name']['form'] = drupal_render($variables['form']['group_rma_information']['field_rma_first_name']);
    $variables['account']['rma_last_name']['form'] = drupal_render($variables['form']['group_rma_information']['field_rma_last_name']);
    $variables['account']['rma_contact_number']['form'] = drupal_render($variables['form']['group_rma_information']['field_rma_contact_number']);
    $variables['account']['rma_country']['form'] = drupal_render($variables['form']['group_rma_information']['field_rma_country']);
    $variables['account']['shipping_address_1']['form'] = drupal_render($variables['form']['group_rma_information']['field_shipping_address_1']);
    $variables['account']['shipping_address_2']['form'] = drupal_render($variables['form']['group_rma_information']['field_shipping_address_2']);
    $variables['account']['rma_city']['form'] = drupal_render($variables['form']['group_rma_information']['field_rma_city']);
    $variables['account']['rma_state']['form'] = drupal_render($variables['form']['group_rma_information']['field_rma_state']);
    $variables['account']['rma_zip_code']['form'] = drupal_render($variables['form']['group_rma_information']['field_rma_zip_code']);

    unset($variables['form']['group_better_services']['field_other_programs']['und'][0]['value']['#title']);
    unset($variables['form']['group_better_services']['field_other_distributor']['und'][0]['value']['#title']);
    unset($variables['form']['group_better_services']['field_other_sub_distributor']['und'][0]['value']['#title']);
    unset($variables['form']['group_better_services']['field_other_programs']['und']['#title']);
    unset($variables['form']['group_better_services']['field_other_distributor']['und']['#title']);
    unset($variables['form']['group_better_services']['field_other_sub_distributor']['und']['#title']);

    $variables['account']['participating_programs']['form'] = drupal_render($variables['form']['group_better_services']['field_participating_programs']);
    $variables['account']['other_programs']['form'] = drupal_render($variables['form']['group_better_services']['field_other_programs']);

    $variables['account']['membership_account']['form'] = drupal_render($variables['form']['group_better_services']['field_membership_account']);
    $variables['account']['motherboard_qty']['form'] = drupal_render($variables['form']['group_better_services']['field_motherboard_qty']);

    $variables['account']['choose_distributor']['form'] = drupal_render($variables['form']['group_better_services']['field_choose_distributor']);
    $variables['account']['other_distributor']['form'] = drupal_render($variables['form']['group_better_services']['field_other_distributor']);

    $variables['account']['choose_sub_distributor']['form'] = drupal_render($variables['form']['group_better_services']['field_choose_sub_distributor']);
    $variables['account']['other_sub_distributor']['form'] = drupal_render($variables['form']['group_better_services']['field_other_sub_distributor']);

    $variables['account']['receive_newsletter']['form'] = drupal_render($variables['form']['group_better_services']['field_receive_newsletter']);
}

function bartik_menu_local_tasks() {
    $output = '';
    $primary = array();
    $node = new stdClass();
    if (arg(0) == 'node' && is_numeric(arg(1))) {
        $node = node_load(arg(1));

        if (in_array($node->type, array('group'))) {
            if ($primary = menu_primary_local_tasks()) {
                unset($primary);
            }
        }
    }

    return $output;
}