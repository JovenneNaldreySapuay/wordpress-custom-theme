<?php
/**
 * The header of our theme
 */ ?>
 
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="author" content="Jovenne Naldrey Sapuay">
      <meta name="description" content="<?php bloginfo('description'); ?>" />
      
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    
      <?php wp_head(); ?>
    </head>
   	<body <?php body_class(); ?> >  
    <!--
    **********************************************  
    **** Developed by: Jovenne Naldrey Sapuay ****
    **** https://jovenne.github.io/           ****
    **********************************************
    -->  
    <header id="ggenius-masthead">
      <div class="container">
        <div id="ggenius-menuwrap">
        <div id="ggenius-logo">
          <h1>
            <a href="<?php echo esc_url( home_url('/') ); ?>" title="The Gmail Genius">
              <span class="lte">The</span><span class="drk">Gmail</span><span class="lte">Genius</span>
            </a>
          </h1>
        </div>

        <div id="ggenius-menu">

        <div id="mobile-menubar-prompt" onclick="openNav()">
        <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <nav class="navbar navbar-default navbar-static-top">
          <div id="navbar" class="navbar-collapse collapse">  
            <?php 
              if ( has_nav_menu('primary') ) {
                  wp_nav_menu(array(
                      'theme_location' => 'primary',
                      'menu_class'     => 'nav navbar-nav navbar-right',
                  )); }
            ?> 
          </div>
        </nav>  
        </div>
        </div>
      </div>
    </header>  