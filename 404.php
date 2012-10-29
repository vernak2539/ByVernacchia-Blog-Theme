<?php
get_header();
?>
		<style type="text/css">
			#right p {
				margin:0 0 1px 0;
			}
			#right #toDo, #right #toDo li {
				list-style:disc;
				padding:3px 0;
			}
			#toDo {
				margin:0 0 0 20px;
			}
		</style>

        	<h3>Oooops...404</h3>
			<p style="font-size:14px;color:#999;font-style:italic">Now that's not right. This page, <?php echo $_SERVER['REQUEST_URI']; ?>, doesn't exist and probably never has. If you feel you've reached it in error, please <a href="/contact">contact me</a> about it.</p>
			<div style="height:359px; background:url(/images/404.png) no-repeat;"></div>
            <p style="font-size:14px;color:#999;font-style:italic">And stop breaking my site. Look at what you have done.</p>
        </div>
        <div id="right">
			<?php get_sidebar(); ?> 
        </div>
<?php get_footer(); ?>