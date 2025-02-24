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

$todo_delete = "delete from todolist where id = $id";
$final_delete = mysqli_query($conn, $todo_delete);

if ($final_delete) {
    echo "<script>alert('todolist가 삭제되었습니다!');</script>";
    echo("<script>location.href='index.php';</script>");
}
else {
    echo "<script>alert('todolist 삭제 중 오류가 발생했습니다.');</script>";
}
?>