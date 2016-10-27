<?php if (!defined('THINK_PATH')) exit();?><div class="head-nav">
	<span class="menu"> </span>
		<ul class="cl-effect-16">
			<li class="active"><a href="<?php echo U('Index/index');?>" data-hover="HOME">home</a></li>
			<li><a href="<?php echo U('Index/about');?>" data-hover="ABOUT US">about us</a></li>
			<?php if(is_array($navList)): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/about');?>" data-hover="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="clearfix"> </div>
		</ul>
		
		<script>
			$( "span.menu" ).click(function() {
			  $( ".head-nav ul" ).slideToggle(300, function() {
				// Animation complete.
			  });
			});
		</script>
</div>