
<?php 
$args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'name',
        'show_count'   => 1,
        'pad_counts'   => 0,
        'hierarchical' => 1,
        'title_li'     => '',
        'hide_empty'   => 0,
        'parent'       => 0,
    );
    echo '<pre>';
    //print_r( get_categories($args));
    echo '</pre>';
    $get_cat = get_categories($args);
?>
<?php if($get_cat): ?>
    <div class="cat-row">
    <?php foreach($get_cat as $getCategory):?>
        <?php if($getCategory->cat_name != 'Uncategorized'):?>
                <div class="cat-items flex-3">
                    <div class="cat-heading">
                        <h3><a href="<?=get_term_link($getCategory->slug, 'product_cat')?>"><?=$getCategory->name;?></a></h3>
                        <a href="javascript:;">View All</a>
                    </div>
                    <div class="cat-image responsive-image">
                    <?php 
                        // get the thumbnail id using the queried category term_id
                        $thumbnail_id = get_term_meta( $getCategory->term_id, 'thumbnail_id', true ); 
                        // get the image URL
                        $image = (wp_get_attachment_url( $thumbnail_id )) ? wp_get_attachment_url( $thumbnail_id ) : '/wp-content/uploads/woocommerce-placeholder.png'; 
                        // print the IMG HTML
                        echo "<img src='{$image}' alt='' width='762' height='365' />";  
                    ?>
                    </div>
                </div>
            <!-- end cat row-->
        <?php endif;?>
    <?php endforeach;?>
    </div>
<?php else:?>
    <h1>No Results Category</h1>
<?php endif;?>

    