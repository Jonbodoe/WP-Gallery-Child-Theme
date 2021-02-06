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
$bannerSection = get_field('main_banner');
if (!empty($bannerSection)) :
    $bannerImage = $bannerSection['banner_image']['url'];
    $firstLogo = $bannerSection['logo_images']['first_logo_image']['url'];
    $secondLogo = $bannerSection['logo_images']['second_logo_image']['url'];
    $bannerExcerpt = $bannerSection['banner_excerpt'];
endif;

$exhibitionSection = get_field("exhibition_section");
if (!empty($exhibitionSection)) :
    $exhibition_title = $exhibitionSection["section_title"];
    $exhibition_excerpt = $exhibitionSection["section_excerpt"];
    $exhibition_button_label = $exhibitionSection["section_button"]["button_label"];
    $exhibition_button_link = $exhibitionSection["section_button"]["button_link"];
endif;

$gallerySection = get_field("gallery_artists");
if (!empty($gallerySection)) :
    $galleryFirstImage = $gallerySection['gallery_images']['first_image'];
    $gallerySecondImage = $gallerySection['gallery_images']['second_image'];
    $galleryThirdImage = $gallerySection['gallery_images']['third_image'];
    $galleryExcerpt = $gallerySection['gallery_content']['gallery_excerpt'];
    $galleryTitle = $gallerySection['gallery_content']['gallery_title'];
    $galleryButtonLabel = $gallerySection['gallery_content']['gallery_button']['button_label'];
    $galleryButtonURL = $gallerySection['gallery_content']['gallery_button']['button_url'];
endif;

$marketSection = get_field('secondary_market');
if (!empty($marketSection)) :
    $marketImage = $marketSection['image'];
    $marketExcerpt = $marketSection['content']['excerpt'];
    $marketTitle = $marketSection['content']['title'];
    $marketButtonLabel = $marketSection['content']['button']['button_label'];
    $marketButtonURL = $marketSection['content']['button']['button_url'];
    $marketFirstImage = $marketSection['carousel_images']['first_image'];
    $marketSecondImage = $marketSection['carousel_images']['second_image'];
    $marketThirdImage = $marketSection['carousel_images']['third_image'];
endif;

$projectSection = get_field('projects');
if (!empty($projectSection)) :
    $projectImage = $projectSection['project_image'];
    $projectFirstImage = $projectSection['project_carousel']['first_image'];
    $projectSecondImage = $projectSection['project_carousel']['second_image'];
    $projectThirdImage = $projectSection['project_carousel']['third_image'];
    $projectExcerpt = $projectSection['project_content']['project_excerpt'];
    $projectTitle = $projectSection['project_content']['project_title'];
    $projectButtonLabel = $projectSection['project_content']['button_label'];
    $projectButtonURL = $projectSection['project_content']['button_url'];
endif;


function getFeaturedExhibitionPosts()
{
    $args = array(
        'post_type' => 'exhibitions',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => 'title',
        'order' => 'date',
    );

    $loop = new WP_Query($args);

    while ($loop->have_posts()) : $loop->the_post();
        get_template_part('./template-parts/components/blocks', 'exhibition-widget');
    endwhile;

    wp_reset_postdata();
}

function getLatestExhibitionPost()
{
    $args = array(
        'post_type' => 'exhibition',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'orderby' => 'title',
        'order' => 'date',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) : $loop->the_post();

        // echo !empty($artistTitle)? $artistTitle : "";
        echo the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid img-widget', 'title' => 'Feature image', 'loading' => 'lazy']);

    // echo !empty($startDate)? $startDate : ""; 
    // echo !empty($endDate)? " - " . $endDate : "";
    endif;

    wp_reset_postdata();
}


?>
<!-- <div class="black-opacity-background"> -->

