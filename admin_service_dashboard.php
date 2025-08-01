<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>

        .innerright,label {
    color: rgb(16, 170, 16);
    font-weight:bold;
}
.container,
.row,
.imglogo {
    margin:auto;
}

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 100px;
}
input{
    margin-left:20px;
}
.leftinnerdiv {
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}



.innerright {
    background-color: burlywood;
}

.greenbtn {
    background-color: #ffe3e3;
    color: black;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: black;
    font-size: large;
}

th{
    background-color:rgb(117, 238, 147);
    color: black;
}
td{
    background-color:rgb(180, 237, 196);
    color: black;
}
td, a{
    color:black;
}


        /* * {
            box-sizing: border-box;
            font-family: 'Roboto';
        } */
        
        label {
            margin-left:50px;
            padding-Top:10px;
            /* display: block;
            text-align: left; */
            font-size: 18px;
            /* font-style:bold;
            padding-bottom: 0px; */
            color: rgb(255, 255, 255);
            /* font-weight: 300;
            margin-bottom: 0rem; */
        }
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type=text]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        input[type=pasword]:focus,

        select:focus,
        textarea:focus {
            outline: none;
        }
        
        input[type=text],
        input[type=email],
        input[type=number],
        input[type=pasword],
        select,
        textarea {
            
            width: 40%;
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            margin-top: 2px;
            margin-bottom: 2px;
            resize: vertical;
        }
        


        
        body {
            font-family: 'Roboto';
            /* background-image: url('images/library.jpg'); */
         
        }
        


        
         ::placeholder {
            color: rgb(189, 184, 184);
            font-style: italic;
            font-size: 14px;
        }   
    </style>
    <body >

    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

    ?>



        <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/Banner.jpg" height="100" width="5000"/></div>
            <div class="leftinnerdiv">
                <!-- <Button class="greenbtn"> ADMIN</Button> -->
                <br>
                <Button class="greenbtn" onclick="openpart('addbook')" ><img class="icons" />  ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')" > <img class="icons" /> BOOK REPORT</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"><img class="icons"/> BOOK REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"> <img class="icons" /> ADD FACULTY</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> <img class="icons" /> FACULTY REPORT</Button>
                <Button class="greenbtn"  onclick="openpart('issuebook')"> <img class="icons"/> ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"> <img class="icons" /> ISSUE REPORT</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons"/> LOGOUT</Button></a>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn" >BOOK REQUEST APPROVE</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="addbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >ADD NEW BOOK</Button>
            <br>
            <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">

            <label style="color :brown">Book Id:</label><input type="text" name="bkid"/>
            </br>    
            <label style="color :brown">Book Name:</label><input type="text" name="bookname"/>
            </br>
            <label style="color :brown">Detail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input  type="text" name="bookdetail"/></br>
            <label style="color :brown">Author:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="bookaudor"/></br>
            <label style="color :brown">Publication:&nbsp;&nbsp;</label><input type="text" name="bookpub"/></br>
              
            <label style="color :brown">Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input  type="number" name="bookprice"/></br>
            <label style="color :brown">Quantity:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" name="bookquantity"/></br>
             <!--<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book Photo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input  type="file" name="bookphoto"/></br>
            </br>-->
                
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD FACULTY</Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>User Id:</label><input type="text" name="adduserid"/>
            </br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
           <!-- <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="teacher">teacher</option>
            </select> -->
            <label>Type:</label><input type="text" value="Faculty"/>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>



            <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="greenbtn" >FACULTY RECORD</Button>
            <!--search bar code-->
            <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form id="searchFormm" action="" method="GET">
                                <div class="input-group mb-10">
                                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    (Search by Id,Name, Email,type)
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-18">
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table table-bordered" id="searchResults">
                        <thead>
                            <tr>
                                <!--<th>ID</th>-->
                                <th>userid</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $con = mysqli_connect("localhost","root","","library_managment");

                                if(isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT * FROM userdata WHERE CONCAT(userid,name,email,type) LIKE '%$filtervalues%' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $items) {
                                            ?>
                                            <tr>
                                                
                                                <td><?= $items['userid']; ?></td>
                                                <td><?= $items['name']; ?></td>
                                                <td><?= $items['email']; ?></td>
                                                <td><?= $items['type']; ?></td>
                                
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script>
   $(document).ready(function() {
    // Handle form submission via AJAX
    $('#searchFormm').on('submit', function(e) {
        e.preventDefault(); // Prevent form from submitting the normal way

        var searchInput = $('input[name="search"]');
        var searchValue = searchInput.val(); // Get search input value

        $.ajax({
            url: '', // The same page
            type: 'GET',
            data: { search: searchValue },
            success: function(response) {
                // Update the search results table without reloading the page
                $('#searchResults').html($(response).find('#searchResults').html());

                // Clear the search input field
                searchInput.val('');
            }
        });
    });
});

</script>

<!--search bar code end-->

<?php
$u = new data;
$u->setconnection();
$recordset = $u->userdata();
?>
<body>

<div class="scrollable-table">
    <table>
        <thead>
        <tr>
            <!--<th>ID</th>-->
            <th>userid</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($recordset as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row[5]); ?></td>
                    <td><?php echo htmlspecialchars($row[1]); ?></td>
                    <td><?php echo htmlspecialchars($row[2]); ?></td>
                    <td><?php echo htmlspecialchars($row[4]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>


            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Issue Book Record</Button>

            

            <!--search bar code-->
            <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form id="searchFormissue" action="" method="GET">
                                <div class="input-group mb-10">
                                    <input type="text" name="searchissue" required value="<?php if(isset($_GET['searchissue'])){echo $_GET['searchissue']; } ?>" class="form-control" placeholder="Search data">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    (Search by User Id,Issue Name,Book Name)
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-18">
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table table-bordered" id="searchResult">
                        <thead>
                            <tr>
                                <th>User id</th>
                                <th>Issue name</th>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                                <th>Fine</th>
                                <th>Issue Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $con = mysqli_connect("localhost","root","","library_managment");

                                if(isset($_GET['searchissue'])) {
                                    $filtervalues = $_GET['searchissue'];
                                    $query = "SELECT * FROM issuebook WHERE CONCAT(id,issuename,issuebook,issuetype,issuedate,issuereturn,fine) LIKE '%$filtervalues%' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td><?= $items['id']; ?></td>
                                                <td><?= $items['issuename']; ?></td>
                                                <td><?= $items['issuebook']; ?></td>
                                                <td><?= $items['issuedate']; ?></td>
                                                <td><?= $items['issuereturn']; ?></td>
                                                <td><?= $items['fine']; ?></td>
                                                <td><?= $items['issuetype']; ?></td>
                                
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script>
   $(document).ready(function() {
    // Handle form submission via AJAX
    $('#searchFormissue').on('submit', function(e) {
        e.preventDefault(); // Prevent form from submitting the normal way

        var searchInput = $('input[name="searchissue"]');
        var searchValue = searchInput.val(); // Get search input value

        $.ajax({
            url: '', // The same page
            type: 'GET',
            data: { searchissue: searchValue },
            success: function(response) {
                // Update the search results table without reloading the page
                $('#searchResult').html($(response).find('#searchResult').html());

                // Clear the search input field
                searchInput.val('');
            }
        });
    });
});



</script>

<!--search bar code end-->
<?php
$u = new data;
$u->setconnection();
$recordset = $u->issuereport();
?>

<body>

<div class="scrollable-table">
    <table>
        <thead>
        <tr>
            <th>User id</th>
            <th>Issue name</th>
            <th>Book Name</th>
            <th>Issue Date</th>
            <th>Return Date</th>
            <th>Fine</th>
            <th>Issue Type</th>
         </tr>
        </thead>
        <tbody>
            <?php foreach ($recordset as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row[1]); ?></td>
                    <td><?php echo htmlspecialchars($row[2]); ?></td>
                    <td><?php echo htmlspecialchars($row[3]); ?></td>
                    <td><?php echo htmlspecialchars($row[6]); ?></td>
                    <td><?php echo htmlspecialchars($row[7]); ?></td>
                    <td><?php echo htmlspecialchars($row[8]); ?></td>
                    <td><?php echo htmlspecialchars($row[4]); ?></td>
                   <!-- <td>
                        <a href='admin_service_dashboard.php?viewid=<?php echo $row[0]; ?>'>
                            <button class="view-btn">View BOOK</button>
                        </a>
                    </td>-->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>


            </div>
            </div>

<!--issue book-->
            <div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <label for="book">Choose Book:</label>
           
            <select name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>
<br>
            <label for="Select Student">Select Faculty:</label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<br>
           <label>Days</label> <input type="number" name="days"/>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >BOOK DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];
               $bkid= $row[11];

            }            
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/<?php echo $bookimg?> "/>
            </br>
            <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
            <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
            <p style="color:black"><u>Book Id:</u> &nbsp&nbsp<?php echo $bkid ?></p>
            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >BOOK RECORD</Button>

            <!-- Second Search Bar (Books) -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form id="searchFormBooks" action="" method="GET">
                                <div class="input-group mb-10">
                                    <input type="text" name="searchBook" required value="<?php if(isset($_GET['searchBook'])){echo $_GET['searchBook']; } ?>" class="form-control" placeholder="Search Books">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    (Search by Book Name, Book Author)
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-18">
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table table-bordered" id="searchResultss">
                        <thead>
                            <tr>
                                <th>Book Id</th>
                                <th>Book Name</th>
                                <th>Book Detail</th>
                                <th>Author</th>
                                <th>Publish</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Available</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $con = mysqli_connect("localhost","root","","library_managment");

                                if(isset($_GET['searchBook'])) { // Fixed search variable
                                    $filtervalues = $_GET['searchBook'];
                                    $query = "SELECT * FROM book WHERE CONCAT(id, bookname, bookaudor) LIKE '%$filtervalues%' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td><?= $items['bkid']; ?></td>
                                                <td><?= $items['bookname']; ?></td>
                                                <td><?= $items['bookdetail']; ?></td>
                                                <td><?= $items['bookaudor']; ?></td>
                                                <td><?= $items['bookpub']; ?></td>
                                                <td><?= $items['bookprice']; ?></td>
                                                <td><?= $items['bookquantity']; ?></td>
                                                <td><?= $items['bookava']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="8">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function() {
    // Handle form submission via AJAX for Books
    $('#searchFormBooks').on('submit', function(e) {
        e.preventDefault(); // Prevent page reload

        var searchInput = $('input[name="searchBook"]'); // Store input field reference
        var searchValue = searchInput.val(); // Get input value

        $.ajax({
            url: '', // Keep the same page
            type: 'GET',
            data: { searchBook: searchValue }, // Fixed variable name
            success: function(response) {
                $('#searchResultss').html($(response).find('#searchResultss').html()); // Fixed table ID
                
                // Clear the search input field
                searchInput.val('');
            },
            error: function() {
                console.log("Error in AJAX request for books.");
            }
        });
    });
});
</script>
<!--search bar code end-->

<?php
$u = new data;
$u->setconnection();
$recordset = $u->getbook();
?>

<style>
        .scrollable-table {
            max-height: 200px; /* Adjust height as needed */
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #76c7c0; /* Light Green */
            color: black;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        td {
            background-color: #e3f2fd; /* Light Blue */
        }

        .view-btn {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .view-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="scrollable-table">
    <table>
        <thead>
            <tr>
                 <th>Book Id</th>
                <th>Book Name</th>
                <th>Book Detail</th>
                <th>Author</th>
                <th>Publish</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recordset as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row[11]); ?></td>
                    <td><?php echo htmlspecialchars($row[2]); ?></td>
                    <td><?php echo htmlspecialchars($row[3]); ?></td>
                    <td><?php echo htmlspecialchars($row[4]); ?></td>
                    <td><?php echo htmlspecialchars($row[5]); ?></td>
                    <td><?php echo htmlspecialchars($row[7]); ?></td>
                    <td><?php echo htmlspecialchars($row[8]); ?></td>
                    <td><?php echo htmlspecialchars($row[9]); ?></td>
                   <!-- <td>
                        <a href='admin_service_dashboard.php?viewid=<?php echo $row[0]; ?>'>
                            <button class="view-btn">View BOOK</button>
                        </a>
                    </td>-->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>


            </div>
            </div>
        </div>
        </div>
        

     
        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }
        </script>
    </body>
</html>