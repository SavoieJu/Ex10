<?php
/**
* Template pour la categories événement
*/
 
get_header(); ?> 

<main class="nouvelle-main">
    <h1>Categorie Nouvelle</h1>
    <h4>Voici les dernière nouvelles</h4>
    <div class="nouvelle-grille">
    <?php 
		// the query
		$the_query = new WP_Query( array(
			'category_name' => 'nouvelle'
		)); 
		?>

		<?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div>
        <div class="nouvelle-thumbnail">
            <?php the_post_thumbnail() ?>
        </div>
        <div class="nouvelle-title">
            <a href="<?php the_permalink(); ?>"><h1 class="site-news-news-post-title"><?php the_title(); ?></h1></a>
            <p><?php the_excerpt(); ?></p>
            <input type="button" value="Lire la suite..." class="rm" onclick="lireLaSuite(this)" data-state="closed" data-id="<?php echo get_the_ID()?>">
            
        </div>
        <div class="nouvelle-full">
            
        </div>
            
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php wp_enqueue_script( 'script', get_template_directory_uri() . '-enfant/main.js', array ( 'jquery' ), 1.1, true); ?>

        <!-- <div>test1</div>
        <div>test2</div>
        <div>test3</div>
        <div class="test">test4</div>
        <div>test5</div>
        <div>test6</div> -->
    </div>
</main>

<?php get_footer(); ?>