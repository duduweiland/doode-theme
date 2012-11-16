<?php
// register left sidebar
function doode_register_sidebars() {
    register_sidebar(
        array(
            'id' => 'left sidebar',
            'name' => 'Left Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'doode_register_sidebars' );

global $content_width;
$content_width = 500;

// add user links on header
function doode_header_user_links() {
    if ( !is_user_logged_in() ) {
        return false;
    }

    do_action( 'doode_before_user_links' ); ?>

    <div id="user-links">
        <?php bp_loggedin_user_avatar( 'type=thumb&width=20&height=20' ); ?>

        <h4 class="username"><?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?></h4>
        <a class="button settings" href="<?php echo bp_loggedin_user_domain() . bp_get_settings_slug(); ?>"><?php _e( 'Settings', 'buddypress' ); ?></a>
        <a class="button logout" href="<?php echo wp_logout_url( wp_guess_url() ); ?>"><?php _e( 'Log Out', 'buddypress' ); ?></a>

        <?php do_action( 'doode_user_links' ); ?>
    </div>

    <?php

    do_action( 'doode_after_user_links' );

    return true;
}
add_action( 'bp_search_login_bar', 'doode_header_user_links' );
?>