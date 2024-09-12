<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];

    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', nickname='$nickname' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">แก้ไขข้อมูล</h2>
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname']; ?>" required>
            </div>
            <div class="form-group">
                <label>นามสกุล</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname']; ?>" required>
            </div>
            <div class="form-group">
                <label>ชื่อเล่น</label>
                <input type="text" name="nickname" class="form-control" value="<?php echo $row['nickname']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
            <a href="index.php" class="btn btn-secondary">กลับ</a>
        </form>
    </div>
</body>
</html>
