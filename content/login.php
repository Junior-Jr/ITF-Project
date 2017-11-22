<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="src/assets/css/login.css">
    <script src="src/assets/js/login.js"></script>
</head>
<body>
    <div class="cont_login">
        <div class="cont_info_log_sign_up">
            <div class="col_md_login">
                <div class="cont_ba_opcitiy">
                    <h2>LOGIN</h2>
                    <p>Please log in </p>
                    <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                </div>
            </div>
            <div class="col_md_sign_up">
                <div class="cont_ba_opcitiy">
                    <h2>SIGN UP</h2>
                    <p>Please Register'</p>
                    <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                </div>
            </div>
        </div>
        <div class="cont_back_info">
            <div class="cont_img_back_grey">
                <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
            </div>
        </div>
        
        <div class="cont_forms" >
            <div class="cont_img_back_">
                <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
            </div>
            <form method="post" action="">
                <div class="cont_form_login">
                    <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
                    <h2>LOGIN</h2>
                    <input class="log" type="text" placeholder="user" name='login_username' />
                    <input class="log" type="password" placeholder="Password" name='login_password' />
                    <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                </div>
            </form>
            <form method="post" action="">
                <div class="cont_form_sign_up">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                    <h2>SIGN UP</h2>
                    <input class="log" type="text" placeholder="Email" name='email' />
                    <input class="log" type="text" placeholder="User" name='username' />
                    <input class="log" type="password" placeholder="Password" name='password' />
                    <!-- <input type="password" placeholder="Confirm Password" /> -->
                    <button class="btn_sign_up" type="submit">SIGN UP</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>



<?php
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query = mysqli_query($conn, "select * from user_test where username='$username'") or die(mysqli_error($conn));
        if (!$result = mysqli_fetch_assoc($query)){
            mysqli_query($conn, "insert into user_test (username, password, email) values ('$username', '$password', '$email')") or die(mysqli_error($conn));
            $query = mysqli_query($conn, "select * from user_test where username='$username' and password='$password'") or die(mysqli_error($conn));
            $result = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $result['username'];
            header('location:?');
        }
        else echo "<script>alert('ERROR')</script>";

    }
    if (isset($_POST['login_username'])){
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];
        $query = mysqli_query($conn, "select * from user_test where username='$username' and    password='$password'") or die(mysqli_error($conn));
        if ($result = mysqli_fetch_assoc($query)){
            $_SESSION['username'] = $result['username'];
            header('location:?');
        }
        else {
            echo "<script>alert('invalid username or passord')</script>";
        }
    }
?>