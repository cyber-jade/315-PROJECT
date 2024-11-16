<?php
include 'db.php';

// Check if ID is provided
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Select task query
  $sql = "SELECT * FROM tasks WHERE id = '$id'";
  $result = $conn->query($sql);

  // Check if task exists
  if ($result->num_rows > 0) {
    $task = $result->fetch_assoc();
  } else {
    echo "Task not found";
    exit;
  }
}

// Update task
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $task_name = $_POST['task_name'];
  $sql = "UPDATE tasks SET taskname = '$task_name' WHERE id = '$id'";

  // Execute query
  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
  } else {
    echo "Error updating task: " . $conn->error;
  }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
body {
  background-color: blue;
  padding: 1%;
  height: 100%;
}
h2 {
  color: lime;
}
div{
  background-color: black;
  padding: 10px;
  color: lime;
  border-radius: 10px;
  margin-top: 10px;
  text-align: center;
}
.updt {
    background-color: transparent;
    color: lime;
    padding: 5px;
    border: 2px solid lime;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.updt:hover {
    background-color: lime;
    color: black; 
}

input {
  font-size: 20px;
  background-color: transparent;
  color: lime;
  border-radius: 5px;
}
.cancel {
  margin-left: 175px;
  background-color: transparent;
    color: lime;
    padding: 5px;
    border: 2px solid lime;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    transition: background-color 0.3s ease, color 0.3s ease;
}
.cancel:hover {
  background-color: lime;
    color: black; 
}
a{
  text-decoration: none;
  color: inherit;
}

</style>
  </head>
  <body>
    <div>
<h2>Edit Task</h2>
<form method="POST">
  <input type="text" size="10"name="task_name" value="<?php echo $task['taskname']; ?>" required>
  <button class="updt" type="submit">Update Task</button>
  <br>
  <button class="cancel"type="submit"><a href="index.php">Cancel</a></button>
</form>
</div>
</body>
</html>