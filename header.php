<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<?php if ( current_theme_supports( 'bp-default-responsive' ) ) : ?><meta name="viewport" content="width=device-width, initial-scale=1.0" /><?php endif; ?>
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php do_action( 'bp_head' ); ?>
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?> id="bp-default">

		<?php do_action( 'bp_before_header' ); ?>

		<div id="header">
			<div id="search-bar" role="search">
				<div class="padder">
					<h1 id="logo" role="banner"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>"><?php bp_site_name(); ?></a></h1>

                    <?php do_action( 'doode_before_user_links' ); ?>

                    <div id="user-links">
                        <?php bp_loggedin_user_avatar( 'type=thumb&width=20&height=20' ); ?>

                        <h4 class="username"><?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?></h4>

                        <?php if ( is_user_logged_in() ) : ?>

                            <a class="button settings" href="<?php echo bp_loggedin_user_domain() . bp_get_settings_slug(); ?>"><?php _e( 'Settings', 'buddypress' ); ?></a>
                            <a class="button logout" href="<?php echo wp_logout_url( wp_guess_url() ); ?>"><?php _e( 'Log Out', 'buddypress' ); ?></a>

                        <?php else: ?>

                            <?php if ( bp_get_signup_allowed() ): ?>

                                <a class="button register" href="<?php echo bp_get_signup_page(); ?>"><?php _e( 'Register', 'buddypress' ); ?></a>

                            <?php endif; ?>

                            <a class="button login" href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e( 'Log In', 'buddypress' ); ?></a>

                        <?php endif; ?>

                        <?php do_action( 'doode_user_links' ); ?>
                    </div>

                    <?php do_action( 'doode_after_user_links' ); ?>

                    <form action="<?php echo bp_search_form_action(); ?>" method="post" id="search-form">
                        <label for="search-terms" class="accessibly-hidden"><?php _e( 'Search for:', 'buddypress' ); ?></label>
                        <input type="text" id="search-terms" name="search-terms" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>" />

                        <div class="search-select">
                            <span id="search-selected"></span>
                            <?php echo bp_search_form_type_select(); ?>
                        </div>

                        <script type="text/javascript">
                            //<![CDATA[
                            jQuery(function($) {
                                $('#search-which').change(function() {
                                    $('#search-selected').html($(this).children(":selected").html());
                                }).change();
                            });
                            //]]>
                        </script>

                        <input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'buddypress' ); ?>" />

                        <?php wp_nonce_field( 'bp_search_form' ); ?>

                    </form><!-- #search-form -->

				<?php do_action( 'bp_search_login_bar' ); ?>

				</div><!-- .padder -->
			</div><!-- #search-bar -->

			<div id="navigation" role="navigation">
				<?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'bp_dtheme_main_nav' ) ); ?>
			</div>

			<?php do_action( 'bp_header' ); ?>

		</div><!-- #header -->

		<?php do_action( 'bp_after_header'     ); ?>
		<?php do_action( 'bp_before_container' ); ?>

		<div id="container">
