<?php
/*
Template Name: Left Sidebar
*/
get_header(); ?>
<div class="row">
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
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php endif; ?>
    </header>
    <div class="small-12 medium-8 large-8 columns no-padding" role="main">

        <?php do_action( 'foundationpress_before_content' ); ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
               
                <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <footer>
                    <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
                    <p><?php the_tags(); ?></p>
                </footer>
                <?php do_action( 'foundationpress_page_before_comments' ); ?>
                <?php comments_template(); ?>
                <?php do_action( 'foundationpress_page_after_comments' ); ?>
            </article>
        <?php endwhile;?>

        <?php do_action( 'foundationpress_after_content' ); ?>

    </div>
    <?php get_sidebar( 'right' ); ?>
</div>
<?php get_footer(); ?>
