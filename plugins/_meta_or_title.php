<?

/**
 *  Plugin Name:   Meta OR Title query in WP_Query
 *  Description:   Activated through the '_meta_or_title' argument of WP_Query 
 *  Plugin URI:    http://wordpress.stackexchange.com/a/178492/26350
 *  Plugin Author: Birgir Erlendsson (birgire)
 *  Version:       0.0.1
*/

add_action( 'pre_get_posts', function( $q )
{
    if( $title = $q->get( '_meta_or_title' ) )
    {
        add_filter( 'get_meta_sql', function( $sql ) use ( $title )
        {
            global $wpdb;

            // Only run once:
            static $nr = 0; 
            if( 0 != $nr++ ) return $sql;

            // Modify WHERE part:
            $sql['where'] = sprintf(
                " AND ( %s OR %s ) ",
                $wpdb->prepare( "{$wpdb->posts}.post_title = '%s'", $title ),
                mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
            );
            return $sql;
        });
    }
});
