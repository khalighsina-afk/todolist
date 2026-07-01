<?php include ("database.php") ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>to-do-list</title>

</head>
<body>
<form action="add_task.php" method="post">
    <input type="text" name="task_input">
    <input type="submit" name="insert" value="Insert"> <br>
    <a href="index.php">Click here to go to tasks page!</a>
</form>
</body>
</html>

<?php
    if(isset ($_POST["insert"])) {
        if (empty($_POST["task_input"])) {
            echo "you didn't enter a task";
        }
        else{
            $task = filter_input(INPUT_POST, "task_input", FILTER_SANITIZE_SPECIAL_CHARS);
            echo "Task added: " . htmlspecialchars($task);

            $sql = "INSERT INTO tasks(title) VALUES ('$task')";

            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header ("Location: index.php");
        }

    }

?>
