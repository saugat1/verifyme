<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    // $pass = hex2bin($pass)
    $result = false;
    $file = "userDataloginDetails.json";
    $getFile = file_get_contents($file);
    $datas  = json_decode($getFile, true);
    for ($i=0; $i < count($datas); $i++) { 
        if($datas[$i]['username'] === $username && $datas[$i]['password'] === bin2hex($pass)){
            $result = true;
            $uid = $datas[$i]['id'];
            $_SESSION['user'] = $uid;
            $_SESSION['username'] = $username;
           
        }
    }
    if ($result) {
        echo "<script>alert('hello logged in'); </script>";
            header("location: index.php");
     } else{ 
         echo "<script>alert('username or password incorrect');
         window.location.href = 'main.php';
         </script> ";
            
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crackrx @mr nirmalhax</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <img src="skit.png" alt="" height="35" width="auto">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-12 col-md-5 mx-auto">

                <h4>Login</h4>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="pb-4">
                    <input type="text" name="user" id="" placeholder="username" class="form-control"  required>
                    <input type="password" name="pass" id="" placeholder="password" class="form-control my-3" required>
                    <input type="submit" value="Log in" class="btn btn-info" name="login">
                </form>
                <a href="create.php" class="pt-4">Create Account</a>
                <div class="mt-4 text-secondary">
                    Developed by nir_mgr.2333
                </div>
            </div>
        </div>
    </div>
</body>

</html>