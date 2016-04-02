<?php
include('global.php');
datalink( );

# DELETE Student
if ( isset($_GET['delete'] ) ) {
	
	$id = $_GET['delete'];
	mysql_query( "DELETE FROM student WHERE id = $id" );
	mysql_query( "DELETE FROM student_class WHERE student_id = $student_id" );
	mysql_query( "DELETE FROM student_assignment_result WHERE student_id = $student_id" );
}

# Insert a student
if ( isset($_POST['newstudent'] ) ) {
	
	$newstudent = $_POST['newstudent'];
	$courseid = $_POST['course'];
	mysql_query( "INSERT INTO student (name, course_id) VALUES ('$newstudent', '$courseid')" );
}

# Get students
$students = mysql_query( "SELECT student.id AS sid, student.name AS student, course.name AS course FROM student, course WHERE student.course_id = course.id ORDER BY student.id"  );
$courses = mysql_query( "SELECT * FROM course" );

# Student's loop - begin
?>
<?php include('students.html'); ?>

<body>
<a href="/college/students.php" name="students" id="students"><img src="/college/images/students.png" alt="Students" /></a>

<!-- Table -->
<table>
<tr>
	<th>Name</th>
	<th>Course</th>	
	<th>Delete</th>
</tr>
<?php
while ( $row = mysql_fetch_assoc( $students ) ) {

?>
<tr>
	<td class="align-right"><a href="student.php?id=<?php echo $row['sid'] ?>"><?php echo $row['student'] ?></a></td>
	<td><?php echo $row['course'] ?></td>
	<td><a href="students.php?delete=<?php echo $row['sid'] ?>">delete</a></td>
</tr>
<?php
}
?>
</table>
<!-- end -->

<!-- Separate the table and add function -->
<p></p>
<!-- end -->

<!-- Add student to a course -->
Add student to a course: 
<p>
<form method="post" action="students.php">
<input type="text" name="newstudent">

<select name="course">
<?php
while ( $row = mysql_fetch_assoc( $courses ) ) {
?>
<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
<?php
}
?>
</select>

<input type="submit">
</form>
</p>
</p>
<!-- end -->

</body>
</html>