<?php
require 'config.php';

if(!isset($_GET['id'])){
    header('Location: user.php');
    exit();
}

$user_id = $_GET['id'];
$sql = "SELECT * FROM clients WHERE id = '$user_id'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

if (mysqli_num_rows($result) == 0) {
    header('Location: user.php');
    exit();
}

$user = mysqli_fetch_assoc($result);//making the result of sql to table

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $sql = "UPDATE clients SET fullname='$fullname', phone='$phone' WHERE id='$user_id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die("Query failed: " . mysqli_error($con));
    }
    header('Location: user.php?update=success');//query string with message 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Modifier un utilisateur</h1>
        <form method="POST">
            <div class="form-group">
                <label for="fullname">Nom complet:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Numéro de téléphone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
            </div>
            <button type="submit" name="submit" id="btnAjouter" class="btn btn-primary">Enregistrer</button>
            <a href="user.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <!-- Link to Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
