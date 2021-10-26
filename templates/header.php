<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <?php
        simple_load_module();
        if(function_exists('get_style')){
            get_style();
        }
        ?>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="<?php echo SITE_URL; ?>include/css/bootstrap.rtl.min.css" rel="stylesheet" >
        <!-- Custom styles for this template -->
        <link href="<?php echo SITE_URL; ?>include/css/style.css" rel="stylesheet"/>
        
        <?php 
        if(!function_exists('get_title')){
            function get_title(){
                echo APP_TITLE;
            }
        }
        ?>
        <title><?php get_title() ?></title>
    </head>
    <body onload="scrollToBottom(); txt_focus()">
        <!-- Navigation Bar -->
        <?php  include_once ('templates/nav.php'); ?>
        
        <!-- main container -->
        <div class="container-lg">