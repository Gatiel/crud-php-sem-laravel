<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <link rel="stylesheet" type="text/css" href="./styles/css/index.css">
</head>
<body>
    <div class="container">
        <h2>Cadastros</h2>
        <a href="create.php">Criar usuário</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Horario</th>
                <th>Ações</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= $row["id"] ?>" class="edit">Editar</a>
                            <a href="delete.php?id=<?= $row["id"] ?>" class="delete">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="no-users">Nenhum usuário encontrado</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