<div class="container-fluid black-opacity-background no-padding pt-md-5">
    <div class="container-fluid jumbotron-image shadow" style="background-image: url('<?php echo isset($bannerImage) ? $bannerImage : ""; ?>')">
        <div class="container h-100 d-flex align-items-center">
            <div class="row pt-md-3">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 border-right border-left">
                    <div>
                        <div class="p-md-4 d-flex justify-content-center">
                            <div class="text-center">
                                <img class="img-logo py-1" src="<?php echo isset($firstLogo) ? $firstLogo : ""; ?>" alt="gallery's logo brand">
                                <img class="img-logo py-1" src="<?php echo isset($secondLogo) ? $secondLogo : ""; ?>" alt="gallery's logo brand">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <div class="text-gray text-center">
                                <?php echo isset($bannerExcerpt) ? $bannerExcerpt : ""; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</div>


<div class="bg-dark shadow">
    <div class="container">
        <div class="spacer-sm"></div>
        <div class="py-4">
            <h1 class="text-light text-center no-margin">
                <?php
                echo $exhibition_title;
                ?>
            </h1>
            <p class="text-center text-secondary h6">
                <?php
                echo $exhibition_excerpt;
                ?>
            </p>
        </div>
        <div class="text-center">
            <button type="button " class="btn button-light px-4 py-3">
                <a class="text-light" href="<?php echo $exhibition_button_link; ?>">
                    <?php echo $exhibition_button_label; ?>
                </a>
            </button>
        </div>
        <div class="spacer-lg"></div>
    </div>
</div>
<div>
    <div class="container-fluid px-lg">
        <div class="row indent-overflow">
            <?php
            getFeaturedExhibitionPosts();
            ?>
        </div>
    </div>
</div>
<div class="spacer-med"></div>
<!-- <div class="container-fluid bg-light shadow"> -->
    <div class="container-fluid bg-light px-lg shadow">
        <div class="row">
            <div class="col-lg-6">
                <div id="carouselIndicatorsGallery" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        echo !empty($galleryFirstImage) ? '<li data-target="#carouselIndicatorsGallery" data-slide-to="0" class="active"></li>' : ''
                        ?>
                        <?php
                        echo !empty($gallerySecondImage) ? '<li data-target="#carouselIndicatorsGallery" data-slide-to="1"></li>' : '';
                        ?>
                        <?php
                        echo !empty($galleryThirdImage) ? '<li data-target="#carouselIndicatorsGallery" data-slide-to="2"></li>' : '';
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        echo !empty($galleryFirstImage) ?
                            '<div class="carousel-item active">
                            <img class="d-block w-100" src="' . $galleryFirstImage . '"alt="First slide">
                        </div>' : '';
                        ?>
                        <?php
                        echo !empty($gallerySecondImage) ?
                            '<div class="carousel-item">
                            <img class="d-block w-100" src="' . $gallerySecondImage . '" alt="Second slide">
                        </div>' : '';
                        ?>
                        <?php
                        echo !empty($galleryThirdImage) ?
                            '<div class="carousel-item">
                            <img class="d-block w-100" src="' . $galleryThirdImage . '" alt="Second slide">
                        </div>' : '';
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselIndicatorsGallery" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselIndicatorsGallery" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="h-100 d-flex align-items-center">
                    <div class="p-3">
                        <h2 class="text-primary font-bold-600 py-3">
                            <?php echo $galleryTitle; ?>
                        </h2>
                        <div class="text-secondary">
                            <?php
                            echo $galleryExcerpt;
                            ?>
                        </div>
                        <div class="py-3">
                            <a href="<?php echo $galleryButtonURL; ?>">
                                <button type="button" class="btn button-dark px-5 py-2 my-2">
                                    <?php echo $galleryButtonLabel; ?>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</div>
</div>
<div class="spacer-med"></div>

