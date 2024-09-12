<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];

    $sql = "INSERT INTO users (firstname, lastname, nickname) VALUES ('$firstname', '$lastname', '$nickname')";
    
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
    <title>เพิ่มข้อมูล</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">เพิ่มข้อมูลใหม่</h2>
        <form method="POST" action="create.php">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" name="firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>นามสกุล</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>ชื่อเล่น</label>
                <input type="text" name="nickname" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
            <a href="index.php" class="btn btn-secondary">กลับ</a>
        </form>
    </div>
</body>
</html>
