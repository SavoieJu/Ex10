<?php
/**
* Template pour la categories événement
*/
 
get_header(); ?> 

<main class="evenement-main">
    <h1>Nos événements importants cette année</h1>
    <div class="evenement-grille">
    <?php 
		// the query
		$the_query = new WP_Query( array(
			'category_name' => 'evenement'
		)); 
		?>

		<?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php
            $month = get_the_date('n');
            if ($month == "9") {
                $month = 1;
            }
            else if ($month == "10") {
                $month = 2;
            }
            if ($month == "11") {
                $month = 3;
            }
            $day = get_the_date('d');
        ?>
        <div style="
            grid-area: <?php echo $day?> / <?php echo $month?> / span 1 / span 1
        ">
            <a href="<?php the_permalink(); ?>"><h1 class="site-news-news-post-title"><?php the_title(); ?></h1></a><?php echo get_the_date('d M Y')?>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
        <!-- <div>test1</div>
        <div>test2</div>
        <div>test3</div>
        <div class="test">test4</div>
        <div>test5</div>
        <div>test6</div> -->
    </div>
</main>

<?php get_footer(); ?>