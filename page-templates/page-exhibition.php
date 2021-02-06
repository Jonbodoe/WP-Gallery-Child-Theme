<?php
/*
Template Name: Exhibitions Page
*/
get_header();
?>

<?php
$headerImages = get_field('header_images');
if (!empty($headerImages)) :
    $imageOne = $headerImages['image_1'];
    $imageTwo = $headerImages['image_2'];
    $imageThree = $headerImages['image_3'];
    $imageFour = $headerImages['image_4'];
endif;

$headerIntro = get_field('title_&_description');
if (!empty($headerIntro)) :
    $title = $headerIntro['title'];
    $description = $headerIntro['description'];
endif;
?>

<main id="primary" class="site-main no-padding pt-md-5 bg-dark">
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-3 no-padding h-100">
                <div class="header-img-block d-flex align-items-center">
                    <img class="img-oversized" src="<?php echo !empty($imageOne) ? $imageOne : '' ?>" />
                </div>
            </div>
            <div class="col-md-3 no-padding h-100">
                <div class="header-img-block d-flex align-items-center">
                    <img class="img-oversized" src="<?php echo !empty($imageTwo) ? $imageTwo : '' ?>" />
                </div>
            </div>
            <div class="col-md-3 no-padding h-100 ">
                <div class="header-img-block d-flex align-items-center">
                    <img class="img-oversized" src="<?php echo !empty($imageThree) ? $imageThree : '' ?>" />
                </div>
            </div>
            <div class="col-md-3 no-padding h-100 ">
                <div class="header-img-block d-flex align-items-center">
                    <img class="img-oversized" src="<?php echo !empty($imageFour) ? $imageFour : ''  ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="spacer-med"></div>
                <div>
                    <h1 class="text-white h4 font-bold-600">
                        <?php
                        echo !empty($title) ? $title : '';
                        ?>
                    </h1>
                    <div class="text-secondary">
                        <?php
                        echo !empty($description) ? $description : '';
                        ?>
                    </div>
                </div>
                <div class="spacer-med"></div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</main>
<?php
?>
<?php
get_sidebar();
get_footer();
?>