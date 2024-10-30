<?php
/**
 * Plugin Name:     Limit a user to logging too
 * Description:     با این پلاگین می‌توانید دسترسی یک کاربر را به حسابش به تعداد دستگاه دلخواه خود کاهش دهید و از کپی شدن محصولات و دوره‌هایتان جلوگیری کنید
 * Version:         1.0.1
 * Author:          پیمان پورخالقی
 * Author URI:      https://kasbonet.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     کسبُ‌نت
 
 *
 * You should have received a copy of the GNU General Public License
 * along with LoggedIn. If not, see <http://www.gnu.org/licenses/>.
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'Damn it.! Dude you are looking for what?' );
}

if ( ! class_exists( 'F_LoggedIn' ) ) {
    
    // Constants array
    $constants = array(
        'F_LOGGEDIN_NAME' => 'loggedin',
        'F_LOGGEDIN_DOMAIN' => 'loggedin',
        'F_LOGGEDIN_VERSION' => '1.0.1',
    );

    foreach ( $constants as $constant => $value ) {
        // Set constants if not set already
        if ( ! defined( $constant ) ) {
            define( $constant, $value );
        }
    }
        
    // Only execute if not admin side
    if ( ! is_admin() ) {
        require dirname( __FILE__ ) . '/includes/class-f-loggedin.php';
        $public = new F_LoggedIn();
    }
        
    // Only execute if admin side
    if ( is_admin() ) {
        require dirname( __FILE__ ) . '/includes/class-f-loggedin-admin.php';
        $admin = new F_LoggedIn_Admin();
    }
}

//*** Thank you for your interest in LoggedIn - Developed and managed by Joel James ***// 
