<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package yourweblayout
 */

get_header(); ?>
</div><!-- .container -->
<?php
    if(has_post_thumbnail()){
        echo '<div class="leaderboard-image">';
        the_post_thumbnail('full');
        echo '</div>';
    }

    else{
        echo '<div class="leaderboard-without-image"></div>';
    }
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">						
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'page' ); ?>
						<?php endwhile; // end of the loop. ?>
					</div><!-- .col -->
				</div><!-- .row -->
				<div class="row">
					<div class="col-sm-12">
						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>	
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<div class="container">
<?php get_footer(); ?>