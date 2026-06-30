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
        while($row = mysqli_fetch_assoc($result)){
            echo"number: " . $row["task_id"] . "<br>" ;
            echo"task: " . $row["title"] . "<br>" ;
            echo"Created at: " . $row["creation_date"] . "<br>" ;
            echo"Description: " . $row["descr"] . "<br>" ;
            echo"Due date: " . $row["due_date"] . "<br>" ;
            echo"Completion date: " . $row["completion_date"] . "<br>" ;
            echo"---------------------------------" . "<br>" ;

        }
    }
?>