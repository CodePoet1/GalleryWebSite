<?php

$web_url="localhost";

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

function write_three_col_start(){
    echo "<div class=\"container clearfix\">";  
}

function write_left_menu(){
    echo "<div class=\"sidebar_left\">";
    echo "<a href=\"$web_url/index.php\">Home</a><br>";
    echo "<a href=\"$web_url/about/about.php\">About</a><br>";
    echo "<a href=\"$web_url/contact/contact.php\">Contact</a><br>";
    echo "</div>";  
}

function web_page_header(){
    echo "<!DOCTYPE html>";
    echo "<html lang=\"en-US\">";
    echo "<html>";
    echo "<head><link rel=\"stylesheet\" href=\"$web_url/mainstyle.css\"></head>";
}

?>