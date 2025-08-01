<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Faculty Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
            .innerright,label {
    color: rgb(170, 31, 16);
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
    width: 20%;
}

.rightinnerdiv {
    float: right;
    width: 80%;
}

.innerright {
    background-color: lightgreen;
}

.greenbtn {
    background-color: lightgray;
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
    background-color: #16DE52;
    color: black;
}
td{
    background-color:#b1fec7;
    color: black;
}
td, a{
    color:black;
}

    

    </style>
    <body>

    <?php
   include("data_class.php");
    ?>
           <div class="container">
            <div class="innerdiv">
            <div class="row"><img class="imglogo" src="images/Banner.jpg"height="100" width="5000"/></div>
            <div class="leftinnerdiv">
                <br>
                <Button class="greenbtn" onclick="openpart('myaccount')"> <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/>  My Account</Button>
                <Button class="greenbtn" onclick="openpart('requestbook')"><img class="icons" src="images/icon/book.png" width="30px" height="30px"/> Request Book</Button>
                <Button class="greenbtn" onclick="openpart('issuereport')"> <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/>  Book Report</Button>
                <a href="index.php"><Button class="greenbtn" ><img class="icons" src="images/icon/logout.png" width="30px" height="30px"/> LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">   
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >My Account</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->userdetail($userloginid);
            $recordset=$u->userdetail($userloginid);
            foreach($recordset as $row){

            $id= $row[0];
            $name= $row[1];
            $email= $row[2];
            $pass= $row[3];
            $type= $row[4];
            $userid= $row[5];
            }               
                ?>

            <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
            <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
            <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>
            <p style="color:black"><u>User Id:</u> &nbsp&nbsp<?php echo $userid ?></p>
        
            </div>
            </div>


            



            <div class="rightinnerdiv">   
            <div id="issuereport" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >BOOK RECORD</Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->getissuebook($userloginid);
            $recordset=$u->getissuebook($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="return" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Return Book</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->returnbook($returnid);
            $recordset=$u->returnbook($returnid);
                ?>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Request Book</Button>

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
                                <th>Request</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php 
        $con = mysqli_connect("localhost","root","","library_managment");

        if(isset($_GET['searchBook'])) { 
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
                        <td>
                            <?php if($items['bookava'] > 0 && isset($userloginid)) { ?>
                                <a href="requestbook.php?bookid=<?= $items['id']; ?>&userid=<?= $userloginid; ?>">
                                    <button type="button" class="btn btn-success">Request Book</button>
                                </a>
                            <?php } else { ?>
                                <button type="button" class="btn btn-secondary" disabled>Not Available</button>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="9">No Record Found</td>
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