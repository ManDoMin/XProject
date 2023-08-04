<!DOCTYPE html>
<html>
<head>
    <title>Thêm nhân viên mới</title>
</head>
<body>
<h1>Thêm nhân viên mới</h1>
<form action="process_add.php" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="address">Address:</label>
    <input type="text" name="address" id="address"><br>

    <label for="salary">Salary:</label>
    <input type="number" name="salary" id="salary" step="0.01" required><br>

    <input type="submit" value="Thêm">
</form>
<p><a href="index.php">Quay lại danh sách nhân viên</a></p>
</body>
</html>
