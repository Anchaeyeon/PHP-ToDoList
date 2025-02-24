<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'mysql');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $todo = $_POST['add_todo'];

    if (!empty($todo)) {
        $insertTodo = "insert into todolist (todo) values ('$todo')";
        mysqli_query($conn, $insertTodo);
    } else {
        echo "<script>alert('빈 칸으로 작성할 수 없습니다. 할 일을 입력해주세요!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>ToDoList</title>
</head>
<body>
    <div class="app">
        <div class="container">
            <form method="post" action="">
                <div id="wrapper">
                    <input type="text" name="add_todo" placeholder="할 일을 입력하세요"/>
                    <div id="add-btn">
                        <input type="submit" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
