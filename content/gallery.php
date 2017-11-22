<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        $query = mysqli_query($conn, "select * from gallery");
        while ($result = mysqli_fetch_assoc($query)) {
            echo "<img src='$result[image]'>";
            echo "<a href='?page=gallery&like=$result[id]' class='btn btn-success'> Like</a>";
            echo $result["image_like"];
        }
    ?>

</body>
</html>

<?php
    if (isset($_GET['like'])){
        mysqli_query($conn, "update gallery set image_like = image_like+1 where id = '$_GET[like]'") or die(mysqli_error($conn));
        header('location:?page=gallery');
    }
?>