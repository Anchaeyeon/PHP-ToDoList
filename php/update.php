<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'mysql');

// GET으로 id 값 받기
$id = $_GET['id'];

$sql = "select * from todolist where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "작성한 todolist를 찾을 수 없습니다.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $todo = $_POST['edit_todo'];

    date_default_timezone_set("Asia/Seoul"); //서울 시간으로 설정
    $regDate = date("Y-m-d H:i:s"); // 현재 시간을 작성시간으로 설정

    $todo_update = "update todolist set todo='$todo', regDate='$regDate' where id=$id";
    $result_update = mysqli_query($conn, $todo_update);

    if ($result_update) {
        echo "<script>alert('todolist가 수정되었습니다!');</script>";
        echo("<script>location.href='index.php';</script>");
    }
    else {
        echo "<script>alert('todolist 수정 중 오류가 발생했습니다.');</script>";
    }
}

mysqli_close($conn);
?>
