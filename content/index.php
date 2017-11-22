<link rel="stylesheet" href="src/assets/css/main.css" />
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
        $query = mysqli_query($conn, "select * from user_test where username='$username' and password='$password'") or die(mysqli_error($conn));
        if ($result = mysqli_fetch_assoc($query)){
            $_SESSION['username'] = $result['username'];
            header('location:?');
        }
        else {
            echo "<script>alert('invalid username or passord')</script>";
        }
    }
?>
<body class="landing">
    <!-- Banner -->
        <section id="banner">
            <img src="src/assets/images/logo.png">
            <p>Choose • Share • Eat </p>
            <p>King Mongkut's Institute of Technology Ladkrabang</p>
            <!-- login -->
            <div class="modal fade bs-modal-sme" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sme">
                    <div class="modal-content">
                        <br>
                        <div class="bs-example bs-example-tabs">
                            <h1 id="register">Sign In</h1>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="signin">
                                    <form class="form-horizontal" method='post'>
                                        <fieldset>
                                            <!-- Sign In Form modal -->
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="userid">Username:</label>
                                                <div class="controls">
                                                    <input required="" id="userid" name="login_username" type="text" class="form-control" placeholder="Username" class="input-medium" required="">
                                                </div>
                                            </div>

                                            <!-- Password input-->
                                            <div class="control-group">
                                                <label class="control-label" for="passwordinput">Password:</label>
                                                <div class="controls">
                                                    <input required="" id="passwordinput" name="login_password" class="form-control" type="password" placeholder="********" class="input-medium">
                                                </div>
                                            </div>

                                                <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="signin"></label>
                                                <div class="controls">
                                                    <button id="signin" name="signin" class="button special small" type='submit'>Sign In</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-contentz">
                        <br>
                        <div class="bs-example bs-example-tabs">
                                    <h1 id="register">Sign Up</h1>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="signin">
                                    <form class="form-horizontal" method='post'>
                                        <fieldset>
                                            <!-- Sign Up Form modal -->
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="userid">Username:</label>
                                                <div class="controls">
                                                    <input required="" id="userid" name="username" type="text" class="form-control" placeholder="Username" class="input-medium" required="">
                                                </div>
                                            </div>

                                            <!-- email input-->
                                            <div class="control-group">
                                                <label class="control-label" for="email">Email :</label>
                                                <div class="controls">
                                                    <input required="" id="Email" name="email" class="form-control" type="text" placeholder="xxxxxxxx@hotmail.com">
                                                </div>
                                            </div>

                                            <!-- Password input-->
                                            <div class="control-group">
                                                <label class="control-label" for="passwordinput">Password:</label>
                                                <div class="controls">
                                                    <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
                                                </div>
                                            </div>

                                                <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="signin"></label>
                                                <div class="controls">
                                                    <button id="signin" name="signin" class="button special small">Sign UP</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <end of login> -->
            <ul class="actions">
                <?php if (!isset($_SESSION['username'])):?>
                    <li><button class="button special big" id="signinhome" href="#signin" data-toggle="modal" data-target=".bs-modal-sme">Sign In</button> </li>
                    <li><button class="button special big" id="signinhome" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Sign Up</button> </li>
                <?php else: ?>
                    <header id="header" class="alt">
                        <h1><strong><a href="index.html" style="text-decoration:none"></a></strong></h1>

                        <nav id="nav">
                            <ul>
                            <li class="dropdown"><a class="dropbtn">NAME USER</a><div class="dropdown-content"><a href="?page=logout">logout</a></div></li>
                            </ul>
                        </nav>
                    </header>
                    <li><a href='?page=logout'><button class="button special big" id="signinhome">Sign Out</button></li></a>
                <?php endif ?>
                <li><a href="#" class="button special big" id='explore'>Explore</a></li>
            </ul>
        </section>


        <!-- Card -->
        <section id="one" class="wrapper style3 special">
            <div class="container">
                <header class="major">
                    <h2>Choose your zone</h2>
                </header>
                <div class="row">
                    <div class="card-deck">
                        <div class="card-zone">
                            <img class="card-img-top" src="src/assets/images/jinda.jpg" alt="Card image cap">
                            <div class="card-body">
                                <div class="buttons">
                                    <a href="?page=jinda" class="button special">Enter</a>
                                </div>
                            </div><br>
                        </div>
                        <div class="card-zone">
                            <img class="card-img-top" src="src/assets/images/gaygee.jpg" alt="Card image cap">
                            <div class="card-body">
                                <a href="?page=gaygee" class="button special">Enter</a>
                            </div>
                        </div>
                        <div class="card-zone">
                            <img class="card-img-top" src="src/assets/images/v-condo.jpg" alt="Card image cap">
                            <div class="card-body">
                                <a href="?page=v-condo" class="button special">Enter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

