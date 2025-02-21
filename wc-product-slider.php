<?php

/**
 * Plugin Name: WooCommerce Featured Product Slider
 * Description: A custom WooCommerce plugin to display featured products using Swiper.js.
 * Version: 1.1
 * Author: John Jovero
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function wc_featured_product_slider()
{
    if (!class_exists('WooCommerce')) {
        return '<p>WooCommerce is not installed.</p>';
    }

    ob_start();

    // Updated query to get only STARRED featured products
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured' // This correctly fetches starred featured products
            )
        )
    );

    $products = new WP_Query($args);

    if ($products->have_posts()) : ?>
        <div class="swiper wc-product-slider mt-4">

            <div class="swiper-wrapper">
                <?php while ($products->have_posts()) : $products->the_post();
                    global $product; ?>
                    <div class="swiper-slide">
                        <a href="<?php the_permalink(); ?>">
                            <div class="product-image-container">
                                <?php the_post_thumbnail('medium'); ?>

                            </div>



                            <h3 class="product-title"><?php the_title(); ?></h3>
                            <p class="price"><?php echo $product->get_price_html(); ?></p>
                        </a>

                        <?php woocommerce_template_loop_add_to_cart(); ?>

                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

            <!-- Swiper Navigation and Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>


        </div>
    <?php else : ?>
        <p>No featured products found.</p>
<?php endif;

    return ob_get_clean();
}
add_shortcode('wc_product_slider', 'wc_featured_product_slider');

// Enqueue Swiper.js and Custom Scripts
function wc_product_slider_scripts()
{
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), null, true);

    wp_enqueue_script('wc-product-slider', plugin_dir_url(__FILE__) . 'js/product-slider.js', array('jquery', 'swiper-js'), null, true);
    wp_enqueue_style('product-carousel-css', plugin_dir_url(__FILE__) . 'css/product-carousel.css');
}
add_action('wp_enqueue_scripts', 'wc_product_slider_scripts');
