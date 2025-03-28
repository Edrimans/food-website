<?php
session_start();
include 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Fetch all users
$users = mysqli_query($conn, "SELECT id, username, email, created_at FROM users");

// Fetch all menu items
$menu = mysqli_query($conn, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Admin Panel</h1>
    
    <h2>Registered Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Registered At</th>
        </tr>
        <?php while ($user = mysqli_fetch_assoc($users)) : ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Menu Items</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($item = mysqli_fetch_assoc($menu)) : ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['description'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><img src="uploads/<?= $item['image'] ?>" width="50"></td>
            <td>
                <a href="edit_menu.php?id=<?= $item['id'] ?>">Edit</a> |
                <a href="delete_menu.php?id=<?= $item['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Add New Menu Item</h2>
    <form action="add_menu.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="file" name="image" required>
        <button type="submit">Add Item</button>
    </form>
</body>
</html>
