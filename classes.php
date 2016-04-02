<?php
include('global.php');
datalink( );

# DELETE Class (subsequently connections from - students_class and assignment table)
if ( isset($_GET['delete'] ) ) {
	
	$id = $_GET['delete'];
	mysql_query( "DELETE FROM class WHERE id = $id" );
	mysql_query( "DELETE FROM student_class WHERE class_id = $class_id" );
	mysql_query( "DELETE FROM assignment WHERE class_id = $class_id" );
	
}

# Insert a class
if ( isset($_POST['newclass'] ) ) {
	
	$newclass = $_POST['newclass'];
	$courseid = $_POST['course'];
	$duration = $_POST['duration'];
	$description = $_POST['description'];
	mysql_query( "INSERT INTO class (name, course_id, duration, description) VALUES ('$newclass', '$courseid', '$duration', '$description')" );
}

# Get classes
$classes = mysql_query( "SELECT class.id AS cid, class.name AS class, course.name AS course, class.duration AS cduration, class.description AS cdescription FROM class, course WHERE class.course_id = course.id"  );
$courses = mysql_query( "SELECT * FROM course" );

# Classes loop - begin
?>
<?php include('students.html'); ?>
<h1>Classes</h1>

<table>

	<tr>

		<th>Class</th>
		<th>Course</th>
		<th>Duration</th>
		<th>Description</th>	
		<th>Delete</th>
		<th>Assignments</th>
		
	</tr>
	
<?php while ( $row = mysql_fetch_assoc( $classes ) ) { ?>

	<tr>
	
		<td class="align-right"><?php echo $row['class'] ?></td>
		<td><a href="courses.php"><?php echo $row['course'] ?></td>
		<td><?php echo $row['cduration'] ?></td>
		<td><?php echo $row['cdescription'] ?></td>
		<td><a href="classes.php?delete=<?php echo $row['cid'] ?>">delete</a></td>
		<td><a href="assignments.php?id=<?php echo $row['cid'] ?>">show</a></td>
		
	</tr>
	
<?php } ?>

</table>

<form method="post" action="classes.php">

<p><hr />
	<label for="newclass">Insert name of a class: </label>
		<input type="text" name="newclass"><hr />
	<label for="duration">Duration (in months): </label> 
		<input type="int" name="duration"><hr />
	<label for="description">Description of a class: </label>
		<textarea rows="10" cols="40" name="description"></textarea>

<select name="course">
	<?php while ( $row = mysql_fetch_assoc( $courses ) ) { ?>
	<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
	<?php } ?>
</select>

<input type="submit">
</form>
</p>
<hr />
</html>