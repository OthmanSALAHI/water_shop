<?php
require 'config.php';

$message = '';//the init of error message

if(isset($_POST["submit"])){//the condition of the button submit
    $ID = $_POST["id"];
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    //returning the inputs
    $sql = "INSERT INTO clients VALUES ('$ID','$fullname','$phone')";
    $result = mysqli_query($con, $sql);
    //lunching sql code
    if($result){
        header("location:user.php");//checking the result of sql code
    }else{
        $message = "Erreur d'ajouters";//error message
        if(mysqli_errno($con) == 1062) {
            $message = "L'ID '$ID' existe déjà dans la base de données.";//the message of error
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouveau client</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Ajouter un nouveau client</h1>
        <?php if($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="fullname" class="col-sm-2 col-form-label">Nom complet</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Numéro de téléphone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="submit" id="btnAjouter" class="btn btn-primary">Ajouter</button>
                    <a href="user.php" class="btn btn-primary">Voir les utilisateurs</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Link to Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
