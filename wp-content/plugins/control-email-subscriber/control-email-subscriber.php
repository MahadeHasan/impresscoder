<?php
/*
Plugin Name: Control Email Subscriber
Plugin URI: https://themeperch.net/control-email-subscriber/
Description: A simple function to handle a number of subscriber who were expected to submit their emails. use the <code>[control_email_subscriber_form]</code> shortode in a editor to display. If you would like to add name , email then use this <code>[control_email_subscriber_hero_form]</code> shortcode
Version: 1.0.1
Author: Themeperch
Author URI: https://themeperch.net/
License: GPLv2 or later
Text Domain: control-email-subscriber
*/

if (defined('CONTROL_EMAIL_SUBSCRIBER_VER')) return;

define('CONTROL_EMAIL_SUBSCRIBER_VER', '1.0.1');

/**
 * Application form footer subscription
 * 
 * @return form fields html
 */
if (!function_exists('control_email_subscriber_form_shortcode')) {
	add_shortcode('control_email_subscriber_form', 'control_email_subscriber_form_shortcode');
	function control_email_subscriber_form_shortcode()
	{
		$options = get_option('control_email_subscriber', []);

		$default = array(
			'mailchimp_form_email_placeholder' => 'Enter your Email',
			'mailchimp_form_button_text' => 'Subscribe Now',
		);
		$args = wp_parse_args($options, $default);

		ob_start();
		do_action('control_email_subscriber_form_before');

		extract($args);
?>

		<div id="newsletter-1" class="form-newsletters newsletter-section">
			<form id="mc-form" class="newsletter-form">
				<div class="subscription-form position-relative">
					<input id="mc-email" name="EMAIL" class="input-email form-control" autocomplete="off" type="email" placeholder="<?php echo esc_attr($mailchimp_form_email_placeholder) ?>" required="required">

					<button type="submit" class="subscription-form-arrow">
						<?php echo eventiva_get_icon_svg('ui', 'arrow-up-right', 25) ?>
					</button>

				</div>
			</form>

			<div id="mc-response" class="mc-response mt-15"></div>
		</div>
	<?php
		do_action('control_email_subscriber_form_after');
		return ob_get_clean();
	}
}
// Hero Form
if (!function_exists('control_email_subscriber_hero_form_shortcode')) {
	//shortcode name and callback function
	add_shortcode('control_email_subscriber_hero_form', 'control_email_subscriber_hero_form_shortcode');
	function control_email_subscriber_hero_form_shortcode()
	{
		$options = get_option('control_email_subscriber', []);

		$default = array(
			'mailchimp_form_name_placeholder' => 'Enter Your Name*',
			'mailchimp_form_email_placeholder' => 'Enter Your Email*',
			'mailchimp_form_button_text' => 'Get Started Now',
		);
		$args = wp_parse_args($options, $default);

		ob_start();
		do_action('control_email_subscriber_form_before');

		extract($args);
	?>
		<form id="mc-form" name="requestForm" class="row request-form" novalidate="true">

			<input id="mc-name" name="name" class="input-email form-control name" autocomplete="off" type="text" placeholder="<?php echo esc_attr($mailchimp_form_email_placeholder) ?>" required="required">
			<input id="mc-email" name="email" class="input-email form-control email" autocomplete="off" type="email" placeholder="<?php echo esc_attr($mailchimp_form_email_placeholder) ?>" required="required">
			<div class="form-btn">
				<button type="submit" class="btn w-100 btn--theme hover--theme submit"><?php echo esc_attr($mailchimp_form_button_text) ?></button>
			</div>

			<!-- Form Message -->
			<div class="col-md-12 request-form-msg text-center">
				<span class="loading"></span>
			</div>
		</form>

		<div id="mc-response" class="mc-response mt-15"></div>



	<?php
		do_action('control_email_subscriber_form_after');
		return ob_get_clean();
	}
}

