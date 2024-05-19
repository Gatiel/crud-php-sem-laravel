<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update de Usuário</title>
    <link rel="stylesheet" type="text/css" href="./styles/css/update.css">
</head>
<body>
    <div class="container">
        <h2>Update de Usuário</h2>
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            <label>Nome:</label>
            <input type="text" name="name" value="<?= $user['name']; ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $user['email']; ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
