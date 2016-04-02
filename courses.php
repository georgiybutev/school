<?php
include('global.php');
datalink( );

# DELETE Course (subsequently connections from - student and class table)
if ( isset($_GET['delete'] ) ) {
	
	$id = $_GET['delete'];
	mysql_query( "DELETE FROM course WHERE id = $id" );
	mysql_query( "DELETE FROM student WHERE course_id = $course_id" );
	mysql_query( "DELETE FROM class WHERE course_id = $course_id" );
}

# Insert a course
if ( isset($_POST['newcourse'] ) ) {
	
	$newcourse = $_POST['newcourse'];
	$duration = $_POST['duration'];
	$description = $_POST['description'];
	mysql_query( "INSERT INTO course (name, duration, description) VALUES ('$newcourse', '$duration', '$description')" );
}

# Get classes
$courses = mysql_query( "SELECT id, name, duration, description FROM course" );

# Courses loop - begin
?>
<?php include('students.html'); ?>
<h1>Courses</h1>

<table>
	<tr>

		<th>Course</th>
		<th>Duration</th>
		<th>Description</th>	
		<th>Delete</th>
	
	</tr>

<?php while ( $row = mysql_fetch_assoc( $courses ) ) { ?>

	<tr>

		<td><a href="course.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
		<td><?php echo $row['duration'] ?></td>
		<td><?php echo $row['description'] ?></td>
		<td><a href="courses.php?delete=<?php echo $row['id'] ?>">delete</a></td>
	
	</tr>

<?php } ?>

</table>

<form method="post" action="courses.php">

<p><hr />

	<label for="newcourse">Insert name of course: </label>
		<input type="text" name="newcourse"><hr />
	<label for="duration">Duration (in months): </label> 
		<input type="int" name="duration"><hr />
	<label for="description">Description of course: </label>
		<textarea rows="10" cols="40" name="description"></textarea>
		
<input type="submit">
</form>
</p>
<hr />
</html>