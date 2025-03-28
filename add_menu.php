<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    
    $query = "INSERT INTO menu (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Food Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" name="price" step="0.01" placeholder="Price" required>
    <input type="file" name="image" required>
    <button type="submit">Add Food</button>
</form>