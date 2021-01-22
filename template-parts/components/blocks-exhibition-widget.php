<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Gallery
 */

?>
<?php

if (get_field('exhibition')) :
    $artistTitle = get_field('exhibition')['exhibition_artist'];
    $startDate = get_field('exhibition')['exhibition_start_date'];
    $endDate = get_field('exhibition')['exhibition_end_date'];
endif;
?>

<div class="col-lg-3 widget-container my-3">
    <div class="shadow bg-light">
        <div class="d-flex justify-content-center">
            <div class="no-overflow-container img-block ">
                <a class="" href="<?php echo the_permalink(); ?>">
                    <?php echo the_post_thumbnail('post-thumbnail', ['class' => 'img-widget', 'title' => 'Feature image', 'loading' => 'lazy']); ?>
                </a>
            </div>
        </div>
        <div class="p-4">
            <p class="h6 text-primary font-bold-600">
                <?php echo isset($artistTitle) ? $artistTitle : "" ?>
            </p>
            <?php echo the_title('<p class="h5 font-bold-600">', '</p>'); ?>
            <p class="text-secondary">
                <?php
                echo !empty($startDate) ? $startDate : "";
                echo !empty($endDate) ? " - " . $endDate : "";
                ?>
            </p>
            <div class="text-center">
                <button type="button" class="btn button-dark px-5 py-2 my-2 btn-block">
                    <a class="text-dark" href="<?php echo the_permalink(); ?>">
                        View More
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>