<div class="container-fluid">
    <div class="row images-row shadow">
        <div class="col-lg-3 bg-light no-padding">
            <div class="bg-image dark-overlay img-fill" style="background-image: url('<?php echo !empty($marketImage) ? $marketImage : ""; ?>')"></div>
        </div>
        <div class="col-lg-3 bg-primary d-flex align-items-center">
            <div class="text-gray p-4">
                <h2 class="text-white font-bold-600 py-3 h4">
                    <?php echo $marketTitle; ?>
                </h2>
                <?php
                echo $marketExcerpt;
                ?>
                <div class="pt-3">
                    <a href="<?php echo $marketButtonURL; ?>">
                        <button type="button" class="btn button-light px-5 py-2 my-2 text-white">
                            <?php echo $marketButtonLabel; ?>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 bg-light no-padding hide-mobile">
            <div id="carouselIndicatorsMarket" class="carousel slide hide-mobile" data-ride="carousel" data-interval="7000">
                <ol class="carousel-indicators">
                    <?php
                    echo !empty($marketFirstImage) ? '<li data-target="#carouselIndicatorsMarket" data-slide-to="0" class="active"></li>' : ''
                    ?>
                    <?php
                    echo !empty($marketSecondImage) ? '<li data-target="#carouselIndicatorsMarket" data-slide-to="1"></li>' : '';
                    ?>
                    <?php
                    echo !empty($marketThirdImage) ? '<li data-target="#carouselIndicatorsMarket" data-slide-to="2"></li>' : '';
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    echo !empty($marketFirstImage) ?
                        '<div class="carousel-item bg-image active" style="background-image: url(' . (isset($marketFirstImage) ? $marketFirstImage : "") . ')">
                        </div>' : '';
                    ?>
                    <?php
                    echo !empty($marketSecondImage) ?
                        '<div class="carousel-item bg-image" style="background-image: url(' . (isset($marketSecondImage) ? $marketSecondImage : "") . ')">       
                        </div>' : '';
                    ?>
                    <?php
                    echo !empty($marketThirdImage) ?
                        '<div class="carousel-item bg-image" style="background-image: url(' . (isset($marketThirdImage) ? $marketThirdImage : "") . ')">       
                        </div>' : '';
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselIndicatorsMarket" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicatorsMarket" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <!-- <div class="spacer-med"></div> -->
    <!-- <div class="spacer-med"></div> -->
</div>
<div class="container-fluid">
    <div class="row images-row shadow flex-wrap-reverse">
        <div class="col-lg-6 bg-light no-padding hide-mobile">
            <div id="carouselIndicatorsProject" class="carousel slide" data-ride="carousel" data-interval="7000">
                <ol class="carousel-indicators">
                    <?php
                    echo !empty($projectFirstImage) ? '<li data-target="#carouselIndicatorsProject" data-slide-to="0" class="active"></li>' : ''
                    ?>
                    <?php
                    echo !empty($projectSecondImage) ? '<li data-target="#carouselIndicatorsProject" data-slide-to="1"></li>' : '';
                    ?>
                    <?php
                    echo !empty($projectThirdImage) ? '<li data-target="#carouselIndicatorsProject" data-slide-to="2"></li>' : '';
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    echo !empty($projectFirstImage) ?
                        '<div class="carousel-item bg-image active" style="background-image: url(' . (isset($projectFirstImage) ? $projectFirstImage : "") . ')">
                        </div>' : '';
                    ?>
                    <?php
                    echo !empty($projectSecondImage) ?
                        '<div class="carousel-item bg-image" style="background-image: url(' . (isset($projectSecondImage) ? $projectSecondImage : "") . ')">       
                        </div>' : '';
                    ?>
                    <?php
                    echo !empty($projectThirdImage) ?
                        '<div class="carousel-item bg-image" style="background-image: url(' . (isset($projectThirdImage) ? $projectThirdImage : "") . ')">       
                        </div>' : '';
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselIndicatorsProject" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicatorsProject" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 bg-info d-flex align-items-center">
            <div class="text-gray p-4">
                <h2 class="text-white font-bold-600 py-3 h4">
                    <?php echo $projectTitle; ?>
                </h2>
                <?php
                echo $projectExcerpt;
                ?>
                <div class="pt-3">
                    <a href="<?php echo $projectButtonURL; ?>">
                        <button type="button" class="btn button-light px-5 py-2 my-2 text-white">
                            <?php echo $projectButtonLabel; ?>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 bg-light no-padding">
            <div class="bg-image dark-overlay img-fill" style="background-image: url('<?php echo !empty($projectImage) ? $projectImage : ""; ?>')"></div>
        </div>
    </div>
</div>
<?php
// echo is_user_logged_in();
?>