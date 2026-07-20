<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test MVC</title>
</head>
<body>

<h1>MySQL</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
    </tr>

    <?php foreach($mysql as $row): ?>

    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nom'] ?></td>
    </tr>

    <?php endforeach; ?>
</table>

<br>

<h1>PostgreSQL</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
    </tr>

    <?php foreach($postgres as $row): ?>

    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nom'] ?></td>
    </tr>

    <?php endforeach; ?>
</table>

<br>

<h1>SQLite</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
    </tr>

    <?php foreach($sqlite as $row): ?>

    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nom'] ?></td>
    </tr>

    <?php endforeach; ?>
</table>

</body>
</html>