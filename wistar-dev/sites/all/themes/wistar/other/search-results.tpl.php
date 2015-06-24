<?php
// $Id: search-results.tpl.php,v 1.1 2007/10/31 18:06:38 dries Exp $

/**
 * @file search-results.tpl.php
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependant to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $type: The type of search, e.g., "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 */
?>
<?php $crumbs = drupal_get_breadcrumb(); ?>
<?php $crumbs[2] = "Results"; ?>
<?php print theme('breadcrumb', $crumbs, false); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<div class="content" style="width: 100%;">
			<?php print theme('wistar_content_heading', null, 'Search');?>
			<div id="search_container" class="page">
				<div class="section" style="padding-top: 10px;">
					<?php print drupal_get_form('search_form'); ?>
				</div>
				<div class="section grey">
					<dl class="search-results <?php print $type; ?>-results">
					  <?php print $search_results ? $search_results : '<strong>There are no results</strong>'; ?>
					</dl>
					<?php print $pager; ?>
				</div>
			</div>
		</div>
	</div>
</div>
