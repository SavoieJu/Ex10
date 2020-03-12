<?php
/**
* Template pour la categories événement
*/
 
get_header(); ?> 

<main class="cours-main">
    <h1>Quelques cours du TIM</h1>
    <div class="cours-grille">
        <?php 
            // the query
            $the_query = new WP_Query( array(
                'category_name' => 'cours',
                'posts_per_page' => 500,
                'orderby' => 'title',
                'order' => 'asc'
            )); 
        ?>

        <?php 
            $domaines = ['Environnement', 'Animation', 'Design', 'programmation', 'Intégration'];
        ?>
        <?php if ( sizeof($domaines)>0 ) :?>
            <?php while ( sizeof($domaines)>0 ) : ?>
                <div class="titre-domaine">
                    <h1><?php echo $domaines[0] ?></h1>
                </div>
                <?php array_shift($domaines); ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php 
            $combinations = array();

            function count_array_values($my_array, $match) { 
                $count = 0; 
                
                foreach ($my_array as $key => $value) 
                { 
                    if ($value == $match) 
                    { 
                        $count++; 
                    } 
                } 
                
                return $count; 
            } 
        ?>

        <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                
                <?php
                    $session = substr(get_the_title(), 4, 1);
                    $domaine = substr(get_the_title(), 5, 1);

                    $current_combination = $session.$domaine;

                    array_push($combinations, $current_combination);
                    $nombredefois = count_array_values($combinations, $current_combination);

                    $margin = "0";
                    $bgColor = "";

                    if ($nombredefois == 1) {
                        $margin = "0px";
                        $bgColor = "";
                    }

                    if ($nombredefois == 2) {
                        $margin = "-40px";
                        $bgColor = "transparent";
                    }

                    if ($nombredefois == 3) {
                        $margin = "40px";
                        $bgColor = "transparent";
                    }  

                ?>
                
                <div class="d<?php echo $domaine ?>" style="
                    grid-area: <?php echo $session+1?> / <?php echo $domaine?> / span 1 / span 1;
                    background-color: <?php echo $bgColor?>;
                ">
                    <a href="<?php the_permalink(); ?>" style="
                        margin-top: <?php echo $margin ?>;
                    ">
                        <h1><?php echo substr(get_the_title(), 0, 7); ?></h1>
                        <!-- <h1 class="session-titre">Session: <?php echo substr(get_the_title(), 4, 1); ?></h1>
                        <h1 class="barre-titre"> - </h1>
                        <h1 class="domaine-titre">Domaine: <?php echo substr(get_the_title(), 5, 1); ?></h1> -->
                    </a>
        </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>