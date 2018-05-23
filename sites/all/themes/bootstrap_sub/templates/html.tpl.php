<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $html_attributes:  String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: An array of attribute values for the HTML element.
 *   It is flattened into a string within the variable $html_attributes.
 * - $body_attributes:  String of attributes for the BODY element. It can be
 *   manipulated through the variable $body_attributes_array from preprocess
 *   functions.
 * - $body_attributes_array: An array of attribute values for the BODY element.
 *   It is flattened into a string within the variable $body_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 * @ingroup templates
 */
?>
<!DOCTYPE html>
<html<?php print $html_attributes;?>
<?php print $rdf_namespaces;?>>
<head>
<link rel="profile" href="<?php print $grddl_profile; ?>" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-site-verification" content="Uqn6NP4m52Iy-i9geH47x1A6WkCF-1bzfNoIXJjh3zk" />
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<!-- HTML5 element support for IE6-8 -->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php print $scripts; ?>
<script src="https://code.jquery.com/jquery-migrate-1.3.0.js"></script>

<?php
if( arg(0)=='node' && is_numeric(arg(1)) ) 
{
	$is_thankyou_node = false;
	
	$nid = arg(1);
	$nodecheck = node_load($nid);
	
	$is_product_node  = ($nodecheck->type == 'product') ? true : false;
	
	$arr_list_of_nodes = array('265', '266', '267', '268', '269', '271');
	
	if(in_array($nid, $arr_list_of_nodes)) 
	{
	 $is_thankyou_node = true;
	}
}
 
if(drupal_is_front_page() || $is_product_node): ?>



<?php endif; ?>

<?php if($is_thankyou_node): ?>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 866877707;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "Oa-jCJL68WwQi4KunQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<?php endif; ?>

</head>
<body<?php print $body_attributes; ?>>
  <?php if($is_thankyou_node): ?>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/866877707/?label=Oa-jCJL68WwQi4KunQM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>
  <?php endif; ?>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <div id="wrapper">
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  </div>
</body>
</html>  