<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
 global $base_url;
 // Get the previous node id
$prev_nid = prev_next_nid($nid, 'prev');

// Get the previous node id
$next_nid = prev_next_nid($nid, 'next');

$category = $node->field_categories['und'][0]['tid'];
//echo $category;
switch ($category) {
    case 59:
        $active = "box-interlock";
        break;
    case 36:
        $active = "box-sheds";
        break;
    case 37:
        $active = "box-studios";
        break;
    case 39:
        $active = "box-cubbies";
        break;
    case 38:
        $active = "box-gazebos";
        break;
}


?>
<script type="text/javascript">
	(jQuery)(function(){
		(jQuery)('.<?php echo $active?> ').addClass('active');

	});
</script>


<div  id="node-<?php print $node->nid; ?>" class="row node">
	<div class="related-products col-md-2 visible-lg visible-md visible-sm">
		<?php print render($content['field_related_products']);?>
	</div>
	<div class="col-md-4 col-xs-12 first-node">
		<div class="title"><?php print $title; ?></div>
		<?php print render($content['field_images']);?>
		<div class="spec">
				<div class="title_this field-label">Specifications</div>
				<div class="left">
					<?php print render($content['field_dimensions']);?>
					<?php print render($content['field_roof']);?>
					<?php print render($content['field_window']);?>

				</div>
				<div class="left">
					<?php print render($content['field_floor']);?>
					<?php print render($content['field_other_features']);?>

				</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-12 second-node">
		<div class="headernode">
			<div class="row">
				<div class="col-md-12">
					<label class="small">Share with:</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="sharethis"><a href="https://facebook.com/cedarshedau" target="_blank"><img src="/img/facebook.png" /></a><a href="https://www.linkedin.com/company/cedar-shed" target="_blank"><img src="/img/pinter.png" /></a><a href="mailto:sales@cedarshed.com.au"> <img src="/img/mail.png" /></a></div>
				</div>
				<div class="col-md-8">
					<div class="next_back">
						<?php if($prev_nid != 0){?><a href="<?php echo url('node/'.$prev_nid)?>" class="next-back">< Prev Product</a><?php }?>
						<?php if($next_nid != 0){?><a href="<?php echo url('node/'.$next_nid)?>" class="next-back">Next Product ></a><?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php print render($content['body']);?>
		<?php print render($content['field_product_features']);?>
		<div class="tab">
			<div class="tab tab_control">
				<div class="tab_c tab1_control allControl active" onclick="javascript: return activeTab('tab1')">Order ONline</div>
				<div class="tab_c tab2_control allControl" onclick="javascript: return activeTab('tab2')">Enquire</div>
			</div>
			<div class="tab_content tab">
				<div class="tab1 tabcontent">
					<?php print render($content['product:title']);?>
					<?php print render($content['product:commerce_price']);?>

					<h3>recommended accessories:</h3>
					<?php //print render($content['product:field_accessories']);?>
					<?php print render($content['field_product']);?>
				</div>
				<div class="tab2 tabcontent">
					<?php
						$block = block_load('webform', 'client-block-44');
						$blockrender = _block_render_blocks(array($block));
						$render_aray  = _block_get_renderable_array($blockrender);
						$output = drupal_render($render_aray);
						print $output;
					?>
				</div>
			</div>
		</div>
		<div class="browse">

			<a href="<?php echo $base_url?>/gallery">browse gallery</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	function activeTab(classname){
		var classActive = '.' + classname;
		(jQuery)('.tabcontent').hide();
		(jQuery)(classActive).show();
		(jQuery)('.allControl').removeClass('active');
		if(classname == 'tab1'){
			(jQuery)('.tab1_control').addClass('active');
		}else{
			(jQuery)('.tab2_control').addClass('active');
		}
	}
	(jQuery)(function(){
		activeTab('tab1');
	});
</script>

