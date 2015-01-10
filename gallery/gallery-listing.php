
<?php
include '../header.php';

web_page_header();
web_page_body();

web_page_header();

write_header();
write_three_col_start();
write_left_menu();

//write_main_gallery_col_one();
//write_main_gallery_col_two();
?>

<div class="grid-container outline">
    <div class="row" >
        <div class="col-3">
	<img src="../pictures/SnowBall_FP.jpg" width="100%">
	<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>
	</div>         

	<div class="col-3">
	  <img src="../pictures/SnowBall_FP.jpg" width="100%">
	  <p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>
	</div> 
    </div> 
    <div class="row">
        <div class="col-3">
	<img src="../pictures/SnowBall_FP.jpg" width="100%">
	<p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>
	</div>         

	<div class="col-3">
	  <img src="../pictures/SnowBall_FP.jpg" width="100%">
	  <p><b>The Snow-Ball, An Exclusive Limited Edition Print<BR></b></p>
	</div> 
    </div> 
</div>


<?php
write_customer_comments();
write_three_col_finish();
write_footer();
web_page_body_finish();
?>
