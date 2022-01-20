<?php 
    $getname = get_queried_object();
    $args = array(
        'post_type'	  => 'product', // if you want to further filter by post_type
		'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    =>  'slug',
                'terms'    => $getname->slug
            ),
        ),
    );
   
    $query = new WP_Query( $args );
    $products = ($query->posts) ? $query->posts : '';
  
?>

<form action="javascript:;" method="GET">
    <div class="filter-wrapper">
        <div class="_form-group">
            <label for="SortTags">FILTER BY</label>
            <select name="SortTags" id="SortTags" class="filter-input">
                <option value="">All</option>
                <option value="">11oz</option>
                <option value="">12 oz</option>
                <option value="">12oz</option>
                <option value="">15 oz</option>
                <option value="">15oz</option>
                <option value="">Baby</option>
                <option value="">Baby Clothing</option>
                <option value="">Back to School</option>
                <option value="">Bath</option>
                <option value="">Bathroom</option>
                <option value="">beach</option>
                <option value="">beach towel</option>
                <option value="">Black base</option>
                <option value="">Bodysuits</option>
                <option value="">Bottles</option>
                <option value="">Bottles &amp; Tumblers</option>
                <option value="">camo</option>
                <option value="">camouflage</option>
                <option value="">Ceramic</option>
                <option value="">Coffee Mugs</option>
                <option value="">Cotton</option>
                <option value="">Crew neck</option>
                <option value="">curved</option>
                <option value="">DTG</option>
                <option value="">Fall Picks</option>
                <option value="">flat</option>
                <option value="">flexfit</option>
                <option value="">Hat</option>
                <option value="">Hats</option>
                <option value="">Holiday Picks</option>
                <option value="">Home &amp; Living</option>
                <option value="">Hoodie</option>
                <option value="">Jacket</option>
                <option value="">Kids' Clothing</option>
                <option value="">Kitchen</option>
                <option value="">Long Sleeves</option>
                <option value="">Men's Clothing</option>
                <option value="">mens clothing</option>
                <option value="">Mother's Day promotion</option>
                <option value="">Mugs</option>
                <option value="">Onesies</option>
                <option value="">Outdoor</option>
                <option value="">R</option>
                <option value="">Regular fit</option>
                <option value="">Rowdy</option>
                <option value="">Snapback</option>
                <option value="">Stainless steel</option>
                <option value="">Sublimation</option>
                <option value="">Sweater</option>
                <option value="">T-shirts</option>
                <option value="">Towel</option>
                <option value="">Towels</option>
                <option value="">Travel</option>
                <option value="">Trucker</option>
                <option value="">Tumblers</option>
                <option value="">Unisex</option>
                <option value="">White base</option>
                <option value="">Women's Clothing</option>
            </select>
        </div>
        <div class="_form-group">
            <label for="sort_by">SORT BY</label>
            <select name="sort_by" id="SortBy" class="filter-input">
                <option value="">Featured</option>
                <option value="">Best selling</option>
                <option value="" selected="selected">Alphabetically, A-Z</option>
                <option value="">Alphabetically, Z-A</option>
                <option value="">Price, low to high</option>
                <option value="">Price, high to low</option>
                <option value="">Date, old to new</option>
                <option value="">Date, new to old</option>
            </select>
        </div>
    </div>
</form>

<div class="product-lists-wrapper">
    <?php if($products){ ?>
        <?php foreach($products as $prod){ ?>
            <div class="product-item">
                <div class="product-content">
                    <div class="product-item-img responsive-image">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $prod->ID ), 'single-post-thumbnail' );?>
                        <img src="<?=$image[0];?>" alt="Product Item" />
                        <a href="<?=$prod->guid;?>" class="default-cart-btn">View</a>
                    </div>
                    <a href="<?=$prod->guid;?>">
                        <div class="product-description">
                            <h3 class="product-title"><?=$prod->post_title;?></h3>
                            <?php $price = get_post_meta( $prod->ID, '_price', true ); ?>
                            <div class="product-price">
                                From <?=wc_price( $price ); ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php }else{ ?>
        <div class="alert-msg">
            <strong>Sorry. </strong> No products to display.
        </div>
    <?php } ?>
</div>