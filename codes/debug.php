<?php

/* 

################################################## 

Debugging: Enable WordPress debugging to get more detailed error messages. 

*/

// Add the following code to your wp-config.php file
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// This will log error messages to a debug.log file in your wp-content directory
error_log(print_r('Hello World!', true));

?>
