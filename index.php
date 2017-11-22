<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="src/assets/images/logo-title.ico">
    <link rel="stylesheet" href="src/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit|Mitr" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit|Mitr" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="src/assets/css/list.css" />
    <link rel="stylesheet" href="src/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/assets/css/home1.css" />
    <title>PicLet's</title>
</head>
<body>
    <?php
        // connect database
        $conn = mysqli_connect('localhost', 'root', '', 'palm') or die(mysqli_error($conn));

        // start session
        session_start();
    ?>
    <div>
        <!-- Header -->
        <?php if (isset($_GET['page'])):?>
        <header id="header" class="alt">
            <h1><strong><a href="?" style="text-decoration:none">PicLet's</a></strong></h1>
            <nav id="nav">
                <ul>
                    <li><a href="?">Home</a></li>
                    <li><a href="?page=jinda">Jinda</a></li>
                    <li><a href="?page=gaygee">Gaygee</a></li>
                    <li><a href="?page=v-condo">V-Condo</a></li>
                    <?php if (isset($_SESSION['username'])):?>
                        <li class="dropdown"><a class="dropbtn"><?php echo $_SESSION['username'] ?></a><div class="dropdown-content"><a href="?page=logout ">sign out</a></div></li>
                    <?php endif ?>
                </ul>
            </nav>
        </header>
        <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        <?php endif; ?>
    </div>
    <div>
        <!-- Content -->
        <?php
            if (!isset($_GET['page'])) {
                require_once 'content/index.php';
            } else {
                switch ($_GET['page']) {
                    case 'login':
                        require_once 'content/login.php';
                        break;
                    case 'register':
                        require_once 'content/register.php';
                        break;
                    case 'logout':
                        require_once 'content/logout.php';
                        break;
                    case 'gallery':
                        require_once 'content/gallery.php';
                        break;
                    case 'gaygee':
                        require_once 'content/gaygee.php';
                        break;
                    case 'jinda':
                        require_once 'content/jinda.php';
                        break;
                    case 'upload':
                        require_once 'content/upload.php';
                        break;
                    case 'v-condo':
                        require_once 'content/v-condo.php';
                        break;
                    default:
                        require_once 'content/index.php';
                    break;
                }
            }
        ?>
    </div>
    <div>
        <!-- Footer -->
    </div>
</body>
    <script src="src/assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="src/assets/js/bootstrap.min.js"></script>
    <script src="src/assets/js/skel.min.js"></script>
    <script src="src/assets/js/util.js"></script>
    <script src="src/assets/js/scroll.js"></script>
    <script src="src/assets/js/button.js"></script>
    <script src="src/assets/js/home1.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="src/assets/js/main.js"></script>
</html>