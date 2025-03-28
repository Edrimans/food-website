<?php
include 'config.php';
$id = $_GET['id'];
$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id='$id'"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $item['image'];
    $target = "uploads/" . basename($image);
    if ($_FILES['image']['name']) move_uploaded_file($_FILES['image']['tmp_name'], $target);
    
    $query = "UPDATE menu SET name='$name', description='$description', price='$price', image='$image' WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="<?php echo $item['name']; ?>" required>
    <input type="text" name="description" value="<?php echo $item['description']; ?>" required>
    <input type="number" name="price" step="0.01" value="<?php echo $item['price']; ?>" required>
    <input type="file" name="image">
    <button type="submit">Update</button>
</form>