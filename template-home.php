

<?php // Template Name:Home

get_header(); ?>
 <!-- Slider Area Start -->
 <section class="slider-area" id="home">
         <div class="slider owl-carousel">
        <?php
        $args = [
            "post_type" => "agency_slider",
            "posts_per_page" => "3",
        ];
        $agency_query = new WP_Query($args);
        while ($agency_query->have_posts()):
            $agency_query->the_post(); ?>

            <div class="single-slide" style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="slide-table">
                           <div class="slide-tablecell">
                              <h4><?php if (class_exists("ACF")):
                                  $slider_subtitle = get_field(
                                      "slider_subtitle"
                                  );
                                  echo $slider_subtitle;
                              endif; ?></h4>
                              <h2><?php the_title(); ?></h2>
                              <p><?php the_content(); ?></p>

                              <?php if (class_exists("ACF")):
                                  $btn_text = get_field("slider_button");
                                  if ($btn_text): ?>

                              <a href="<?php the_field(
                                  "slider_button_link"
                              ); ?>" class="box-btn"><?php echo $btn_text; ?><i class="fa fa-angle-double-right"></i></a>
                             <?php endif;
                              endif; ?>    

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <?php
        endwhile;
        ?>
         </div>
      </section>
      <!-- Slider Area Start -->
      <!-- About Area Start -->
      <section class="about-area pt-100 pb-100" id="about">
         <div class="container">
            <div class="row section-title">



        <?php
        $options = get_option("_agency_my_options"); // unique id of the framework

        $header_section = $options["abt-header-section"]; // id of the top bar  field

        if ($header_section) {

            $abt_header_title = $header_section["abt-header-title"];
            $abt_header_subtitle = $header_section["abt-header-subtitle"];
            $abt_header_des = $header_section["abt-header-des"];
            ?>
            
               <div class="col-md-6 text-right">
                  <h3><span><?php echo $abt_header_subtitle; ?></span> <?php echo $abt_header_title; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $abt_header_des; ?> </p>
               </div>

               <?php
        }
        ?>


            </div>
            <div class="row">
               <div class="col-md-7">


               

               <?php
               $header_section = $options["abt-header-content"]; // id of the top bar  field

               if ($header_section) {

                   $abt_content_title = $header_section["abt-content-title"];
                   $abt_content_des = $header_section["abt-content-des"];
                   $abt_content_btn = $header_section["abt-content-btn"];
                   $abt_content_btn_url = $header_section["abt-content-url"];
                   ?>
                  <div class="about">
                     <div class="page-title">
                        <h4><?php echo $abt_content_title; ?></h4>
                     </div>
                     <p><?php echo $abt_content_des; ?></p>

                     <?php if ($abt_content_btn): ?>
                     <a href="<?php echo $abt_content_btn_url; ?>" class="box-btn"><?php echo $abt_content_btn; ?> <i class="fa fa-angle-double-right"></i></a>

                        <?php endif; ?>
                  </div>

                  <?php
               }
               ?>
                        

               </div>
               <div class="col-md-5">


               <?php
               $about_features = $options["abt-header-feature"]; // id of the top bar  field

               if ($about_features) {
                   foreach ($about_features as $about_feature) {

                       $abt_feature_title = $about_feature["abt-feature-title"];
                       $abt_feature_des = $about_feature["abt-feature-des"];
                       $abt_feature_icon = $about_feature["abt-feature-icon"];
                       ?>
                  <div class="single_about">

                     <i class="<?php echo $abt_feature_icon; ?>"></i>
                 

                     <h4><?php echo $abt_feature_title; ?></h4>
                     <p><?php echo $abt_feature_des; ?></p>
                  </div>
                  <?php
                   }
               }
               ?>
               </div>
               
            </div>
         </div>
      </section>
      <!-- About Area End -->
      <!-- Choose Area End -->
      <section class="choose">
         <div class="container">
            <div class="row pt-100 pb-100">
               <div class="col-md-6">
                  <div class="faq">
                     <div class="page-title">
                     <?php
                     $faq_section_title = $options["faq-section-title"]; // id of the top bar  field
                     if ($faq_section_title) { ?>
                        <h4>
                          <?php echo $faq_section_title; ?>
                        </h4> <?php }
                     ?>
                     </div>
                     <div class="accordion" id="accordionExample">

                     <?php
                     $faq_options = $options["faq-option"]; // id of the top bar  field
                     $i = 0;

                     if ($faq_options) {
                         foreach ($faq_options as $faq_option) {

                             $faq_title = $faq_option["faq-title"];
                             $faq_des = $faq_option["faq-des"];
                             $i++;
                             ?>


                        <div class="card">
                           <div class="card-header" id="heading<?php echo $i; ?>">
                              <h5 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                 <?php echo $faq_title; ?>
                                 </button>
                              </h5>
                           </div>
                           <div id="collapse<?php echo $i; ?>" class="collapse <?php if (
                                    $i == 1
                                 ) {
                                    echo "show";
                                 } ?> " aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordionExample">
                              <div class="card-body">
                                 <?php echo $faq_des; ?>
                              </div>
                           </div>
                        </div>

                           <?php
                         }
                     }
                     ?>

                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="skills">
                     <div class="page-title">


                     <?php
                     $skill_section_title = $options["skill-section-title"]; // id of the top bar  field
                     if ($skill_section_title) { ?>


                        <h4><?php echo $skill_section_title; ?></h4>

                        <<?php }
                     ?>

                     </div>

                     
                     <?php
                     $skill_options = $options["skill-option"]; // id of the top bar  field
                     foreach ($skill_options as $skill_option) {

                         $skill_title = $skill_option["skill-title"];
                         $skill_percentage = $skill_option["skill-percentage"];
                         ?>


                     <div class="single-skill">
                        <h4><?php echo $skill_title; ?></h4>
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $skill_percentage; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $skill_percentage; ?>%</div>
                     </div>


                        <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Choose Area End -->
      <!-- Services Area Start -->
      <section class="services-area pt-100 pb-50" id="services">
         <div class="container">
            <div class="row section-title">

          
            <?php
            $serv_header_section = $options["serv-header-section"];
            if ($serv_header_section):

                $serve_subtitle = $serv_header_section["serv-header-subtitle"];
                $serve_title = $serv_header_section["serv-header-title"];
                $serve_des = $serv_header_section["serv-header-des"];
                ?>


               <div class="col-md-6 text-right">
                  <h3><span><?php echo $serve_subtitle; ?></span> <?php echo $serve_title; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $serve_des; ?> </p>
               </div>
               <?php
            endif;
            ?>
            </div>
            <div class="row">

               <?php
               $args = [
                   "post_type" => "agency_service",
                   "posts_per_page" => "6",
               ];
               $agency_service_query = new WP_Query($args);
               while ($agency_service_query->have_posts()):
                   $agency_service_query->the_post(); ?>
               <div class="col-lg-4 col-md-6">
                  <!-- Single Service -->
                  <div class="single-service">
                      <!-- <i class=""></i> -->
                      <?php if (class_exists("ACF")):
                          echo the_field("service_icon");
                      endif; ?>
                     <h4><?php the_title(); ?></h4>
                     <?php the_content(); ?>
                  </div>
               </div>

               <?php
               endwhile;
               ?>
            </div>
         </div>
      </section>
      <!-- Services Area End -->
      
      <!-- Counter Area End -->
      <section class="counter-area">
         <div class="container-fluid">
            <div class="row">

            <?php
            $args = [
                "post_type" => "agency_counter",
                "posts_per_page" => "4",
            ];
            $agency_counter_query = new WP_Query($args);
            while ($agency_counter_query->have_posts()):
                $agency_counter_query->the_post(); ?>


               <div class="col-md-3">
                  <div class="single-counter">
                     <h4><?php if (class_exists("ACF")):
                         the_field("counter_icon");
                     endif; ?><span class="counter"><?php if (
    class_exists("ACF")
):
    the_field("counter_number");
endif; ?></span><?php the_title(); ?></span></h4>
                  </div>
               </div>

               <?php
            endwhile;
            ?>

            </div>
         </div>
      </section>
      <!-- Counter Area End -->
      <!-- Team Area Start -->
      <section class="team-area pb-100 pt-100" id="team">
         <div class="container">
            <div class="row section-title">


            <?php
            $team_header_section = $options["team-header-section"];
            if ($team_header_section):

                $team_subtitle = $team_header_section["team-header-subtitle"];
                $team_title = $team_header_section["team-header-title"];
                $team_des = $team_header_section["team-header-des"];
                ?>

               <div class="col-md-6 text-right">
                  <h3><span><?php echo $team_subtitle; ?></span> <?php echo $team_title; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $team_des; ?> </p>
               </div>
               <?php
            endif;
            ?>
            </div>
            <div class="row">




            <?php
            $args = [
                "post_type" => "agency_team",
                "posts_per_page" => "3",
            ];
            $agency_team_query = new WP_Query($args);
            while ($agency_team_query->have_posts()):
                $agency_team_query->the_post(); ?>

               <div class="col-md-4">
                  <div class="single-team">
                    <?php the_post_thumbnail(); ?>
                     <div class="team-hover">
                        <div class="team-content">
                           <h4><?php the_title(); ?><span><?php if (
    class_exists("ACF")
):
    the_field("team_dignation");
endif; ?></span></h4>
                           <ul>
                              <?php if (class_exists("ACF")):
                                  if (get_field("facebook")) { ?>
                              <li><a href="<?php the_field(
                                  "facebook"
                              ); ?>"><i class="fa fa-facebook"></i></a></li>
                              <?php }
                              endif; ?>

                              <?php if (class_exists("ACF")):
                                  if (get_field("twitter")) { ?>
                              <li><a href="<?php the_field(
                                  "twitter"
                              ); ?>"><i class="fa fa-twitter"></i></a></li>
                              <?php }
                              endif; ?>
                                 
                              <?php if (class_exists("ACF")):
                                  if (get_field("linkdin")) { ?>
                              <li><a href="<?php the_field(
                                  "linkdin"
                              ); ?>"><i class="fa fa-linkedin"></i></a></li>
                              <?php }
                              endif; ?>

                              <?php if (class_exists("ACF")):
                                  if (get_field("google_plus")) { ?>
                              <li><a href="<?php the_field(
                                  "google_plus"
                              ); ?>"><i class="fa fa-google-plus"></i></a></li>
                              <?php }
                              endif; ?>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

               <?php
            endwhile;
            ?>
            </div>
         </div>
      </section>
      <!-- Team Area End -->
     
      <!-- Testimonials Area Start -->
      <section class="testimonial-area pb-100 pt-100" id="testimonials">
         <div class="container">
            <div class="row section-title white-section">

            <?php
            $testimonial_header_section =
                $options["testimonial-header-section"];
            if ($testimonial_header_section):

                $testimonial_subtitle =
                    $testimonial_header_section["testimonial-header-subtitle"];
                $testimonial_title =
                    $testimonial_header_section["testimonial-header-title"];
                $testimonial_des =
                    $testimonial_header_section["testimonial-header-des"];
                ?>


               <div class="col-md-6 text-right">
                  <h3><span><?php echo $testimonial_subtitle; ?></span> <?php echo $testimonial_title; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $testimonial_des; ?></p>
               </div>
               <?php
            endif;
            ?>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="testimonials owl-carousel">

                  


            <?php
            $args = [
                "post_type" => "agency_testimonail",
            ];
            $agency_testimonail_query = new WP_Query($args);
            while ($agency_testimonail_query->have_posts()):
                $agency_testimonail_query->the_post(); ?>

                     <div class="single-testimonial">
                        <div class="testi-img">
                           <?php the_post_thumbnail(); ?>
                        </div>
                        <?php the_content(); ?>
                        <h4><?php the_title(); ?> <span><?php if (
     class_exists("ACF")
 ):
     the_field("client_dignation");
 endif; ?></span></h4>
                     </div>

                     <?php
            endwhile;
            ?>


                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Testimonilas Area End -->
      <!-- Latest News Area Start -->
      <section class="blog-area pb-100 pt-100" id="blog">
         <div class="container">
            <div class="row section-title">

            <?php
            $news_header_section = $options["news-header-section"];
            if ($news_header_section):

                $news_subtitle = $news_header_section["news-header-subtitle"];
                $news_title = $news_header_section["news-header-title"];
                $news_des = $news_header_section["news-header-des"];
                ?>



               <div class="col-md-6 text-right">
                  <h3><span><?php echo $news_subtitle; ?></span> <?php echo $news_title; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $news_des; ?></p>
               </div>

               <?php
            endif;
            ?>
            </div>
            <div class="row">

            <?php
            $args = [
                "post_type" => "post",
                "posts_per_page" => "3",
            ];
            $agency_blog_query = new WP_Query($args);
            while ($agency_blog_query->have_posts()):
                $agency_blog_query->the_post(); ?>
               <div class="col-md-4">
                  <div class="single-blog">
                     <?php the_post_thumbnail(); ?>
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#"><?php echo get_the_date(
                                  "j M Y"
                              ); ?></a></li>
                              <li><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></li>
                           </ul>
                        </div>
                        <p><?php echo substr(get_the_excerpt(), 0, 100); ?></p>
                        <a href="<?php the_permalink(); ?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>

               <?php
            endwhile;
            ?>
            </div>
         </div>
      </section>
      <!-- Latest News Area End -->
      


<?php get_footer(); ?>
