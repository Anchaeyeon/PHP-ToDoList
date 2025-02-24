<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'mysql');

$id = $_GET['id'];

$sql = "select * from todolist where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (!$row) {
    echo "todolist를 찾을 수 없습니다.";
    exit;
}
?>