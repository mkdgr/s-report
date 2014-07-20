<?php

// Auto delete first "Hello Word" post
$autodeletefirst = $wpdb->get_results( 
  "
  SELECT *
  FROM $wpdb->posts
  WHERE ID = 1
  "
);
if($autodeletefirst[0]->post_status == "publish") {
wp_delete_post(1, false);
}

load_theme_textdomain('s-report', get_template_directory() . '/languages');

function tokenText($str) {

    // thx fatih (github.com/f)

    $matches = preg_split("/\;\s*\\$/uism", $str);
    $object = array();
    foreach ($matches as $match) {
        preg_match("/\\$?(\w+)\:(.*)/uism", trim($match), $_matches);
        $object[$_matches[1]] = rtrim($_matches[2], ";");
    }
    return $object;
}
// infinite scroll
function scripts () {
    wp_enqueue_script( 'infinite_scrolling', get_stylesheet_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery' ) );
}
function set_infinite_scrolling(){
    if(is_home()){
?>
        <script type="text/javascript">
            var inf_scrolling = {
                loading:{
                    img: "<?php echo get_template_directory_uri(); ?>/loading-bubbles.svg", // https://github.com/jxnblk/loading
                    msgText: "<?php _e('Loading new posts', 's-report'); ?>",
                    finishedMsg: "All post loaded!",
                },
                "nextSelector":".nav a:last-child",
                "navSelector":".nav",
                "itemSelector":".Event",
                "contentSelector":".Events"
            };

            jQuery(inf_scrolling.contentSelector).infinitescroll(inf_scrolling);
        </script>
    <?php
    }
}
add_action( 'wp_footer', 'set_infinite_scrolling',100 );
add_action( 'wp_enqueue_scripts', 'scripts' );

?>
