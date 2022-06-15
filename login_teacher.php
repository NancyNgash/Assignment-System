<?php
include('header.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<body>

    <?php include('navhead.php'); ?>

    <div class="container">
        <div class="row-fluid">
            <div class="span10">
                <ul class="breadcrumb">
                    <li class="active">Login<span class="divider">/</span></li>
                    <li class="active"><i class="icon-group icon-large"></i>&nbsp;Teacher<span class="divider">/</span></li>
                    <li><a href="login_student.php"><i class="icon-group icon-large"></i>&nbsp;Student</a></li>

                    <div class="pull-right">       
                        <li>   
                            <i class="icon-calendar icon-large"></i>
                            <?php
                            $Today = date('y:m:d');
                            $new = date('l, F d, Y', strtotime($Today));
                            echo $new;
                            ?>
                        </li>
                    </div>  
                </ul>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Login Teacher!</strong>&nbsp;Please Enter the Details Below.
                </div>

                <form class="form-horizontal" method="post">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input type="email" name="email" id="inputEmail" placeholder="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="inputPassword" placeholder="Password">
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="login" class="btn btn-info"><i class="icon-signin"></i>&nbsp;Sign in</button>
                        </div>


                    </div>

                    <?php
                    if (isset($_POST['login'])) {

                        function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysqli_real_escape_string($str);
                            }

                        $email = clean($_POST['email']);
                        $password = clean($_POST['password']);

                        $query = mysqli_query($conn,"select * from teacher where email='$email' and password='$password'") or die(mysqli_error());
                        $count = mysqli_num_rows($query);
                        $row = mysqli_fetch_array($query);


                        if ($count > 0) {
                            $_SESSION['id'] = $row['teacher_id'];
                            echo('<script>location.href = "teacher_home.php"</script>');
                            session_write_close();
                            exit();
                        } else {
                            session_write_close();
                            ?>
                            <div class="pull-right">   
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <div class="alert alert-danger"><i class="icon-remove-sign"></i>&nbsp;Access Denied</div>
                            </div>
                            <?php
                            exit();
                        }
                    }
                    ?>

                </form>




            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>






</body>
</html>


