<link rel="stylesheet" type="text/css" href="css/layout.css">
<div id="content_area">
<div id="content">
	<div id="struct_txt">
		<div class="struct_txt_content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- tpl-single-block-top-video -->
			<div class="struct_txt_content">
				<div class="struct_txt_right col_x2_right">
					<div class="col_x2_right_x2">
						<div class="struct_txt_right_content_tit">
							<h1>
								<?php the_title(); ?>
							</h1>
						</div>
					</div>
				</div>
				<div class="struct_txt_left col_x3_x1 hide_in_small_screen"></div>
				<div class="clearfix"></div>
			</div>
			<!--<div class="struct_txt_content">
				<div class="struct_txt_right col_x2_right">
					<div class="struct_txt_content_featured_img">
					</div>
				</div>
				<div class="struct_txt_left col_x3_x1 hide_in_small_screen"></div>
				<div class="clearfix"></div>
			</div> -->
<!-- tpl-single-block-top-mini-gal -->
			<div class="struct_txt_content">
				<div class="struct_txt_right col_x2_right">
					<div class="struct_txt_right_content">
						<div class="struct_txt_right_content_main col_x2_right_x2">
							<?php if( have_rows('subtitulos_prensa_es') ): ?>
							<div class="struct_txt_right_content_subtit">
								<ul>
									<?php while ( have_rows('subtitulos_prensa_es') ) : the_row(); ?>
									<li>
										<?php the_sub_field('subtitulo_prensa_es'); ?>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>
							<?php endif; ?>
							<div class="struct_txt_right_content_txt">
								<div class="articles_txt_format">
									<?php the_field('cuerpo_prensa_es'); ?>
								</div>
<!-- tpl-single-block-bottom-share -->
							</div>
						</div>
						<div class="struct_txt_right_content_sidebar col_x2_right_x1">
<!-- tpl-single-block-right-mini-gal -->
<!-- tpl-single-block-right-info -->
<!-- tpl-single-block-right-social -->
<!-- tpl-single-block-right-images -->
						</div>
					</div>
				</div>
				<?php endwhile; endif; ?>
				<div class="struct_txt_left col_x3_x1">
<!-- tpl-single-block-left-nav -->
<!-- tpl-single-block-left-articles -->
				</div>
				<div class="clearfix"></div>
			</div>
<!-- tpl-single-block-bottom-articles -->
		</div>
	</div>
</div>
