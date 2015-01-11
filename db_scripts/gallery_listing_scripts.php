<?php
include '../header.php';
include '../config/DatabaseConfig.php';


web_page_header();
web_page_body();

web_page_header();

write_header();
write_three_col_start();
write_left_menu();

list_galleries();

write_customer_comments();
write_three_col_finish();
write_footer();
web_page_body_finish();

function list_galleries(){

  $GalleryListArray[] = Array();
  
  $conn = connect_to_database();
  if ($conn->connect_error){
    //Error - could not connect to mysql
  }
  else{
    //Connection to mysql successful
    $retval=select_database($conn);
    if(! $retval){
      //could not select correct database
    }
    else{
      //selected correct database

      //find out how many galleries there are in database
      $query = "select * from picture order by GalleryId desc limit 0,1";
      if($result = $conn->query($query)){
	$row = $result->fetch_assoc();
	$NumberOfGalleries = $row['GalleryId'];
      }

      //for each gallery, get the lowest Id, the highest Id and randomly choose an Id between them
      //so that the galleries will show a different picture each time they are displayed
      for ($count = 1; $count <= $NumberOfGalleries; $count++){
	//get gallery name
	$query = "select * from gallery where Id = " . $count;
	if($result = $conn->query($query)){
	  if($row = $result->fetch_assoc()){
	    $GalleryName = $row['Description'];
	  }
	}
	
	//get lowest Id for selected gallery
	$query = "select * from picture where GalleryId = " . $count . " order by Id asc limit 1";
	if($result = $conn->query($query)){
	  if($row = $result->fetch_assoc()){
	    $lowId = $row['Id'];
	    //   printf("LowId = %d\n",$lowId);
	  }
	}

	//get highest Id for selected gallery
	$query = "select * from picture where GalleryId= " . $count . "  order by Id desc limit 0,1";
	if($result = $conn->query($query)){
	  if($row = $result->fetch_assoc()){
	    $highId = $row['Id'];
	    //printf("HighId = %d\n",$highId);
	  }
	}

	//randomly choose a picture from the gallery
	$ran_num = rand($lowId,$highId);
	//printf("RanNum = %d\n",$ran_num);

	$query = "select * from picture where Id = " . $ran_num ;
	if($result = $conn->query($query)){
	  
	  if($row = $result->fetch_assoc()){
	    $MainPic = $row['MainPictureFilename'];
	    $Desc = $row['Description'];
	    //printf("Name -> %s \n", $MainPic);
	    //printf("Desc -> %s \n", $Desc);
	    //printf("Gallery name -> %s \n\n",  $GalleryName);
	  }
	}
	
	array_push($GalleryListArray,
		   array(
			 $GalleryName,
			 $MainPic,
			 $Desc
			 )
		   );

      }
      //      printf("Array dump _______________ \n");
      //      var_dump($GalleryListArray);
      $ArraySize = sizeof($GalleryListArray);
      $ColCount = 1;
      //printf("Array size = %d\n",$ArraySize);

      echo '<div class="grid-container outline">';
      echo '<div class="row" >';

      $DisplayCount=1;
      do{
	//	printf("Gallname %s, count=%d, col=%d\n",$GalleryListArray[$DisplayCount][0], $DisplayCount, $ColCount);
	//        echo '<div class="col-3">';
	//echo '<img src="../pictures/SnowBall_FP.jpg" width="100%">';
	//echo '<p><b>The Snow-Ball, An Exclusive Limited Edition Print <BR></b></p>';
	//echo '</div>';
        echo '<div class="col-3">';
	echo '<img src="../pictures/' . $GalleryListArray[$DisplayCount][1] . '"' . ' width="100%">';
	echo '<p><b>' . $GalleryListArray[$DisplayCount][0] . ' Exhibition<BR></b></p>';
	echo '<p><b><I>' . $GalleryListArray[$DisplayCount][2] . '</I><BR></b></p>';
	echo '</div>';


	$ColCount++;
	if($ColCount==3){
	  //	  printf("New row\n");
	  echo '</div>';
	  $ColCount=1;
	}
	if($DisplayCount == $ArraySize-1){
	  //printf("New row2\n");
	  echo "</div>";
	  echo '<div class="row" >';
	}

      }while($DisplayCount++ < $ArraySize-1);
      
      echo "</div>";

    }
  }
}

























?>
