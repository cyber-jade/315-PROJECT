    <?php
include 'db.php';  // Include the database connection

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";  // Query to get tasks ordered by creation time
$result = $conn->query($sql);  // Execute the query

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
  </head>
  <body>
    <h1>Task List</h1>

<?php 
while ($task = $result->fetch_assoc()): 
?>
    <div>
      <table><tr>Task Name
        <td><?php echo $task['taskname'];?> 
        </td>
<td><a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
      |
<a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a></td>
        
        </tr>
        </table>
    </div>
<?php endwhile; ?>

    

        <h2>
          <a href="add_task.php">Add Task</a>
        </h2>
    </div>
    
  </body>
</html>
