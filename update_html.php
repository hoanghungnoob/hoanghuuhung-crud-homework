<?php require_once('partial/header.php'); 
    require_once './database/database.php';

    $id = $_GET['id'];
    $students = selectOnestudent($id);

    foreach ($students as $student) :

?>

    <div class="container p-4">
        <form action="./update_model.php" method="post">
            <input type="hidden" name="id" value="<?php echo intval($_GET['id']);?>" >
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" >
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo htmlspecialchars($student['age']); ?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email"value="<?php echo htmlspecialchars($student['email']); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Image URL" name="image_url"value="<?php echo htmlspecialchars($student['profile']); ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>
    
<?php     endforeach;
require_once('partial/footer.php'); 
?>