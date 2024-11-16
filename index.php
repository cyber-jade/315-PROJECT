    <?php
include 'db.php';  // Include the database connection

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";  // Query to get tasks ordered by creation time
$result = $conn->query($sql);  // Execute the query
if (isset($_GET['task_added']) && $_GET['task_added'] == 'true') {
    echo "<script>alert('Task added successfully!');</script>";
}
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
}
h1   {
  color: lime;
  text-align: center ;
}
h2 {
  color: lime;
}
.d1 {
  background-color: black;
  border-radius: 10px;
  padding: 15px;
  
}  
.adt{
  background-color: black;
  padding: 10px;
  color: lime;
  border-radius: 10px;
  margin-top: 10px;
  text-align: center;
}
button {
    background-color: transparent;
    color: lime;
    padding: 5px;
    border: 2px solid lime;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

button:hover {
    background-color: lime;
    color: black; 
}

input {
  font-size: 20px;
  background-color: transparent;
  color: lime;
  border-radius: 5px;
  
}
table{
  border: solid 5px yellow;
  color: lime;
  text-align: center;
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border-spacing: 5px;
}
tr {
  color: lime;
}
td{
  color: lime;
  border: solid 5px lime;
  padding: 5px;
  border-radius: 10px;
}
th {
  text-align: center;
}
.del {
  color: red;
}
.edit {
  color: blue ;
}
</style>
  </head>
  <body>
    <div class="d1">
    <h1>Task List</h1>
      <table>
        <tr><th>Task Name</th></tr>
<?php if ($result->num_rows > 0): ?>
<?php 
while ($task = $result->fetch_assoc()): 
?>
        <tr><td><?php echo $task['taskname'];?> 
        </td>
<td><a class="edit" href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a></td>
      
<td><a class="del" href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a></td>
        
        </tr>
        
<?php endwhile; ?>
 <?php else: ?>
          <tr><td colspan="3">No tasks</td></tr>
        <?php endif; ?>
</table>
</div>
<div class="adt">
   <h2>
      Add Task
    </h2>
  
      <form method="POST" action="add_task.php" >
          
      <input type="text" size="10" name="task-name" required placeholder="Enter Task"/>
      <button type="submit" name="subadd">
        Add Task
      </button>
    </form>
</div>
  </body>
</html>
