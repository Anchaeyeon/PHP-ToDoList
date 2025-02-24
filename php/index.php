<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'mysql');
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
                    <input type="text" placeholder="할 일을 입력하세요"/>
                    <div id="add-btn">
                        <input type="submit" value="Add" name="add-todo">
                    </div>
                </div>
            </form>
        </div>
        <p id="error">빈 칸으로 작성할 수 없습니다.</p>
    </div>
    <script src="../js/index.js"></script>
</body>
</html>