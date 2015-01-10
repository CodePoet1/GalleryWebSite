<?php



function write_left_menu(){
    //Must be changed for production
    //web_sub allows the website to be put into a debug directory on development pc during development.  
    $web_sub = '/Gallery-AnthonyOrme';  //this is also defined in function web_page_header() at end of this file
    $web_url_home =  $web_sub . '/index.php';
    $web_url_about = $web_sub . '/about/about.php';
    $web_url_contact = $web_sub . '/contact/contact.php';
    $web_url_gallery = $web_sub . '/gallery/gallery-listing.php';

    echo "<div class=\"sidebar_left\">";
    echo "<a href=\"{$web_url_home}\">Home</a><br>";
    echo "<a href=\"{$web_url_about}\">About</a><br>";
    echo "<a href=\"{$web_url_contact}\">Contact</a><br>";
    echo "<a href=\"{$web_url_gallery}\">Galleries</a><br>";
    echo "</div>";  
}

function write_header()
{
  echo "<div class=\"header\">";
  echo "A n t h o n y &nbsp &nbsp O r m e";
  echo "</div>";
}


function  web_page_body(){
  echo "<body>";
}

function write_three_col_finish(){
  echo "</div>";
}

function web_page_body_finish(){
  echo "</body>";
  echo "</html>";
}


function write_footer(){
  echo "<div class=\"footer\">";
  echo "Copyright (c) Anthony Orme - 2014 ";
  echo "</div>";
}

function write_customer_comments(){
  echo "<div class=\"sidebar_right\">";
  echo "<I><b>\"I bought this painting last year and it has pride of place in my lounge at home\"
          <BR></b>Sue, Manchester</I>";
  echo "</div>";
  
}

function write_main_front_page(){
  echo "<div class=\"main\">";
  echo "<div id=\"FrontPagePictureCenter\">";
  echo "<img src=\"pictures/SnowBall_FP.jpg\" width=\"90%\">";
  echo "<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>";
  echo "</div> </div>";
}  

function write_main_front_page_b(){
  echo "<div class=\"main\">";
  echo "<div id=\"FrontPagePictureCenter\">";
  echo "<img src=\"../pictures/SnowBall_FP.jpg\" width=\"90%\">";
  echo "<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>";
  echo "</div> </div>";
}  

function write_main_gallery_col_one(){
  echo "<div class=\"main_gallery_col_one\">";
  echo "<div id=\"FrontPagePictureCenter\">";
  echo "<img src=\"../pictures/SnowBall_FP.jpg\" width=\"90%\">";
  echo "<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>";
  echo "<img src=\"../pictures/SnowBall_FP.jpg\" width=\"90%\">";
  echo "<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>";
  echo "</div> </div>";
}  

function write_main_gallery_col_two(){
  echo "<div class=\"main_gallery_col_two\">";
  echo "<div id=\"FrontPagePictureCenter\">";
  echo "<img src=\"../pictures/SnowBall_FP.jpg\" width=\"90%\">";
  echo "<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>";
  echo "<img src=\"../pictures/SnowBall_FP.jpg\" width=\"90%\">";
  echo "<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>";
  echo "</div> </div>";
}  


function write_three_col_start(){
  echo "<div class=\"container clearfix\">";  
}


function web_page_header(){
  $web_sub = '/Gallery-AnthonyOrme';
  $css_location = $web_sub . '/mainstyle.css';

  echo "<!DOCTYPE html>";
  echo "<html lang=\"en-US\">";
  echo "<html>";
  echo "<head><link rel=\"stylesheet\" href=\"{$css_location}\"></head>";
}

?>