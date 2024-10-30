<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'Damn it.! Dude you are looking for what?' );
}

/**
 * Admin side functionality of the plugin.
 */
class F_LoggedIn_Admin {

    /**
     * Initialize the class and set its properties.
     * 
     * We register all our admin hooks here.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function __construct() {

        add_action('admin_init', array( $this, 'options_page' ) );
    }

    /**
     * Create new option field label to the default settings page.
     *
     * @since  1.0.0
     * @access public
     * @uses   register_setting()   To register new setting.
     * @uses   add_settings_field() To add new field to for the setting.
     * 
     * @return void
     */
    public function options_page() {

        register_setting( 'general', 'loggedin_maximum' );

        add_settings_field(
            'loggedin_label',
            '<label for="dpr">' . __( 'ماکزیمم ورود با یک حساب کاربری', F_LOGGEDIN_DOMAIN ) . '</label>',
            array( &$this, 'fields' ),
            'general'
        );
    }

    /**
     * Create new options field to the settings page.
     *
     * @since  1.0.0
     * @access public
     * @uses   get_option() To get the option value.
     * 
     * @return void
     */
    public function fields() {
        
        // get settings value
        $value = get_option( 'loggedin_maximum', 3 );
        echo '<input type="number" name="loggedin_maximum" min="1" value="' . intval( $value ) . '" />';
        echo '<p class="description">' . __( 'اگر مقدار ماکزیمم را روی no قرار دهید محدودیت برداشته خواهد شد', F_LOGGEDIN_DOMAIN ) . '</p>';
        echo '<p class="description">' . __( 'اگر به این محدودیت رسید شخص نمی‌تواند وارد حساب کاربری خود شود تا زمانی که از یک دستگاه خارج شود ', F_LOGGEDIN_DOMAIN ) . '</p>';
        echo '<p class="description"><strong>' . __( 'Note: ', F_LOGGEDIN_DOMAIN ) . '</strong>' . __( 'حتی اگر مرورگر را ببندید ممکن است از حساب کاربری خود خارج نشده باشید', F_LOGGEDIN_DOMAIN ) . '</p>';
    }

}
