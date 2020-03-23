<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package yourweblayout
 */

get_header(); ?>
</div><!-- .container -->

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">	
				<div class="row">
					<div class="col-sm-8 col-md-9">
						<?php if ( have_posts() ) : ?>
							<header class="page-header">
								<h1 class="page-title">
									<?php
										if ( is_category() ) :
											single_cat_title();

										elseif ( is_tag() ) :
											single_tag_title();

										elseif ( is_author() ) :
											printf( __( 'Author: %s', 'yourweblayout' ), '<span class="vcard">' . get_the_author() . '</span>' );

										elseif ( is_day() ) :
											printf( __( 'Day: %s', 'yourweblayout' ), '<span>' . get_the_date() . '</span>' );

										elseif ( is_month() ) :
											printf( __( 'Month: %s', 'yourweblayout' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'yourweblayout' ) ) . '</span>' );

										elseif ( is_year() ) :
											printf( __( 'Year: %s', 'yourweblayout' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'yourweblayout' ) ) . '</span>' );

										elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
											_e( 'Asides', 'yourweblayout' );

										elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
											_e( 'Galleries', 'yourweblayout');

										elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
											_e( 'Images', 'yourweblayout');

										elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
											_e( 'Videos', 'yourweblayout' );

										elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
											_e( 'Quotes', 'yourweblayout' );

										elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
											_e( 'Links', 'yourweblayout' );

										elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
											_e( 'Statuses', 'yourweblayout' );

										elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
											_e( 'Audios', 'yourweblayout' );

										elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
											_e( 'Chats', 'yourweblayout' );

										else :
											_e( 'Archives', 'yourweblayout' );

										endif;
									?>
								</h1>
								<?php
									// Show an optional term description.
									$term_description = term_description();
									if ( ! empty( $term_description ) ) :
										printf( '<div class="taxonomy-description">%s</div>', $term_description );
									endif;
								?>
							</header><!-- .page-header -->

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );
								?>
							<?php endwhile; ?>
							<?php yourweblayout_paging_nav(); ?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					</div><!-- .col -->
					<div class="col-sm-4 col-md-3">
						<?php get_sidebar(1); ?>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</section><!-- #primary -->

<div class="container">
<?php get_footer(); ?>
