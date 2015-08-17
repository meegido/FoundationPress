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
				<a class="button large register <?php show_district()?>" id="register-button"><span class="icon-logo-walker pink left"></span>Quiero ir...</a>
			</div>
		</div>
		<div class="row">
			<div class="small-12 large-12 columns">
				<form class="register-form" id="register-form">
					<fieldset class="user-register">
						<label class="username-register">Nombre*
							<input type="text" name="username-register" id="username-register" required>
						</label>
						<label class="email-address">Email*
							<input type="email" name="email-address" placeholder="tumail@placeholder.com" id="email-address" required>
						</label>
						<label class="phone">Teléfono*
							<input type="tel" name="phone" placeholder="tu teléfono" id="phone" required>
						</label>
						<label class="group" for="checkbox">¿Vienes en grupo?
							<input type="checkbox" name="checkbox" value="checkbox" id="checkbox">
						</label>
						<label class="group-response">¿Cuántos sois?
							<input type="text" name="group-response" id="group-response" required>
						</label>
						<label class="terms" for="checkbox"><a href="#">Acepto los términos y condiciones</a>
							<input type="checkbox" name="term-checkbox" value="term-checkbox" id="terms-checkbox">
						</label>
						<input type="submit" name="submit" value="Enviar">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>