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
	<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Museum",
      "url": "http://emaklabin.org.br/",
      "openingHours": "We Th Fr Sa Su 14:00-18:00",
      "address": "Rua Portugal, 43 – Jd. Europa, São Paulo – SP",
      "logo": "http://emaklabin.org.br/site/wp-content/uploads/2017/04/logoverde-01.png",
      "telephone": "+55 11 3897-3232",
      "sameAs": [
        "https://www.facebook.com/fundacaoemaklabin",
        "https://instagram.com/emaklabin",
        "https://twitter.com/emaklabin",
        "https://www.youtube.com/channel/UC9FBIZFjSOlRviuz_Dy1i2w"
      ]
    }
      </script>


	<?php get_template_part('template-parts/header/header','menu'); ?>

	<div class="container-fluid px-0 site-content" id="body-elucidario-art">