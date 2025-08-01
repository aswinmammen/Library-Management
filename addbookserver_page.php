<?php
//addserver_page.php
include("data_class.php");


$bookname=$_POST['bookname'];
$bookdetail=$_POST['bookdetail'];
$bookaudor=$_POST['bookaudor'];
$bookpub=$_POST['bookpub'];
$branch=$_POST['branch'];
$bookprice=$_POST['bookprice'];
$bookquantity=$_POST['bookquantity'];
$bkid=$_POST['bkid'];


/*non optional code for file choosen*/
/*if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"uploads/" . $_FILES["bookphoto"]["name"])) {

    $bookpic=$_FILES["bookphoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->addbook($bookpic,$bookname,$bookdetail,$bookaudor,$bookpub,$branch,$bookprice,$bookquantity);
  } 
  else {
     echo "File not uploaded";
  }*/

  /*optional code*/
  if (isset($_FILES["bookphoto"]) && $_FILES["bookphoto"]["error"] == 0) {
    // File was uploaded
    if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"], "uploads/" . $_FILES["bookphoto"]["name"])) {
        $bookpic = $_FILES["bookphoto"]["name"];
    } else {
        echo "File not uploaded";
        $bookpic = ''; // Optional: Set a default or leave empty if no file uploaded
    }
} else {
    // No file uploaded, set the $bookpic to an empty string or a default image
    $bookpic = ''; // Optional: you can set a default image URL or path
}

// Proceed with the rest of the form submission
$obj = new data();
$obj->setconnection();
$obj->addbook($bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity, $bkid);
