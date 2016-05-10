<?php include '../helpers/session.php';
    Session::init(); 
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/formate.php'; ?>

<?php 
    $db = new Database();
    $frmt = new Format();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    
    <div class="container">
        <section id="content">
            
            <?php
             
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $username = $frmt->validation($_POST['username']);
                    $password = $frmt->validation(md5($_POST['password']));
                     
                    $username =  mysqli_real_escape_string($db->link,$username);
                    $password =  mysqli_real_escape_string($db->link,$password);
                     
                    $query = "SELECT * FROM tbl_user WHERE username ='$username' AND password = '$password' ";                     
                    $result = $db->select($query);
                     
                    if($result != FALSE){
                        $value = mysqli_fetch_array($result);
                        $row   = mysqli_num_rows($result);
                        
                        if($row > 0){
                            Session::set("login",TRUE);
                            Session::set("username",$value['username']);
                            Session::set("userId",$value['id']);
                            
                            header("Location:index.php");
                        }
                        else {
                            echo '<span style:"color:red;font-size:18px;">No result found</span>';
                        }
                    }
                    else {                        						
                        $errormsg =  '<p>Username or Password not matched.</p>';
                    }
                }
                
            
            ?>
            
            <form  method="POST">
                <h1>Admin Login</h1>
                <div>
                    <input type="text" placeholder="Username" required="" name="username"/>
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" name="password"/>
                </div>
                <div>
                    <input type="submit" value="Log in"/>
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Training with live project</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
    
    
    <style>
        .holder{
            width: 400px;
            background: #ccffcc;
            margin: 0 auto;
        }
        .holder p{
            text-align: center;
            padding: 5px;
            font-size: 18px;
        }
    </style>
    
    <div class="holder" style="">
       <?php 
    
            if(isset($errormsg)){
                echo $errormsg;
            }
        ?>
    </div>
    
    
</body>
</html>