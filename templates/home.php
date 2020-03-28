<?php /* Template Name: Home page */  ?>

<?php get_header();?>

<?php echo do_shortcode('[home_slider]')?>
<?php $title = get_field('title');
    $subtitle = get_field('subtitle');
    $url = get_field('link');
    $link = '#'; 
?>

<div class="container slider-box">
    <div class="row">
        <div class="col-sm-12">
            <div class="flex">
                <div class="title">
                    <h3><?php echo $title?></h2>
                    <p><?php echo $subtitle?></p>
                </div>
                <div class="url">
                    <a href="<?php echo $link ?>"><?php echo $url ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo do_shortcode('[content]')?>
<?php echo do_shortcode('[testimonial]')?>


<?php get_footer();?>