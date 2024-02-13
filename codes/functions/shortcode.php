<?php

/*

##################################################

Shortcode for: home_url();
Example: <a href="[home_dir]/example">Example</a>

*/

function home_dir()
{
    return get_template_directory_uri();
}
add_shortcode('home_dir', 'home_dir');


/*

##################################################

Shortcode for: get_template_directory_uri();
Example: <img src="[template_dir]/img/example.jpg" alt="example" />

*/
function template_dir()
{
    return get_template_directory_uri();
}
add_shortcode('template_dir', 'template_dir');


/*

##################################################

Shortcode for: get_template_part('components/');
Example: [get_component component='carousel']

This code modify the code to use ob_start() and ob_get_clean() to capture the output of get_template_part() and return it as a string.

ob_start() starts output buffering, which captures the output generated by get_template_part() instead of directly echoing it. 
ob_get_clean() retrieves the buffered output and cleans the buffer, returning the captured output as a string.

*/
function get_component($atts) 
{
    $atts = shortcode_atts( array(
        'component' => '',
    ), $atts );
    ob_start();
    get_template_part('components/' . $atts['component']);
    $output = ob_get_clean();
    return $output;
}
add_shortcode('get_component', 'get_component');