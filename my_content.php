<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

<article id="post-<?php the_ID(); ?>"  class="large-4 columns" >
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-content">
		<span><?php the_taxonomies(); ?></span>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="row">
				<div class="column">
					<?php the_post_thumbnail( '', array('class' => 'th') ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php the_excerpt( __( 'Continue reading...', 'foundationpress' ) ); ?>
		<span><?php show_date(get_the_ID()); ?></span>
		<br>
		<span><?php show_hour(get_the_ID()); ?></span>
		<br>
		<span>Punto de encuentro: <?php show_meeting(get_the_ID()); ?></span>
		<br>
		<span>Máximo numero de personas: <?php show_maxpeople(get_the_ID()); ?></span>
		<br>
		<span>Precio: <?php show_price(get_the_ID()); ?></span>
		<br>
		
	</div>
	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	<hr />
</article>
