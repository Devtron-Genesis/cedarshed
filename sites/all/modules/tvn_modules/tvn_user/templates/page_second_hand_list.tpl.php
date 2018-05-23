
	<?php foreach($data as $row){?>
    
        	<div class="image" style="margin-top:20px;">
            	<a href="<?php print (image_style_url('lightbox',$row->field_image['und'][0]['uri']));?>" rel="lightbox[roundtrip]">
                	<img src="<?php print (image_style_url('smallpage',$row->field_image['und'][0]['uri']));?>">
                 </a>
			</div>	
    <?php }?>
    

