<?php
/**
 * Head do tema Elucidário.art
 *
 * @package WordPress
 * @subpackage Elucidário.art
 *
 * @version 0.1
 * @since 0.3
 *
 * @author hgodinho.com
 */
//var_dump($wp_query->query_vars);
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<!-- FACEBOOK SDK -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2430454887176446',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.3'
    });
      
    FB.AppEvents.logPageView();   
      
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


	<?php get_template_part('template-parts/header/header','menu'); ?>

	<div class="container-fluid px-0 site-content" id="body-elucidario-art">