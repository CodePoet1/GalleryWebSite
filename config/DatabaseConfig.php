<?php

$servername = "localhost";
$username = "root";
$password = "monty123";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE AnthonyOrme_DB";
if ($conn->query($sql) == TRUE) {
    echo "Database created successfully\n";
    
    $conn = mysql_connect($servername, $username, $password);
    if(! $conn ){
        die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully -> $conn->';
    
    create_table_gallery($conn);
    create_table_picture($conn);
    create_table_painting_type($conn);
    create_table_version_listing($conn);
    
    insert_test_data_into_gallery($conn);
    insert_test_data_into_picture($conn);
    insert_test_data_into_painting_type($conn);
    insert_test_data_into_version_listing($conn);

}

function create_table_gallery($conn)
{
    $sql = "CREATE TABLE gallery(
         Id                    INT NOT NULL AUTO_INCREMENT,
         Description           VARCHAR(64) NOT NULL,
         primary key (Id))";

    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not create table: ' . mysql_error());
    }
    echo "Table gallery created successfully\n";
}


function create_table_picture($conn)
{
    $sql = "CREATE TABLE picture( 
        Id                      INT NOT NULL AUTO_INCREMENT,
        GalleryId               INT NOT NULL,
        MainPictureFilename     VARCHAR(64) NOT NULL,
        GalleryPictureFilename  VARCHAR(64) NOT NULL,
        VersionListing          INT NOT NULL,
        Description             VARCHAR(1024) NOT NULL,
        primary key (Id),
        foreign key (GalleryId) references gallery(Id))";
    
    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not create table: ' . mysql_error());
    }
    echo "Table picture created successfully\n";
}


function create_table_version_listing($conn)
{
    $sql = "CREATE TABLE version_listing(
        Id                      INT NOT NULL AUTO_INCREMENT,
        PicId                   INT NOT NULL,
        PaintingType            INT NOT NULL,
        SizeWidth               INT NOT NULL,
        SizeHeight              INT NOT NULL,
        Price                   DECIMAL(6,2) NOT NULL,
        primary key (Id),
        foreign key (PicId) references  picture(Id),
        foreign key (PaintingType) references painting_type(Id))";   


    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not insert data into media_type: ' . mysql_error());
    }
    echo "Table media_type inserted data successfully\n";
}

function create_table_painting_type($conn)
{
    $sql = "CREATE TABLE painting_type(
        Id                      INT NOT NULL AUTO_INCREMENT,
        Description             VARCHAR(128) NOT NULL,
        primary key (Id))";
    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not create painting_type: ' . mysql_error());
    }
    echo "Table painting_type created successfully\n";
}

function insert_test_data_into_painting_type($conn)
{
    $sql = "INSERT INTO painting_type(
           Description)
           VALUES
           ('Original'),
           ('Original Oil'),
           ('Original Pastel'),
           ('Print'),
           ('Giclee Print'),
           ('Oil Painting On Box Canvas'),
           ('Oil Painting On Board')";


    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not insert data into painting_type: ' . mysql_error());
    }
    echo "Test data inserted into painting_type table\n";
}

function insert_test_data_into_gallery($conn)
{
   $sql = "INSERT INTO gallery (
        Description)
        VALUES(
        'Main')";
    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not insert data into gallery: ' . mysql_error());
    }
    echo "Test data inserted into gallery table\n";
}

function insert_test_data_into_picture($conn)
{
    $sql = "INSERT INTO picture (
         GalleryId,
         MainPictureFilename, 
         GalleryPictureFilename,
         VersionListing,
         Description)
         VALUES(
         '1',
         'Manchester.jpg',
         'Manchester-Gallery.jpg',
         '1', 'Manchester Town'),
         (
         '1',
         'RedWine.jpg',
         'RedWine-Gallery.jpg',
         '1', 'Red Wine Relaxing'),
         ('1',
          'AGlassOfRed-51x51cm.jpg',
          'AGlassOfRed-51x51cm-Gallery.jpg',
          '1','A Glass Of Red Wine'),
         ('1',
          'Marionette122x68oil.jpg',
          'Marionette122x68oil-Gallery.jpg',
          '1','Marionette'),
         ('1',
          'OutOnTheTown-NewYork.jpg',
          'OutOnTheTown-NewYork-Gallery.jpg',
          '1','Out On The Town in New York'),
         ('1',
          'PreludeToAChainReadction122x90cm.jpg',
          'PreludeToAChainReadction122x90cm-Gallery.jpg',
          '1','Prelude To A Chain Reaction'),
         ('1',
          'RedFalling.jpg',
          'RedFalling-Gallery.jpg',
          '1','Red Falling')";
    
    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not insert data into picture: ' . mysql_error());
    }
    echo "Test data inserted into picture table\n";
}

function insert_test_data_into_version_listing($conn)
{
    $sql = "INSERT INTO version_listing(
         PicId,
         PaintingType,
         SizeWidth,
         SizeHeight,
         Price)
         VALUES
         ('1','1','100','200','127'),
         ('1','2','100','200','100'),
         ('1','3','100','200','2500')";

    mysql_select_db('AnthonyOrme_DB');
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
        die('Could not insert data into media_type: ' . mysql_error());
    }
    echo "Test data insered into picture table\n";
          
}


/*
  script for each picture;
  select * from picture inner join media_type 
           on Picture.Id = media_type.PicId 
           and media_type.PicId = 1;
*/

/*
Database Notes;

Each picture entry consists of the followin;
1. the root is the "picture" table
   a. Id = unique Id generated by DB
   b. MainPictureFilename = full size picture file
   c. GalleryPictureFilename = file of reduced size picture
   d. version type, this references the PicId in table version_listing
   e. description = text of the description used in the gallery

2. table "version_listing". Relationship is one to many of picture->version_listing
   a. Id = unique Id generated by DB
   b. PicId = foreign key references picutre.Id
   c. PaintingType = foreign key references painting_type.Id
   d. SizeWidth = width of painting or print
   e. SizeHeight = height of painting or print
   f. Price = sale price of painting or print

3. table "painting_type" 
   a. Id = unique identifier
   b. Description = media format of painting, Original, oil etc.


script;

use AnthonyOrme_DB;
select picture.MainPictureFilename, painting_type.Description, gallery.Description,
       version_listing.SizeHeight, version_listing.SizeWidth, version_listing.Price
       from picture
       inner join gallery on gallery.Id=1
       inner join version_listing on picture.Id=1
       inner join painting_type on version_listing.PaintingType=painting_type.Id;

MainPictureFilename	Description	     Description	SizeHeight	SizeWidth	Price
Manchester.jpg	    Original	     Main	        200	        100	         127.00
Manchester.jpg	    Original Oil     Main	        200	        100	         100.00
Manchester.jpg	    Original Pastel	 Main	        200	        100	        2500.00


 */


?> 

