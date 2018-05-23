<?php global $base_url?>
<?php //echo "<pre>";print_r($data);die;?>

<div id="scroller-top">
	<img style="width: 319px; height: 20px;" src="<?php echo $base_url?>/misc/scroller-top.png">
</div>
<div id="hp-news-scroller">
	
	<ul>
		<?php if(count($data)>0){
			foreach($data as $row){
				$body = strip_tags($row->body['und'][0]['value']);
				$url = url("node/".$row->nid);
			?>
				<li>
					<a href="<?php echo $url?>"><?php echo substr($body,0,100);?></a>
				</li>
				
		<?php	}
			
		}?>
			
	</ul>
</div>
<div id="scroller-top">
	<img style="width: 319px; height: 20px;" src="<?php echo $base_url?>/misc/scroller-top.png">
</div>