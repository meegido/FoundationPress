<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); 

	$args = array(
	      'post_type' => 'stage'
	    );


	$stages = new WP_Query( $args );
?>

<div class="row">

	<?php if( $stages->have_posts() ) : ?>

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php get_template_part( 'promo', get_post_format() ); ?>
		
		<ul class="large-block-grid-4">
			<?php while ( $stages->have_posts() ) : $stages->the_post(); ?>
			
				<?php get_template_part( 'my_content', get_post_format() ); ?>
				
			<?php endwhile; ?>
		</ul>

		<?php else : ?>
			<?php get_template_part( 'my_content', 'stage' ); ?>

		<?php do_action( 'foundationpress_before_pagination' ); ?>

	<?php endif;?>



	<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php } ?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	
</div>
<?php get_footer(); ?>