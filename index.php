
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
  </head>
  <body>
    <div>
      <h1>
      Git Project
    </h1>
    <h1>
    Tasks
    </h1>
    <?php
    include 'db.php';
    
    $sql = "SELECT * FROM tasks" ;
    $result = $conn->query($sql);
    if($result -> num_rows > 0){
    echo "<table>";
    echo "<tr><th>ID</th> 
        <th>Task Name</th></tr>";
        
    while($row = $result -> fetch_assoc()){
    echo "<tr><td>"; . $row["id"] . "</td><td>" . $row["taskname"] . "</td></tr>";
        }
        echo "</table>";
    }else {
    echo "0 results";
    }
    ?>
        <h2>
          <a href="add_task.php">Add Task</a>
        </h2>
    </div>
    
  </body>
</html>
