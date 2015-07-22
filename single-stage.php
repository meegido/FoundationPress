<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 large-12 columns" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0];
						?>

					<div class="row">
						<div class="featured-image" style="background-image: url('<?php echo $thumb_url ?>')" >

						</div>
					</div>
					<?php endif; ?>

				</header>

				
		</article>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
</div>

<div class="row">
	<div class="small-12 large-8 columns" role="main">
		

			<?php do_action( 'foundationpress_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>

					<?php do_action( 'foundationpress_post_before_entry_content' ); ?>

				<div class="entry-content">

				

				<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
					<span>
						<?php $tags = get_the_tags();
						foreach ($tags as $tag) {
							echo '<a href="#">'. $tag->name .'</a>';
							}
						 ?>
					</span>
				</footer>
				<?php do_action( 'foundationpress_post_before_comments' ); ?>
				<?php comments_template(); ?>
				<?php do_action( 'foundationpress_post_after_comments' ); ?>
			</article>

		<?php endwhile;?>

		<?php do_action( 'foundationpress_after_content' ); ?>
	</div>

	<div class="small-12 large-4 columns" >
		<aside>
			<table class="stage-info">
			  <thead>
			    <tr>
			      <th class="<?php echo get_post_custom_values('stage-district')[0];?>">Inicio de la ruta</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Content Goes Here</td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="<?php echo get_post_custom_values('stage-district')[0];?>">Fin de la ruta</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Content Goes Here</td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="<?php echo get_post_custom_values('stage-district')[0];?>">Duración</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td >Content Goes Here</td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="<?php echo get_post_custom_values('stage-district')[0];?>">Máximo de asistentes</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Content Goes Here</td>
			    </tr>
			  </tbody>
			</table>
		</aside>
	</div>
</div>
<?php get_footer(); ?>