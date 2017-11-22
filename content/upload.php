<?php
    if (isset($_POST['upload_page'])){
        $username = $_SESSION['username'];
        $page = $_POST['upload_page'];
        $title = $_POST['title'];
        $descriprion = $_POST['description'];
        $zone = $_POST['zone'];
        $imagename = 'src/assets/images/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
        mysqli_query($conn, "insert into gallery (image, title, content, image_like, zone, username) values ('$imagename', '$title', '$descriprion', 0, '$zone', '$username')") or die(mysqli_error($conn));
        header("location:?page=$page");
    }
?>