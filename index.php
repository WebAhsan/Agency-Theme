<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agency
 */

get_header();
?>

<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4> <?php echo single_post_title(); ?></h4>
                    <ul>
                        <li><a href="<?php echo site_url(); ?>"></a>Home</li> / 
                        <li><?php echo single_post_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-area pb-100 pt-100" id="blog">
         <div class="container">
            <div class="row">	
			<?php 
				if(have_posts()):
					while(have_posts()) : the_post();
			?>
               <div class="col-md-4">
                  <div class="single-blog">
                     <?php the_post_thumbnail();?>
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#"><?php echo get_the_date( 'j M Y' ); ?></a></li>
                              <li><a href="<?php the_permalink();?>"><?php the_author(); ?></a></li>
                              <li><a href="<?php the_permalink();?>"><?php the_category(' / '); ?></a></li>
                           </ul>
                        </div>
                        <p><?php echo substr(get_the_excerpt(), 0,100);?></p>
                        <a href="<?php the_permalink();?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
				<?php 
				endwhile;		
			endif;
				?>
            </div>
         </div>
      </section>
      <!-- Latest News Area End -->

<?php
get_footer();
