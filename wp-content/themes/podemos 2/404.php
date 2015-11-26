<?php get_header(); ?>
<div id="page" class="single">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<div class="single_post">
					<header>
							<h1 class="title"><?php _e('Error 404', 'mythemeshop'); ?></h1>
					</header>
					<div class="post-content">
						<p><?php _e('Lo sentimos, no se ha encontrado la p&aacute;gina \'t', 'mythemeshop'); ?><br/>
						<?php _e('Por favor verifique la dirección o utilice el buscador.', 'mythemeshop'); ?></p>
						<?php get_search_form();?>
						<p class="clear"></p>
					</div><!--.post-content--><!--#error404 .post-->
				</div><!--#content-->
			</div><!--#content_box-->
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>