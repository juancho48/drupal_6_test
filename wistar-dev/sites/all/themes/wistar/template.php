<?php

function wistar_preprocess_page(&$vars) {
	jquery_ui_add(array('effects.slide'));

	if( $vars['is_front'] ) {
		$vars['homepage'] = wistar_theme_get_active('homepage');
		$vars['head_title'] = $vars['homepage']->title;

		// load up the quicktabs
		$quicktabs = quicktabs_load(1);
		$vars['quicktabs'] = theme('quicktabs', $quicktabs);

		// load the alert
		$vars['alert'] = wistar_theme_get_alert();

		// we need to re-render the js, since qt relies on it's own
		$vars['css'] = drupal_add_css();
		$vars['styles'] = drupal_get_css();
		$vars['scripts'] = drupal_get_js();

		// rebuild the less files - this sucks, but is needed beacuse of how
		// quicktabs adds the required files in a theme function
		// this shouldn't be a problem in production, since this function only builds
		// the less files if they aren't built already. Otherwise, it just modifies the
		// css array to include the built files.
		_less_build($vars, 'page');
	}

	if( isset($vars['title']) && $vars['title'] ) {
		$vars['body_classes'] .= ' ' . wistar_str2class($vars['title']);
	}
	if(isset($_SESSION['donation_form'])&&arg(0)!='give'&&arg(1)!='confirmation'){
		unset($_SESSION['donation_form']);
	}

	$node = $vars['node'];
	if ($node->type=='microsite_subpage') {
		if ($node->field_template_type[0]['value'] == 1) {
			$vars['body_classes'] .= ' microsite-subpage-fullwidth';
		}
	}
}

function wistar_str2class($string) {
	return strtolower(preg_replace('/[^A-Za-z0-9]/', '-', $string));
}

function wistar_textarea($element) {
	$element['#resizable'] = false ;
	return theme_textarea($element);
}

function wistar_preprocess_node(&$vars) {
	$node = $vars['node'];

	if( $vars['node'] ) {
		$vars['template_files'][] = 'node-' . $vars['node']->nid;
	}

	$vars['node']->comment = $vars['node']->comments = $vars['node']->comment_form = 0;
	if (module_exists('comment') && isset($vars['node'])) {
		$vars['node']->comments = comment_render($vars['node']);
		$vars['node']->comment_form = drupal_get_form('comment_form',array('nid' => $vars['node']->nid));
	}

	$node->comment = 0;

	if($vars['node']->type=='newsletter') {
		$crumbs = drupal_get_breadcrumb();
		array_pop($crumbs);
		$crumbs[] = l('Wistar Today', 'wistar-today');
		$crumbs[] = l('News and Media', 'news-and-media');
		$crumbs[] = l('Focus Newsletter', 'news-and-media/focus-newsletter');
		$crumbs[] = $vars['node']->title;
		drupal_set_breadcrumb($crumbs);
	}

	if($node->type=='article') {
		$crumbs = drupal_get_breadcrumb();
		array_pop($crumbs);
		$crumbs[] = l('Wistar Today', 'wistar-today');
		$crumbs[] = l('News and Media', 'news-and-media');
		$crumbs[] = l('Focus Newsletter', 'news-and-media/focus-newsletter');
		//pa($node->field_article_newsletter[0]['nid'],1);
		if(!empty($node->field_article_newsletter[0]['nid'])){
			$node_newsletter = node_load($node->field_article_newsletter[0]['nid']);
			if(!empty($node_newsletter->field_newsletter_date[0]['value'])){
				$crumbs[] = l($node_newsletter->field_newsletter_date[0]['value'], $node_newsletter->path);
			}
		}
		$crumbs[] = $node->title;
		drupal_set_breadcrumb($crumbs);
	}
}

function wistar_get_node_section_classes($node) {
	$classes = array();
	foreach( $node->taxonomy as $term ) {
		$classes[] = strtolower(str_replace(' ', '_', $term->name));
	}

	return join(' ', $classes);
}

