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
						<section class="navigation">
							<div class="previous">
								<?php next_post_link('<strong>%link</strong>', 'ᐊ Ir a ruta anterior'); ?>
							</div>
							<div class="post">
								<?php previous_post_link('<strong>%link</strong>', 'Ir a ruta siguiente ᐅ'); ?>
							</div>
						</section>
					</div>
					<?php endif; ?>
				</header>

		</article>
		<?php endwhile;?>

		<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
</div>

<div class="row">
	<div class="small-12 large-8 columns reset-padding-left" role="main">
		<?php do_action( 'foundationpress_before_content' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<header>
					<h1 class="entry-title-stage"><?php the_title(); ?></h1>
				</header>
				<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<span class="route-tag">
					<?php $tags = get_the_tags();
					foreach ($tags as $tag) {
						echo '<a href="#">'. "#". $tag->name .'</a>';
						}
					 ?>
				</span>
			</div>
			<div class="entry-content-stage">
				<?php the_content(); ?>
			</div>

			<div class="map">
				<iframe src="https://www.google.com/maps/d/embed?mid=zowQ-YO1Y8Lc.kk1rSSWKmEwo" width="100%" height="480"></iframe>
			</div>
			<?php do_action( 'foundationpress_post_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_post_after_comments' ); ?>
		</article>

		<?php endwhile;?>

		<?php do_action( 'foundationpress_after_content' ); ?>
	</div>
	<div class="small-12 large-4 columns reset-table-padding" >
		<aside>
			<table class="stage-info">
			  <thead>
			    <tr>
			      <th class="title-field">DÍA</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td class="content-field <?php show_district()?>"><?php echo get_post_custom_values('stage_date')[0];?></td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="title-field">HORA</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td class="content-field <?php show_district()?>"><?php echo get_post_custom_values('stage_hour')[0];?></td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="title-field">INICIO</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td class="content-field <?php show_district()?>"><?php echo get_post_custom_values('stage_meeting')[0];?></td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="title-field">DURACIÓN</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td class="content-field <?php show_district()?>">Content Goes Here</td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="title-field">MÁXIMO DE ASISTENTES</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td class="content-field <?php show_district()?>"><?php echo get_post_custom_values('stage_maxpeople')[0];?></td>
			    </tr>
			  </tbody>
			  <thead>
			    <tr>
			      <th class="title-field">PRECIO</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td class="content-field <?php show_district()?>"><?php echo get_post_custom_values('stage_price')[0];?></td>
			    </tr>
			  </tbody>
			</table>

		</aside>
		<div class="row">
			<div class="small-12 large-12 colums">
				<a class="button large register <?php show_district()?>" id="register-button"><span id='walker-icon' class="icon-logo-walker pink left"></span><p class="text-button">QUIERO IR...</p></a>
			</div>
		</div>
		<div class="row">
			<div class="small-12 large-12 columns">

				<div class="register-form" id="register-form">
					<?php echo do_shortcode( '[contact-form-7 id="148" title="Formulario de registro" ]' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>