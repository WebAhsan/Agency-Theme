<?php 

get_header();

?>
<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_title(); ?></h4>
                    <ul>
                        <li><a href="<?php echo home_url('/'); ?>"></a>Home</li> / 
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfolio-single pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail(); ?>
                <p><?php the_content(); ?></p>
                <div class="row">


                   <div class="col-xl-12">

                     <h4>project gallery</h4>
                   </div>
                   <div class="row">
                <?php 
                  
                    $gallerys = get_field('portfolio_gallery');
                    if($gallerys){
                    foreach( $gallerys as $gallery){

                ?>
                   <div class="col-xl-4">
                      <div class="project-gallery">
                         <img src="<?php echo $gallery['url']; ?>" alt="">
                      </div>
                   </div>

                <?php
                
                    }}
                
                ?>

                </div>

                </div>
                <br><br>
                <div class="row">
                   <div class="col-xl-12">
                        <h4>project overview</h4>
                        <?php 
                        if(class_exists('ACF') ) :
                        echo the_field('protfolio_video');
                        endif;
                         ?>
                   </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="portfolio-sidebar">
                    <h4>Technology Used</h4>
                    <ul>

                            
                    <?php
                    if(class_exists('ACF') ) :
                        $technologyes = get_field('portfolio_technology');
                        if($technologyes){
                            foreach( $technologyes as $technology){
                            
                    ?>

                        <li><i class="fa fa-arrow-right"></i> <?php echo $technology['tech_name'];?></li>

                            <?php 
                            }} endif;
                            ?>


                    </ul>
                </div>
                <div class="portfolio-sidebar">
                    <h4>project features</h4>
                    <ul>

                    <?php
                    if(class_exists('ACF') ) :
                        $features = get_field('portfolio_feature');
                        if($features){
                            foreach( $features as $feature){
                            
                    ?>

                        <li><i class="fa fa-arrow-right"></i> <?php echo $feature['feature_name'];?></li>


                        <?php }} endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 

get_footer();
?>