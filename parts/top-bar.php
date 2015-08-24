<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<div class="row">
    <div class="top-bar-container contain-to-grid show-for-medium-up">
        <nav class="top-bar" data-topbar role="navigation">
            <div class="title-area">
                    <a href = "<?php echo get_bloginfo('wpurl') ?>"><img class="logo" src="<?php echo get_bloginfo('template_url') ?>/assets/img/cicero-logo.png"/></a>
            </div>
            <section class="top-bar-section">
                <?php foundationpress_top_bar_l(); ?>
                <?php foundationpress_top_bar_r(); ?>
            </section>
        </nav>
    </div>
</div>