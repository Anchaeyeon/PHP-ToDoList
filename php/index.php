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
                    <input type="text" name="add_todo" placeholder="할 일을 입력하세요" />
                    <div id="add-btn">
                        <input type="submit" value="Add">
                    </div>
                </div>
            </form>
        </div>

        <?php
        $conn = mysqli_connect('localhost', 'root', '111111', 'mysql');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $todo = $_POST['add_todo'];

            if (!empty($todo)) {
                // 데이터 저장
                $insertTodo = "insert into todolist (todo) values ('$todo')";
                mysqli_query($conn, $insertTodo);
            }
            else {
                echo "<script>alert('빈 칸으로 작성할 수 없습니다. 할 일을 입력해주세요!');</script>";
            }
        }

        // 수정 폼 표시
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql_edit = "select * from todolist where id = '$id'";
            $result_edit = mysqli_query($conn, $sql_edit);
            $row = mysqli_fetch_assoc($result_edit);

            echo "<div class='edit-container active'>
                    <form method='post' action='update.php?id=$id'>
                        <input type='text' name='edit_todo' value='".htmlspecialchars($row['todo'])."'/>
                        <input type='submit' value='완료'/>
                    </form>
                  </div>";
        }
        ?>

        <div class="todo-container">
            <table>
                <tr>
                    <th>To Do List</th>
                </tr>

                <?php
                // 데이터 가져오기
                $sql = "select * from todolist order by id desc";
                $result = mysqli_query($conn, $sql);
                $cnt = mysqli_num_rows($result);

                for ($i = 0; $i < $cnt; $i++) {
                    $item = mysqli_fetch_row($result);

                    echo "<tr>
                            <td>
                                <input type='checkbox' id='$item[0]' class='checkbox'>
                                <label for='$item[0]'>$item[1]</label>
                                <div class='todo-button'>
                                    <a href='index.php?id=$item[0]' class='edit-todo'>수정</a>
                                    <a href='delete.php?id=$item[0]' class='delete-todo'>삭제</a>
                                </div>
                            </td>
                          </tr>";
                }

                // 연결 끊기
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</body>
</html>
