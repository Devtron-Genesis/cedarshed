(jQuery)(function(){
	(jQuery)('img').each(function(){
		var checkalt = (jQuery)(this).attr('alt');
		var src = (jQuery)(this).prop('src');
	var name = src.replace(/^.*\/|\.png$/g, '');
	if(checkalt == ''){
			//var newstr = src.replace('/sites/default/files/', ""); 
			(jQuery)(this).attr('alt',name);
		}
	});
	
});