<?php

// Template Name:Portfolio

get_header(); ?>
      <!-- Header Area Start -->
<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_title(); ?></h4>
                    <ul>
                    <li><a href="<?php echo home_url('/') ?>"></a>Home</li> / 
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- projectss Area Start -->
<section class="projects-area pb-100 pt-100" id="projects">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="portfolio-menu mb-40 text-center">

                     <button class="active" data-filter="*">ALL</button>


                     <?php
                     
                     $cats = get_terms('portfolio-cat');
                     foreach( $cats as $cat){
                     
                     
                     ?>

                     <button data-filter=".<?php echo $cat->slug; ?>" class=""><?php echo $cat->name; ?> </button>

                     <?php } ?>
                  </div>
               </div>
            </div>
            <div class="row grid no-gutters">



            <?php 
               
               $args = array(
                  'post_type' => 'agency_portfolio',
                  
               );
               $agency_portfolio_query = new WP_Query($args);
               while($agency_portfolio_query->have_posts()) : $agency_portfolio_query->the_post();
         
                   ?>

               <div class="col-md-4 grid-item <?php $cats = get_the_terms(get_the_ID(),'portfolio-cat');
                     foreach( $cats as $cat){ echo $cat->slug.' ';  } ?>">
                  <div class="single-portfolio">
                     <?php the_post_thumbnail();?>
                     <div class="portfolio-hover">
                        <div class="portfolio-content">
                           <h3><a href="<?php the_permalink(); ?>" class=""><i class="fa fa-link"></i> <?php echo the_title();?> <span></span></a></h3>
                        </div>
                     </div>
                  </div>
               </div>

               <?php endwhile; ?>
            </div>
         </div>
      </section>
      <!-- projectss Area End -->
<?php

get_footer();
?>