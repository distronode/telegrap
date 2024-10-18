<?php
ob_start();
session_start();
?>

<?php
$msg = '';
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username=='support' && $password=='support123') {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = "$username";
		$_SESSION['status_filter']='payment_complete';
		$_SESSION['per_page']=10;
		header("Location: order.php");
		die();
    } else {
        echo 'Wrong username or password';
    }
}
?>

<html lang = "en">
    <head>
        <title>Customer Orders</title>
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #ADABAB;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                color: #017572;
            }

            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin .checkbox {
                font-weight: normal;
            }

            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
                border-color:#017572;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-color:#017572;
            }

            h2{
                text-align: center;
                color: #017572;
            }
			.btn-primary{background-color: #f47727; color: #fff; padding: 10px; border-radius: 3px; border: 0; width: 219px; cursor: pointer;}
        </style>
    </head>
    <body> 
        <div class = "container">
            <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" style="text-align: center;margin-top: 210px;">
                <input type = "text" class = "form-control"  name = "username" placeholder = "Username" required autofocus value=""></br>
                <input type = "password" class = "form-control" name = "password" placeholder = "Password" value="" required>
                <button class = "btn btn-lg btn-primary btn-block"  type = "submit"  name = "login">Login</button>
            </form>
        </div>
    </body>
</html>