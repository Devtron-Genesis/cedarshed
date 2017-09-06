<?php
/**
* @file
* Default theme implementation to display a single Drupal page.
*
* The doctype, html, head and body tags are not in this template. Instead they
* can be found in the html.tpl.php template in this directory.
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
* - $page['help']: Dynamic help text, mostly for admin pages.
* - $page['highlighted']: Items for the highlighted content region.
* - $page['content']: The main content of the current page.
* - $page['sidebar_first']: Items for the first sidebar.
* - $page['sidebar_second']: Items for the second sidebar.
* - $page['header']: Items for the header region.
* - $page['footer']: Items for the footer region.
*
* @see bootstrap_preprocess_page()
* @see template_preprocess()
* @see template_preprocess_page()
* @see bootstrap_process_page()
* @see template_process()
* @see html.tpl.php
*
* @ingroup templates
*/
global $base_url;
$path =  $base_url.'/'.drupal_get_path('theme', 'bootstrap_sub');

?>
<header class="header">
  <div class="row">

    <div class="col-lg-3 col-sm-6 col-xs-6 logo">
      <?php if ($logo): ?>
        <a class="navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>
    </div><!--  end.logo -->

    <?php if (!empty($page['header_center'])): ?>

      <div class="col-lg-3 col-sm-6 col-xs-6 contact-info">
        <div class="inline">
          <?php print render($page['header_center']); ?>
        </div>
      </div> <!-- end.contact-info -->
    <?php endif; ?>

    <div class="col-lg-6 col-sm-12 col-xs-12 main-menu">
      <nav class="navbar navbar-modern" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
            <!--  <span class="sr-only">Menu</span> -->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="main-navigation">
          <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($secondary_nav)): ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>

        </div>
      </nav><!--end nav-->
      <?php if (!empty($page['block_mobile'])): ?>
        <div class="mobile_logo">
          <?php print render($page['block_mobile']); ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($page['checkout'])): ?>
        <div class="checkout">
          <?php print render($page['checkout']); ?>
        </div>
      <?php endif; ?>
    </div> <!-- end.main-navigation -->
  </div>
</header><!--end header-->
<div class="content_site">
  <div class="sliders">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        $count = 1;
        $type = "slide_front";
        $nodes = node_load_multiple(array(), array('type' => $type, 'status' => 1));
        foreach($nodes as $products):
          $image = file_create_url($products->field_image['und'][0]['uri']);
        $image_mobile = file_create_url($products->field_image_mobile['und'][0]['uri']);
        $body = $products->body['und'][0]['value'];

        ?>
        <div class="item <?php if($count == 1){?> active <?php }?>">
          <span class="image-slide-big"><img src="<?php echo $image?>" style="width:100%" data-src="<?php if($count == 1){?>holder.js/900x500/auto/#7cbf00:#fff/text:<?php }?> " alt="First slide"></span>
          <span class="image-slide-mobile"><img class="active" src="<?php echo $image_mobile?>" style="width:100%" data-src="<?php if($count == 1){?>holder.js/900x500/auto/#7cbf00:#fff/text:<?php }?> " alt="First slide"></span>
          <div class="container">
            <div class="carousel-caption">
              <?php echo $body?>
            </div>
          </div>
        </div>

        <?php $count ++; endforeach; ?>

      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
<!--<div class="video">
<a class="colorbox-inline" href="?width=870&height=565&inline=true#lightboxthis"><img src="/images/video.png" /></a>
<div id="lightboxthis">

<iframe class="wistia_embed" name="wistia_embed" src="https://fast.wistia.net/embed/iframe/c6ui4lfdu9?canonicalUrl=https%3A%2F%2Fcewdarshed.wistia.com%2Fmedias%2Fc6ui4lfdu9&canonicalTitle=cedarshed%20-%20cewdarshed" allowtransparency="true" frameborder="0" scrolling="no" width="870" height="555"></iframe>
</div>

</div>-->

  </div><!--  end.slider -->
  <?php if (!empty($page['topfull'])): ?>
    <div class="topfull-main">
      <div class="section-box container clearfix">
        <?php print render($page['topfull']); ?>
      </div>
    </div>
  <?php endif; ?>


  <div class="section section-cedar-shed">
    <div class="container">
      <?php print render($page['content']); ?>
    </div>
  </div> <!-- end.cedar-shed -->


  <?php if (!empty($page['store'])): ?>
    <div class="section section-store">
      <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <?php
          $count = 1;
          $nodes = $node->field_banners['und'];
          foreach($nodes as $products):
            $item = field_collection_item_load($products['value']);
            $image = file_create_url($item->field_banner_image['und'][0]['uri']);
            $path = $item->field_banner_link['und'][0]['url'];
            $target = $item->field_banner_link['und'][0]['attributes']['target'];
          ?>
          <div class="item <?php if($count == 1){?> active <?php }?>">
            <span class="image-slide-big"><a href="<?php echo $path;?>" target="<?php echo $target;?>"><img src="<?php echo $image?>" style="width:100%" data-src="<?php if($count == 1){?>holder.js/900x500/auto/#7cbf00:#fff/text:<?php }?> " alt="First slide"></a></span>
            <span class="image-slide-mobile"><a href="<?php echo $path;?>" target="<?php echo $target;?>"><img src="<?php echo $image?>" style="width:100%" data-src="<?php if($count == 1){?>holder.js/900x500/auto/#7cbf00:#fff/text:<?php }?> " alt="First slide"></a></span>
          </div>
          <?php $count ++; endforeach; ?>
        </div>
      </div>
    </div> <!-- end.store -->
  <?php endif; ?>

  <?php if (!empty($page['gallery'])): ?>
    <div class="section section-gallery">
      <div class="container">
        <?php print render($page['gallery']); ?>
      </div>
    </div> <!-- end.section-gallery -->
  <?php endif; ?>
  <?php if (!empty($page['contact1']) || !empty($page['contact2']) ): ?>
    <div class="section sestion-contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 contact-socials">
            <?php print render($page['contact1']); ?>
          </div>
          <div class="col-sm-6 form-enquiry">
            <?php print render($page['contact2']); ?>
          </div>
        </div>
      </div>
    </div> <!-- end.section-contact -->
  <?php endif; ?>
  <?php if (!empty($page['accreditations'])): ?>
    <div class="section section-accreditations">
      <div class="container">
        <?php print render($page['accreditations']); ?>
      </div>
    </div>
  <?php endif; ?>

</div> <!-- end.content -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <?php print render($page['footer']); ?>
    </div>
  </div>
</footer>
