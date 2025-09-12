
<?php
// Minimal front controller for CodeIgniter 3
$system_path = 'system';              // <- Put CI3 'system' folder here
$application_folder = 'application';
$view_folder = '';

// --- Begin stock CI3 bootstrap (trimmed) ---
define('ENVIRONMENT', 'production');
if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}
if (($_temp = realpath($system_path)) !== FALSE) {
    $system_path = $_temp.'/';
} else {
    $system_path = rtrim($system_path, '/').'/';
}
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', str_replace("\\", "/", $system_path));
define('FCPATH', dirname(__FILE__).'/');
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
if (is_dir($application_folder)) {
    if (($_temp = realpath($application_folder)) !== FALSE) {
        $application_folder = $_temp;
    }
    define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);
} else {
    exit('Your application folder path does not appear to be set correctly.');
}
$view_folder = ($view_folder != '') ? $view_folder : APPPATH.'views';
define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);
require_once BASEPATH.'core/CodeIgniter.php';