function wistar_wrap_breadcrumbs(&$item, $idx, $options) {

	$item = '<span class="crumb crumb-' . $idx . '">' . $item;

	if( $idx != $options['last'] ) {
		$item .= $options['arrow'];
	}

	$item .= "</span>";
}

// remove the "(all day)" verbiage from node cck dates
function wistar_date_all_day() {
	return;
}

function wistar_breadcrumb( $breadcrumb, $include_self = true) {
	global $authoritative_breadcrumbs;
	$drupal_title = drupal_get_title();
	if ( !empty($breadcrumb) ) {
		if( $include_self && !$authoritative_breadcrumbs) {
			// get the title
			$title = menu_get_active_title();
			// failsafe if no title provided by menu
			if(!$title) $title = drupal_get_title();
			if(html_entity_decode(end($breadcrumb)) != $title){
				$breadcrumb[] = $title;
			}
		}
		if(empty($title)) $breadcrumb[] = $drupal_title;
		$arrow = '<img src="' . base_path( ) . path_to_theme( ) . '/images/layout/breadcrumb_divider.png" />';
		array_walk($breadcrumb, 'wistar_wrap_breadcrumbs', array('arrow' => $arrow, 'last' => count($breadcrumb) - 1));

		return '<div class="breadcrumb">' . implode( '', $breadcrumb ) . '</div>';
	}
}

function wistar_page_navigation_newsletter(){
	$output = array();
	$result = db_query('SELECT * FROM {node} WHERE type="newsletter" ORDER BY sticky ASC, created DESC');

	while($row = db_fetch_object($result)){
		$output[] = array(
			'nid' => $row->nid,
			'title' => $row->title,
			'created' => $row->created,
			'sticky' => $row->sticky,
		);
	}
	return $output;
}

function wistar_page_navigation_article($nid){
	$output = array();
	$result = db_query('SELECT *
						FROM {node} n
						INNER JOIN {content_type_article} cta ON cta.nid = n.nid
						WHERE cta.field_article_newsletter_nid = %d
						ORDER BY n.sticky ASC, n.created DESC', $nid);
	while($row = db_fetch_object($result)){
		$output[] = array(
			'nid' => $row->nid,
			'title' => $row->title,
			'created' => $row->created,
			'sticky' => $row->sticky,
		);
	}
	return $output;
}

function wistar_select_newsletter_article_reference($nid){
	$output = array();
	$result = db_query('SELECT node.nid AS nid, node.title AS node_title, node_revisions.teaser AS node_revisions_teaser, node_revisions.format AS node_revisions_format, node.sticky AS node_sticky, node.created AS node_created
						FROM node node
						LEFT JOIN content_type_article node_data_field_article_newsletter ON node.vid = node_data_field_article_newsletter.vid
						LEFT JOIN node_revisions node_revisions ON node.vid = node_revisions.vid
						WHERE (node.status <> 0) AND (node.type in ("article")) AND (node_data_field_article_newsletter.field_article_newsletter_nid = %d)
						ORDER BY node_sticky ASC, node_created DESC ', $nid);
	while($row = db_fetch_object($result)){
		$output[] = $row->nid;
	}
	return $output;
}

function wistar_preprocess_search_result(&$variables){
	global $base_url;
	if(!empty($variables['result']['node'])){
		$result = $variables['result'];
		$node = $result['node'];
		$node_title = wistar_str2class($node->title);
		if($node->type == 'research_topic' || $node->type == 'glossary'){
			//add redirect
			$variables['url'] = $base_url.'/news-and-media/glossary#'.$node_title;
		}
	}
}

function wistar_cmp_object_title($a, $b) {
	if ($a->field_last_name[0]['value'] === $b->field_last_name[0]['value']) return 0;
	return $a->field_last_name[0]['value'] < $b->field_last_name[0]['value'] ? -1 : 1;
}