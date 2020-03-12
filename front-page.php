<?php
/**
 * The template for displaying the front-page
 *
 * This is the template that displays the front-page by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pied-cormorant
 */

get_header();
?>
	<div class='section-evenements'>
		<div class="section-evenements-conteneur">
			<h1 class="section-title">Nos dernière conférences</h1>
			<ul>
				<?php 
				// the query
				$the_query = new WP_Query( array(
					'category_name' => 'conference',
					'posts_per_page' => 4,
				)); 
				?>

				<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
				<li>
                    <div class="site-conference">
                        <?php the_post_thumbnail() ?>
                        <div class="site-conference-info">
                            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?> <?php echo get_the_date( 'Y-m-d' ); ?></h3></a>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </li>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
				<li><?php __("Pas d'événement"); ?></li>
				<?php endif; ?>
			</ul>
		</div>
    </div>
    <h1 class="section-title">Voici les dernières nouvelles</h1>
    <div id="news" class="site-news">
        
		<?php 
		// the query
		$the_query = new WP_Query( array(
			'category_name' => 'nouvelle',
			'posts_per_page' => 4,
		)); 
		?>

		<?php if ( $the_query->have_posts() ) : ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="site-news-container-unique">
            <a href="<?php the_permalink(); ?>"><h1 class="site-news-news-post-title"><?php the_title(); ?></h1></a>
            <?php the_post_thumbnail() ?>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <span><?php __('Pas de nouvelle'); ?></span>
        <?php endif; ?>
            
    </div><!-- #main -->

<?php
get_sidebar();
get_footer();