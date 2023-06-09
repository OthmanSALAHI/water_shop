<?php
require 'config.php';
$sql = "SELECT * FROM clients";
$result = mysqli_query($con, $sql);
if(!$result){
    die("Query failed: " . mysqli_error($con));
}

$users = array();
while($row = mysqli_fetch_assoc($result)){
    $users[] = $row;
}
if(isset($_GET['delete']) && $_GET['delete'] == 'success'){
    echo '<div class="alert alert-success">User deleted successfully.</div>';
}
if(isset($_GET['update']) && $_GET['update'] == 'success'){
    echo '<div class="alert alert-success">User updated successfully.</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Liste des utilisateurs</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom complet</th>
                        <th>Numéro de téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user["id"]; ?></td>
                            <td><?php echo $user["fullname"]; ?></td>
                            <td><?php echo $user["phone"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $user["id"]; ?>">
                                    Supprimer
                                </button>
                                <a href="update.php?id=<?php echo $user["id"]; ?>" class="btn btn-primary">Modifier</a>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $user["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer l'utilisateur "<?php echo $user["fullname"]; ?>" ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <a href="delete.php?id=<?php echo $user["id"]; ?>" class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="index.php" class="btn btn-primary">Ajouter un nouvel utilisateur</a>
    </div>

    <!-- Link to Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>