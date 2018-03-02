<?php
// create custom plugin settings menu
add_action('admin_menu', 'gfn_fb_feed_create_menu');

function gfn_fb_feed_create_menu() {

	//create new top-level menu
	add_menu_page('GFN Facebook Feed Settings', 'FB Feed Settings', 'administrator', __FILE__, 'gfn_fb_feed_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_gfn_fb_feed_settings' );
}


function register_gfn_fb_feed_settings() {
	//register our settings
	register_setting( 'gfn-fb-feed-settings-group', 'gfn_fb_access_token' );
	register_setting( 'gfn-fb-feed-settings-group', 'gfn_fb_page_id' );

}

function gfn_fb_feed_settings_page() {
?>
<div class="wrap">
<h1>GFN Facebook Feed</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'gfn-fb-feed-settings-group' ); ?>
    <?php do_settings_sections( 'gfn-fb-feed-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Facebook Extended User Access Token <br /><small> <a href="https://developers.facebook.com/tools/accesstoken/" target="_blank">Get it here</a> > (user token) Debug > Extend Access Token</small></th>
        <td><input type="text" name="gfn_fb_access_token" value="<?php echo esc_attr( get_option('gfn_fb_access_token') ); ?>" /></td>
        </tr>

		<tr valign="top">
        <th scope="row">Facebook Business Page ID <br /><small> Get it at your facebook business page > About > Page Information > Page ID</small></th>
        <td><input type="text" name="gfn_fb_page_id" value="<?php echo esc_attr( get_option('gfn_fb_page_id') ); ?>" /></td>
        </tr>

    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
