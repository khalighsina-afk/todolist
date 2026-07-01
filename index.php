<!--index-->
<?php include ("database.php") ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>to-do-list</title>

</head>
<body>
<a href="add_task.php">to add tasks, click here! <br> </a>
<label>Tasks: <br></label>
</body>
</html>
<?php
    $sql = "SELECT * FROM tasks";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){  ?>
            <div>
                <p>
                    Task ID: <?php echo $row["task_id"]; ?> <br>
                    Task: <?php echo $row["title"]; ?><br>
                    Created at: <?php echo $row["creation_date"]; ?><br>
                    Description: <?php echo $row["descr"]; ?><br>
                    Due date: <?php echo $row["due_date"]; ?><br>
                    Completion date: <?php echo $row["completion_date"]; ?><br>

                </p>
                <form method="post" action="index.php">
                    <input type="hidden" value="<?php echo $row["task_id"]; ?>" name="task_id_getter" >
                    <input type="checkbox" name="task_complete" value="<?php echo $row["task_id"]; ?>"
                           <?php echo ($row["completion_date"] != NULL) ? "checked" : ""; ?>
                           onchange="this.form.submit()">
                    <button type="submit" name="task_delete">Delete</button>
                </form>
                <p>-----------------------------</p><br>
            </div>
      <?php  }
    }
    if (isset($_POST["task_delete"])){
        $task_id_getter = $_POST["task_id_getter"];
        $query_delete = "DELETE FROM tasks WHERE task_id = $task_id_getter";
        mysqli_query($conn, $query_delete);
        header ("Location: index.php");
    }
    if(isset($_POST["task_complete"])){
        $task_id = $_POST["task_complete"];
        $query_complete = "UPDATE tasks SET completion_date = NOW() WHERE task_id =$task_id ";
        mysqli_query($conn, $query_complete);
        header ("Location: index.php");
    }elseif(isset($_POST["task_id_getter"])){
        $task_id = $_POST["task_id_getter"];
        $query_not_complete = "UPDATE tasks SET completion_date = NULL WHERE task_id = $task_id";
        mysqli_query($conn, $query_not_complete);
        header ("Location: index.php");
        }
    ?>
