<?php

global $post;
if (is_page(1)) {
  wp_delete_post(1);
}
// TRANSLATION
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

function scripts () {
    wp_enqueue_script( 'infinite_scrolling', get_stylesheet_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery' ) );
}

function set_infinite_scrolling(){
    if(!is_singular()){
?>
        <script type="text/javascript">
            var inf_scrolling = {
                loading:{
                    img: "<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif",
                    msgText: "Loading next posts....",
                    finishedMsg: "Posts loaded!!",
                },
                "nextSelector":".Events a:last-child",
                "navSelector":".Events a:last-child",
                "itemSelector":"article.Event",
                "contentSelector":"#Events"
            };

            jQuery(inf_scrolling.contentSelector).infinitescroll(inf_scrolling);
        </script>
    <?php
    }
}
add_action( 'wp_footer', 'set_infinite_scrolling',100 );
add_action( 'wp_enqueue_scripts', 'scripts' );

?>
