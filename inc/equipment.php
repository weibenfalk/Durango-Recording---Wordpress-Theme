<?php
/**
 * Durango Recording Equipment
 *
 * @package Durango_Recording
 */

?>
<div style="margin:0 0 40px 0; padding:0 0 0 0;height:67px">
    <a class="buttonlink" href="#mics" data-toggle="collapse">Equipment and Microphones</a>
</div>

<div id="mics" class="collapse">
    <div class="row">
        <?php $args = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'equipment_types',
                        'field' => 'slug',
                        'terms' => array( 'microphones' )
                    ),
                ),
                'post_type' => 'equipment'
            );

        $loop = new WP_Query($args);
            if($loop->have_posts()) {
                $term = $wp_query->queried_object;
                while($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-sm-4"> <?php
                        echo get_the_content(); ?>
                    </div>
                <?php endwhile;
            } ?>
    </div>
</div>

<div style="margin:0 0 40px 0; padding:0 0 0 0;height:67px">
    <a class="buttonlink" href="#instruments" data-toggle="collapse">Instruments</a>
</div>

<div id="instruments" class="collapse">
    <div class="row">
        <?php $args = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'equipment_types',
                    'field' => 'slug',
                    'terms' => array( 'instruments' )
                ),
            ),
            'post_type' => 'equipment'
        );

        $loop = new WP_Query($args);
        if($loop->have_posts()) {
            $term = $wp_query->queried_object;
            while($loop->have_posts()) : $loop->the_post();
                ?><div class="col-sm-4"> <?php
                    echo get_the_content(); ?>
                </div>
            <?php endwhile;
        } ?>
    </div>
</div>

<?php
