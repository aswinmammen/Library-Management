<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('images/light-bluelogin.jpg');
            background-size: cover;
        }
        .login-container {
            margin-top: 2px;
            width:700px;
            height:600px;
            box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2), 0 9px 26px rgba(0, 0, 0, 0.19);
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        .nav-tabs .nav-link.active {
            background-color: blue;
            color: white;
        }
        .tab-content {
            padding: 17%;
        }
        .btnSubmit {
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
        }
        h3 {
            text-align: center;
            color: blue;
        }
        
    </style>
</head>
<body>
    <?php
        $emailmsg = $pasdmsg = $msg = $ademailmsg = $adpasdmsg = "";

        if (!empty($_REQUEST['ademailmsg'])) {
            $ademailmsg = $_REQUEST['ademailmsg'];
        }
        if (!empty($_REQUEST['adpasdmsg'])) {
            $adpasdmsg = $_REQUEST['adpasdmsg'];
        }
        if (!empty($_REQUEST['emailmsg'])) {
            $emailmsg = $_REQUEST['emailmsg'];
        }
        if (!empty($_REQUEST['pasdmsg'])) {
            $pasdmsg = $_REQUEST['pasdmsg'];
        }
        if (!empty($_REQUEST['msg'])) {
            $msg = $_REQUEST['msg'];
        }
    ?>

    <div class="container login-container">
        <div class="row">
            <div class="col-md-12">
                <h4><?php echo $msg; ?></h4>
                <ul class="nav nav-tabs" id="loginTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="faculty-tab" data-toggle="tab" href="#faculty" role="tab" aria-controls="faculty" aria-selected="false">Faculty</a>
                    </li>
                </ul>
                <div class="tab-content" id="loginTabsContent">
                    <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                        <h3>ADMIN LOGIN</h3>
                        <form action="loginadmin_server_page.php" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                               
                            </div>
                            <label style="color:red">*<?php echo $ademailmsg?></label>
                            <div class="form-group">
                                <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *" value="" />
                                
                            </div>
                            <label style="color:red">*<?php echo $adpasdmsg?></label>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login"/>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="faculty" role="tabpanel" aria-labelledby="faculty-tab">
                        <h3>FACULTY LOGIN</h3>
                        <form action="login_server_page.php" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                                
                            </div>
                            <label style="color:red">*<?php echo $ademailmsg?></label>
                            <div class="form-group">
                                <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *" value="" />
                                
                            </div>
                            <label style="color:red">*<?php echo $adpasdmsg?></label>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