//form
if (!function_exists('control_email_subscriber_form')) {
	function control_email_subscriber_form($args)
	{

		$default = array(
			'mailchimp_form_email_placeholder' => 'Type your email address',
			'mailchimp_form_button_text' => 'Subscribe',
		);
		$args = wp_parse_args($args, $default);

		ob_start();
		do_action('control_email_subscriber_form_before');

		extract($args);
	?>
		<form id="mc-form" class="d-flex">
			<input id="mc-email" class="input-sybscriber" type="email" placeholder="<?php echo esc_attr($mailchimp_form_email_placeholder) ?>" required="required">
			<button class="btn btn-linear btn-arrow-right" type="submit"><?php echo esc_attr($mailchimp_form_button_text) ?><i class="fi-rr-arrow-small-right"></i></button>
		</form>
<?php
		do_action('control_email_subscriber_form_after');
		return ob_get_clean();
	}
}

/**
 * Application form Assets
 */
add_action('control_email_subscriber_form_before', 'control_email_subscriber_scripts');
if (!function_exists('control_email_subscriber_scripts')) {
	function control_email_subscriber_scripts()
	{
		wp_enqueue_script('jquery-ajaxchimp', plugin_dir_url(__FILE__) . 'jquery.ajaxchimp.min.js', ['jquery'], '1.3.0', true);
		wp_enqueue_script('jquery-ajaxchimp-langs', plugin_dir_url(__FILE__) . 'jquery.ajaxchimp.langs.min.js', ['jquery-ajaxchimp'], '1.3.0', true);
		wp_enqueue_script('control-email-subscriber', plugin_dir_url(__FILE__) . 'scripts.js', ['jquery-ajaxchimp'], '1.0.0', true);
		$options = get_option('control_email_subscriber', []);
		$data = array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'ajaxchimpurl' => !empty($options['mailchimp_form_url']) ? esc_url($options['mailchimp_form_url']) : ''
		);
		wp_localize_script('control-email-subscriber', 'controlEmailSubscriber', $data);
	}
}

/**
 * Application form submit
 * @param mixed $_POST
 * 
 * @return mixed 
 */
if (!function_exists('control_email_subscriber_form_submit')) {
	add_action('wp_ajax_control_email_subscriber_form_submit', 'control_email_subscriber_form_submit');
	add_action('wp_ajax_nopriv_control_email_subscriber_form_submit', 'control_email_subscriber_form_submit');
	function control_email_subscriber_form_submit()
	{
		if (empty($_POST) || empty($_POST['form_values'])) {
			wp_die(esc_attr__('Something went horribly wrong. Please try again.', 'control-email-subscriber'));
		}

		// Process form values
		$parameters = array();
		parse_str($_POST['form_values'], $parameters);

		// Check nonce variable
		if (
			empty($parameters['control_email_subscriber'])
			|| !wp_verify_nonce($parameters['control_email_subscriber'], 'control-email-subscriber')
		) {
			wp_die(esc_attr__('Something went horribly wrong. Please try again.', 'control-email-subscriber'));
		}


		// data validation
		$name = !empty($parameters['name']) ? esc_attr($parameters['name']) : NULL;
		$email = !empty($parameters['email']) ? esc_attr($parameters['email']) : NULL;

		// Make sure fields are no empty
		if (empty($name) ||  empty($email)) {
			wp_die(esc_attr__('Something went horribly wrong. Please try again.', 'control-email-subscriber'));
		}

		global $wpdb;
		$tablename = $wpdb->prefix . 'control_email_subscriber';

		// Table data
		$data = array(
			'name' => $name,
			'email' => $email,
			'status' => '',
			'meta' => '',

		);

		/**
		 * Chek if fields is not duplicate, checked with email
		 */
		$checkIfExists = $wpdb->get_var("SELECT * FROM {$tablename} WHERE email = '{$email}'");
		if (!empty($checkIfExists)) {
			// Send JSON reponse
			wp_send_json(array('status' => '-1', 'message' => esc_attr__('Email already exists.', 'control-email-subscriber')));
		}

		$insert = $wpdb->insert($tablename, $data, array('%s', '%s', '%s', '%s'));

		// Final check WP_ERROR
		if (is_wp_error($insert)) {
			wp_die('Something went horribly wrong. Please try again.');
		}

		// Send JSON reponse
		wp_send_json(array('status' => '0', 'message' => esc_attr__('Successfully Inserted!', 'control-email-subscriber')));
		wp_die();
	}
}
// Form Settings
if (!function_exists('control_email_subscriber_register_settings_page')) {
	add_filter('ctrlbp_settings_pages', 'control_email_subscriber_register_settings_page');
	function control_email_subscriber_register_settings_page($settings_pages)
	{
		$settings_pages[] = [
			'id'          => 'control-email-subcriber',
			'option_name' => 'control_email_subscriber',
			'menu_title'  => esc_attr__('Email Subcription', 'control-email-subscriber'),
			'priority'    => 15,
			'parent'      => 'options-general.php',
			'customizer'  => false, // THIS       
			'customizer_only'  => false, // THIS 
		];
		return $settings_pages;
	}
}
// Form Fields

