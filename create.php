<?php

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $email  = $_POST['email'];
    $password = $_POST['pass'];
    $pass = bin2hex($password);

    $file = "userDataloginDetails.json";
    $getFile = file_get_contents($file);
    $datas  = json_decode($getFile, true);
    $id = rand(100000, 999999);
    $newUser = array(
        "id" => $id,
        "email_phone" => $email,
        "password" => $pass,
        "username" => $username
    );

    // for($i = 0; $i < count($datas); $i++){
    //     if($datas[$i]['id'] === $id){
    //         echo "<script>alert('username already taken.'); </script>";
    //         goto aa;
    //     }else{
            $datas[] = $newUser;
            $newDatas = json_encode($datas, JSON_PRETTY_PRINT);
            $result = file_put_contents("userDataloginDetails.json", $newDatas);
        // }
    // }
    if ($result) {
       echo "registration success you can login now <a href='main.php'>click here </a>";
        } else {
           echo "failed to register at this time.";
        }
    
}
aa : ;
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
                <img src="skit.png" alt="" width="auto" height="31">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-12 col-md-5 mx-auto">
                <h4>Register</h4>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="pb-4">
                    <input type="text" name="user" id="" placeholder="set username" class="form-control mb-3" required>
                    <input type="email" name="email" id="" placeholder="email" class="form-control" required>
                    <input type="password" name="pass" id="" placeholder="set password" class="form-control my-3" required>
                    <input type="submit" value="Create Now" class="btn btn-info" name="submit">
                </form>
                <a href="main.php" class="pt-4">Log in</a>
                <div class="mt-4 text-secondary">
                    Developed by nir_mgr.2333
                </div>
            </div>
        </div>
    </div>
</body>

</html>