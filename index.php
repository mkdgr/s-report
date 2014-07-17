<?php get_header(); ?>
<div class="Page">
    <div class="Events">


        <?php

        $DomainOption = array(
            'add' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20'),
            'apple' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20'),
            'behance' => array('sizeWeightIcon' => '23', 'sizeHeightIcon' => '20'),
            'bitbucket' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20'),
            'codepen' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'dollar' => array('sizeWeightIcon' => '11', 'sizeHeightIcon' => '20'),
            'dribbble' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'dropbox' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'email' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'facebook' => array('sizeWeightIcon' => '11', 'sizeHeightIcon' => '20'),
            'foursquare' => array('sizeWeightIcon' => '19', 'sizeHeightIcon' => '20'),
            'github' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'like' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'instagram' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'linkedin' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'location-arrow' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20'),
            'reply' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'map-marker' => array('sizeWeightIcon' => '11', 'sizeHeightIcon' => '20'),
            'iphone' => array('sizeWeightIcon' => '9', 'sizeHeightIcon' => '20'),
            'pencil' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'retweet' => array('sizeWeightIcon' => '21', 'sizeHeightIcon' => '20'),
            'rss' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20'),
            'slack' => array('sizeWeightIcon' => '19', 'sizeHeightIcon' => '20'),
            'soundcloud' => array('sizeWeightIcon' => '26', 'sizeHeightIcon' => '20'),
            'spotify' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'favorite' => array('sizeWeightIcon' => '19', 'sizeHeightIcon' => '20'),
            'thumbs-up' => array('sizeWeightIcon' => '19', 'sizeHeightIcon' => '20'),
            'tumblr' => array('sizeWeightIcon' => '11', 'sizeHeightIcon' => '20'),
            'turkish-lira' => array('sizeWeightIcon' => '13', 'sizeHeightIcon' => '20'),
            'twitter' => array('sizeWeightIcon' => '19', 'sizeHeightIcon' => '20'),
            'vimeo' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'vine' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'wordpress' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),
            'youtube' => array('sizeWeightIcon' => '20', 'sizeHeightIcon' => '20'),

            // olmayanlar
            'etsy' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20'),
            'imdb' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20'),
            'instapaper' => array('sizeWeightIcon' => '16', 'sizeHeightIcon' => '20')
        );


        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('posts_per_page' => 20, 'paged' => $paged);
        query_posts($args);

        if (have_posts()) : while (have_posts()) : the_post();

            // Post cat name
            $Cat = get_the_category();
            $Domain = $Cat[0]->slug;


            // Post tag
            $PostTags = get_the_tags();
            unset($Action);
            $Action = array();

            if ($PostTags) {
                foreach ($PostTags as $tag) {
                    array_push($Action, $tag->name);
                }
            }

            // domain icon size
            $widthDomainIcon = $DomainOption[$Domain]['sizeWeightIcon'];
            $heightDomainIcon = $DomainOption[$Domain]['sizeHeightIcon'];


            // Content
            $Data = tokenText(get_the_content());
            //print_r($Data);

            // Event
            include "event/instagram.php";
            include "event/facebook.php";
            include "event/foursquare.php";
            include "event/twitter.php";
            include "event/soundcloud.php";
            include "event/vimeo.php";
            include "event/tumblr.php";
            include "event/youtube.php";
            include "event/dribbble.php";
            include "event/imdb.php";
            include "event/instapaper.php";
            include "event/etsy.php";
            include "event/github.php";
            include "event/iphone.php";
            include "event/calendar.php";

        endwhile; ?>

            <?php next_posts_link( __('Older posts', 's-report') ); ?>
            <?php previous_posts_link( __('Newer posts', 's-report') ); ?>

        <?php
        endif;

        ?>


    </div>
</div>

<?php get_footer(); ?>