if (!function_exists('control_email_subscriber_fields')) {
	add_filter('ctrlbp_meta_boxes', 'control_email_subscriber_fields');
	function control_email_subscriber_fields($meta_boxes)
	{
		$meta_boxes[] = [
			'id'             => 'general',
			'settings_pages' => 'control-email-subcriber',
			'style' => 'seamless',
			'fields'         => [
				[
					'id'   => 'mailchimp_form_url',
					'type' => 'text',
					'name' => esc_attr__('Email subscription form url', 'control-email-subscriber'),
					'desc' => sprintf(esc_attr('The mailchimp post url will look like this: %s', 'control-email-subscriber'), '<code>http://blahblah.us1.list-manage.com/subscribe/post?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh99f</code>'),
				],
				[
					'id'   => 'mailchimp_form_email_placeholder',
					'type' => 'text',
					'name' => esc_attr__('Email placeholder', 'control-email-subscriber'),
					'placeholder' => esc_attr('Enter your email here', 'control-email-subscriber'),
					'std' => esc_attr('Enter your email here', 'control-email-subscriber'),
				],
				[
					'id'   => 'mailchimp_form_name_placeholder',
					'type' => 'text',
					'name' => esc_attr__('Name placeholder', 'control-email-subscriber'),
					'placeholder' => esc_attr('Enter your name here', 'control-email-subscriber'),
					'std' => esc_attr('Enter your name here', 'control-email-subscriber'),
				],
				[
					'id'   => 'mailchimp_form_button_text',
					'type' => 'text',
					'name' => esc_attr__('Submit button text', 'control-email-subscriber'),
					'placeholder' => esc_attr('Subscribe', 'control-email-subscriber'),
					'std' => esc_attr('Subscribe', 'control-email-subscriber'),
				]
			]
		];
		return $meta_boxes;
	}
}

/**
 * Application form table
 * @param string $tablename
 * 
 * @return mixed true|WP_Error 
 */
function control_email_subscriber_maybe_create_table()
{
	global $wpdb;
	$tablename = $wpdb->prefix . 'control_email_subscriber';

	$query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($tablename));
	if (!$wpdb->get_var($query) == $tablename) {
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$main_sql_create = baeldung_createDBSQL($tablename);
		maybe_create_table($wpdb->prefix . $tablename, $main_sql_create);
	}
}

/**
 * Application form table SQL
 * @param string $tablename
 * 
 * @return string $sql
 */
function baeldung_createDBSQL($table_name)
{
	global $wpdb;
	// create db sql for table
	$charset = $wpdb->get_charset_collate();
	$sql = "
    CREATE TABLE {$table_name} (
        ID INT NULL AUTO_INCREMENT , 
		name VARCHAR(200) NOT NULL , 
		email VARCHAR(200) NOT NULL , 
		meta TEXT NOT NULL , 
		status VARCHAR(200) NOT NULL , 
		created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (ID)
    ) $charset;
    ";

	return $sql;
}

/**
 * Activate the plugin.
 */
function control_email_subscriber_activate()
{
	control_email_subscriber_maybe_create_table();
}
register_activation_hook(__FILE__, 'control_email_subscriber_activate');
