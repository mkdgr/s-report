<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" type="text/css" href="//cloud.typography.com/6110492/691904/css/fonts.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css"/>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

    <?php //include_once("analyticstracking.php"); //Add your analytics code in that file and uncomment this line ?>

</head>
<body <?php body_class(); ?>>

<?php include 'icons.php'; ?>
