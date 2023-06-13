<?php 
function mytheme_theme_support(){
    //add dynamic title tag support
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','mytheme_theme_support');



function mytheme_enqueue_register_style() {

    $bootstrapname='bootstrap';

    //get version
    $version = wp_get_theme()->get( 'Version' );
    //style.css
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(),array($bootstrapname),$version,'all' ); 


    //Google Web Fonts
    wp_enqueue_style( 'mytheme-fonts', "https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap",'3.4.1','all' ); 


    //Font Awesome
    wp_enqueue_style( 'mytheme-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css",'3.4.1','all' ); 


    //Libraries Stylesheet
    wp_enqueue_style( 'mytheme-animate', get_template_directory_uri().'/assets/'.'lib/animate/animate.min.css',array($bootstrapname),$version,'all' ); 
    wp_enqueue_style( 'mytheme-carousel', get_template_directory_uri().'/assets/'.'lib/owlcarousel/assets/owl.carousel.min.css',array($bootstrapname),$version,'all' ); 

    //Customized Bootstrap Stylesheet
    wp_enqueue_style( $bootstrapname, get_template_directory_uri().'/assets/'.'css/style.css',array(),$version,'all' ); 
  
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_register_style' );


function mytheme_enqueue_register_script() {

    $jquery='jquery';


    //JavaScript Libraries
    wp_enqueue_script( $jquery,"https://code.jquery.com/jquery-3.4.1.min.js" ,array(),'3.4.1',true); 
    
    wp_enqueue_script( 'bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" ,array($jquery),'3.4.1',true); 
    wp_enqueue_script( 'mytheme-easing', get_template_directory_uri().'/assets/'.'lib/easing/easing.min.js',array($jquery),'3.4.1',true); 
    wp_enqueue_script( 'mytheme-owlcarousel', get_template_directory_uri().'/assets/'.'lib/owlcarousel/owl.carousel.min.js',array($jquery),'3.4.1',true); 


    //Contact Javascript File
    wp_enqueue_script( 'mytheme-jqBootstrapValidation', get_template_directory_uri().'/assets/'.'mail/jqBootstrapValidation.min.js',array($jquery),'3.4.1',true); 
    wp_enqueue_script( 'mytheme-contact', get_template_directory_uri().'/assets/'.'mail/contact.js',array($jquery),'3.4.2',true); 

    //Template Javascript
    wp_enqueue_script( 'mytheme-main', get_template_directory_uri().'/assets/'.'js/main.js',array($jquery),'3.4.1',true); 
     
     
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_register_script' );


?>