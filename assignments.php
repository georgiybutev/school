<?php
include('global.php');
datalink( );

# Get id
if ( isset($_GET['id'] ) ) {
	
	$id = $_GET['id'];
	
} else {
	
	header("Location:/college/classes.php");
	exit;
}

# Delete assignment
if ( isset($_GET['delete'] ) ) {
	
	$delete = $_GET['delete'];
	mysql_query ("DELETE FROM assignment WHERE id = $delete");
}

# Add assignmentDATE: Auto CURDATE()
if ( isset($_GET['newassignment'] ) ) {
	
	$newassignment = $_GET['newassignment'];
	mysql_query ("INSERT INTO assignment (name, class_id) VALUES ('$newassignment', $id)");

}

# Get assignments
$classes = mysql_query (" SELECT name FROM class WHERE class.id = $id ");
$assignments = mysql_query ("SELECT * FROM assignment WHERE class_id = $id");

?>

<!-- Include eye-candy -->
<?php include('students.html'); ?>
<!-- end -->

<!-- Get the name of the assignments -->
<h1>

	<?php $row = mysql_fetch_assoc( $classes ); echo $row['name']; ?>
	
</h1>
<!-- end -->

<!-- Table listing all the classes a student is enrolled in -->
<table>

	<tr>
	
		<th>Assignments</th>
		<th>Date</th>
		<th>Delete</th>
		<th>Results</th>
		
	</tr>
	
<?php while ( $row = mysql_fetch_assoc( $assignments ) ) { ?>
	<tr>
	
		<td class="align-right"><?php echo $row['name'] ?></a></td>
		<td class="align-right"><?php echo $row['date'] ?></a></td>
		<td><a href="assignments.php?id=<?php echo $id ?>&delete=<?php echo $row['id'] ?>">delete</a></td>
		<td><a href="results.php?id=<?php echo $row['id'] ?>">show</a></td>
		
	</tr>
	
<?php } ?>

</table>
<!-- end -->

<!-- Enroll and Unenrol From -->
<p>
	<form action="assignments.php" method="get">
	
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<input type="text" name="newassignment">
		<input type="submit">
		
	</form>
</p>
<!-- end -->

</body>
</html>