<?php
include 'config.php'; // Ensure database connection

// Fetch registered users
$user_query = "SELECT * FROM users";
$users = mysqli_query($conn, $user_query);

// Fetch menu items
$menu_query = "SELECT * FROM menu";
$menu_items = mysqli_query($conn, $menu_query);
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
    <h1>Admin Dashboard</h1>

    <section>
        <h2>Registered Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </section>

    <section>
        <h2>Manage Menu</h2>
        <a href="add_menu.php">➕ Add New Item</a>
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            <?php while ($item = mysqli_fetch_assoc($menu_items)) { ?>
                <tr>
                    <td><img src="uploads/<?php echo $item['image']; ?>" width="50"></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['description']; ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td>
                        <a href="edit_menu.php?id=<?php echo $item['id']; ?>">✏️ Edit</a>
                        <a href="delete_menu.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">🗑️ Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>
</body>
</html>
