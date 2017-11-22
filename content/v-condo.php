
<body class="landing">
<!-- Banner -->
<section id="banner">
    <h2>V-condo</h2>
    <p>Choose • Share • Eat </p>
    <?php if (isset($_SESSION['username'])):?>
        <p> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Upload</button></p>
    <?php endif ?>
</section>

<!-- card naja -->
<div class="cards">
    <div class="cards">
        <?php
        $query = mysqli_query($conn, "select * from gallery");
        while($result = mysqli_fetch_assoc($query)): 
            if ($result['zone'] == 'VCONDO'):?>
                <div class="card">
                    <img src="<?php echo $result['image'] ?>">
                    <div class="card-title">
                        <a href="#" class="toggle-info btn">
                            <span class="left"></span>
                            <span class="right"></span>
                        </a>
                        <h2><?php echo $result['title'] ?></h2>
                        <small><?php echo $result['date'] ?></small>
                    </div>
                    <div class="card-flap flap1">
                        <div class="card-description">
                            <?php echo $result['content'] ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endwhile ?>
    </div>
</div>

<!-- form upload  (div in all form in upload) -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PicLet's</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>


        <!-- Upload Form (detail) -->
        <div class="modal-body">
        <form method='post' action='?page=upload' enctype='multipart/form-data'>
            <input type='hidden' name='upload_page' value='<?php echo $_GET['page'] ?>'>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Title : </label>
                <input type="text" class="form-control" id="recipient-name" name='title'>
            </div>

            <div class="form-group">
                <label for="message-text" class="col-form-label"><del></del>Description : </label>
                <textarea class="form-control" id="message-text" name='description'></textarea>
            </div>


            <div class="form-group">
                <label for="sel1">Choose Your Zone :</label>
                <select class="form-control" id="sel1" name='zone'>
                    <option>JINDA</option>
                    <option>GAYGEE</option>
                    <option>VCONDO</option>
                </select>
            </div>


            <!-- browse file button -->
            <input id="input-b1" name="image" type="file" class="file" accept="image/*">


            
            <!-- "Send" Button -->
            <div class="modal-footer">
                <button class="btn btn-primary2" type='submit'>Upload</button>
            </div>
        </form>
        </div>
</body>

