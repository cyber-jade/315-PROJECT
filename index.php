    <?php
include 'db.php';  // Include the database connection

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";  // Query to get tasks ordered by creation time
$result = $conn->query($sql);  // Execute the query
?>
    <h2>To-Do List</h2>

<?php while ($task = $result->fetch_assoc()): ?>
    <div>
        <p><?php echo $task['taskname']; ?></p>   <!-- Display task name -->
        <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>  <!-- Edit link -->
        <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a> <!-- Delete link -->
    </div>
<?php endwhile; ?>

    

        <h2>
          <a href="add_task.php">Add Task</a>
        </h2>
    </div>
    
  </body>
</html>
