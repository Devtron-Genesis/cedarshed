
<div id="slider" class="nivoSlider theme-default">
    <?php foreach($data as $row) { ?>
    <a href="<?php if(isset($row->field_link['und'])){ echo $row->field_link['und'][0]['value'];}else{
			echo "#";
		}?>"><img src="<?php print (image_style_url('slidehome',$row->field_image['und'][0]['uri']));?>" alt=""></a>
    <?php  } ?>
</div>
