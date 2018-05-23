<div id="gallery">
<ul>
	<?php foreach($data as $row){?>
    	<li>
        	<div class="image">
            	<a href="<?php print (image_style_url('lightbox',$row->field_image['und'][0]['uri']));?>" rel="lightbox[roundtrip]">
                	<img src="<?php print (image_style_url('smallpage',$row->field_image['und'][0]['uri']));?>">
                 </a>
			</div>	
            <div class="image">
            	<a href="<?php print (image_style_url('lightbox',$row->field_image1['und'][0]['uri']));?>" rel="lightbox[roundtrip]">
            		<img src="<?php print (image_style_url('smallpage',$row->field_image1['und'][0]['uri']));?>">
                 </a>
            </div>
            <div class="image">
            	<a href="<?php print (image_style_url('lightbox',$row->field_image2['und'][0]['uri']));?>" rel="lightbox[roundtrip]">
            		<img src="<?php print (image_style_url('smallpage',$row->field_image2['und'][0]['uri']));?>">
                </a>
            </div>
            <div class="image">
            	<a href="<?php print (image_style_url('lightbox',$row->field_image3['und'][0]['uri']));?>" rel="lightbox[roundtrip]">
            		<img src="<?php print (image_style_url('smallpage',$row->field_image3['und'][0]['uri']));?>">
                </a>
            </div>
        </li>
    <?php }?>
</ul>
</div>

