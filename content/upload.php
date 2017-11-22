<?php
    if (isset($_POST['upload_page'])){
        $page = $_POST['upload_page'];
        $title = $_POST['title'];
        $descriprion = $_POST['description'];
        $zone = $_POST['zone'];
        $imagename = 'src/assets/images/'.date('Y-m-d-h-s'). '-'. $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imagename);
        mysqli_query($conn, "insert into gallery (image, title, content, zone, image_like) values ('$imagename', '$title', '$descriprion', '$zone', 0)") or die(mysqli_error($conn));
        header("location:?page=$page");
    }
?>