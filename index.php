<?php require_once('partial/header.php'); ?>
    <div class="container p-4">
        <div class="d-flex justify-content-end p-2">
            <a href="./create_html.php" class="btn btn-primary">Add +</a>
        </div>


        <?php 
            require_once './database/database.php';
            $data = selectAllStudents();
            for ($i = 0; $i < count($data); $i++) {
        ?>
                <div class="card">
                    <div class="card-body" >
                        <div class="d-flex">
                            <div class="card-image mr-3">
                                <img class="img-fluid" width="200" src="<?php echo htmlspecialchars($data[$i]['profile']); ?>" alt="">
                            </div>
                            <div class="info">
                                <h1 class="display-4">Name: <?php echo htmlspecialchars($data[$i]['name']) ;?></h1>
                                <strong>Age: <?php echo htmlspecialchars($data[$i]['age']) ;?></strong> 
                                <p>Email: <?php echo htmlspecialchars($data[$i]['email']) ;?></p>
                            </div>
                        </div>
                            <div class="action d-flex justify-content-end">
                                <a href="./update_html.php?id=<?php echo $data[$i]['id']; ?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                                <a href="./delete_model.php?id=<?php echo $data[$i]['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                    </div>
                </div>
        <?php
            }

        ?>
        <!-- <div class="card">
            <div class="card-body" >
               <div class="d-flex">
                    <div class="card-image mr-3">
                        <img class="img-fluid" width="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Young_girl_smiling_in_sunshine_%282%29.jpg/1200px-Young_girl_smiling_in_sunshine_%282%29.jpg" alt="">
                    </div>
                    <div class="info">
                        <h1 class="display-4">Name: Kanha </h1>
                        <strong>Age: 10</strong> 
                        <p>Email: kanha@gmail.com</p>
                    </div>
               </div>
                <div class="action d-flex justify-content-end">
                    <a href="" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div> -->
<?php require_once('partial/footer.php'); ?>