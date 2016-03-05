<?php
/**
 * Search results page
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<section id="main_content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="container">
            <section class="last_post clearfix">
                <h3 class="section_title">Résultats pour : <?php echo get_search_query(); ?></h3>
                <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
                        <header>
                            <figure><a itemprop="url" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="nofollow"><?php echo get_the_post_thumbnail($post_id, 'last_post')?></a></figure>
                            <?php show_parent_category(); ?>
                        </header>
                        <h2 itemprop="headline"><a itemprop="url" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php $the_title = get_the_title(); echo(count_char('60', $the_title)); ?></a></h2>
                        <aside class="post_author clearfix" itemscope itemtype="http://data-vocabulary.org/Person">
                            <figure itemprop="photo"><?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?></figure>
                            <?php
                            /*
                            <h4 rel="author"><a target="_blank" title="Google Plus de <?php echo get_the_author() ; ?>" href="<?php the_author_meta( 'google_plus' ); ?>?rel=author" itemprop="contact"> de <span itemprop="name"><?php echo get_the_author() ; ?></span></a></h4>
                            ?>
                            */
                            <time datetime="<?php the_time( 'Y/m/d g:i:s A' ); ?>" pubdate><?php the_date( 'j F Y'); ?></time>
                        </aside>
                        <p itemprop="alternativeHeadline" class="excerpt"><?php $excerpt = get_the_excerpt();  echo(count_char('140', $excerpt)); ?></p>
                    </article>
                    <?php endwhile; ?>
                <?php else: ?>
                <h3 class="section_title">Il n'y a pas de résultat pour : <?php echo get_search_query(); ?></h3>
                <?php endif; ?>
            </section>
            <?php if (!previous_posts_link){ ?>
			<!-- Condicional para que no salga este código en caso de que no sea necesario -->
			<nav class="page_nav" role="navigation">
				<div class="previous"><?php previous_posts_link( 'Précédents' ); ?></div>
				<div class="next"><?php next_posts_link( 'Suivants', '' ); ?></div>
			</nav>
			<?php }?>
    </div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>


