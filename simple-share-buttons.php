<?php

/**
 * Plugin Name: Simple Social Share Buttons
 * Description: Social share buttons for your website with shortcode [tt-social-share] for WordPress
 * Author: Rominna Patiño
 */


function callback_for_setting_up_scripts() {
    wp_register_style( 'tt_social_share_styles', plugin_dir_url( __FILE__ ) . '/styles.css' );
    wp_enqueue_style( 'tt_social_share_styles' );
    wp_enqueue_script( 'tt_social_share_styles', plugin_dir_url( __FILE__ ) . '/styles.css' );
}
add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');

function simple_social_head()
{
    $info = get_bloginfo('language');
    $language = str_replace("-", "_", $info);
?>
    <script src="//platform.linkedin.com/in.js" type="text/javascript">
        lang: <?php echo "$language"; ?>
    </script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/<?php echo "$language"; ?>/sdk.js#xfbml=1&version=--->your version<---appId=--->your appID<---&autoLogAppEvents=1" nonce="le8s79H6"></script>
<?php
}
add_action('wp_head', 'simple_social_head');

function simple_social_share()
{
?>

    <div class="tt-social-box">
        <div class="social">
            <div class="fb-like" data-href="<?php the_permalink() ?>" data-width="100" data-layout="button_count" data-action="like" data-size="small" data-share="true" data-show-faces="false" data-send="false"></div>
        </div>
        <div class="social">
            <a href="https://twitter.com/intent/tweet" class="twitter-share-button" data-count="horizontal" data-text="<?php the_title() ?>" data-via="TrustedT9ns" data-url="<?php the_permalink() ?>" class="twitter-share-button">Tweet</a>
        </div>
        <div class="social in">
            <script type="IN/Share" data-url="<?php the_permalink() ?>" data-counter="right"></script>
        </div>
    </div>
<?php
}
add_shortcode('simple-social-share', 'simple_social_share');
