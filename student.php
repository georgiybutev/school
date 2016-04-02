<?php
include('global.php');
datalink( );

# Get id
if ( isset($_GET['id'] ) ) {
	
	$id = $_GET['id'];
	
} else {
	
	echo "Must have a student id";
	exit;
}

# Unenroll student
if ( isset($_GET['unenroll'] ) ) {
	
	$unenroll = $_GET['unenroll'];
	mysql_query ("DELETE FROM student_class WHERE id = $unenroll");
}

# Add new class
if ( isset($_GET['newclass'] ) ) {
	
	
	if(!mysql_num_rows(mysql_query ("SELECT * FROM student_class WHERE student_id = $id AND class_id = $newclass"))) {
		$newclass = $_GET['newclass'];
		mysql_query ("INSERT INTO student_class (student_id, class_id) VALUES ('$id', '$newclass')");
	}
	
}

# Get students
$students = mysql_query ("SELECT name, avatar FROM student WHERE student.id = $id");
$classes = mysql_query ("SELECT student_class.id AS scid, class.name AS class, class.id AS cid FROM student_class, class WHERE student_class.class_id = class.id AND student_class.student_id = $id");
$available_classes = mysql_query ("SELECT * FROM class");
?>

<!-- Include eye-candy -->
<?php include('students.html'); ?>
<!-- end -->

<!-- Get the name of the student -->
<h1>
<?php 
$row = mysql_fetch_assoc( $students );
echo $row['name'];
?>
</h1>
<!-- avatar -->
<!-- end -->

<!-- Table listing all the classes a student is enrolled in -->
<table>
<tr>
	<th>Classes</th>
	<th>Unenroll</th>
</tr>
<?php while ( $row = mysql_fetch_assoc( $classes ) ) { ?>
<tr>
	<td class="align-right"><a href="assignments.php?id=<?php echo $row['cid'] ?>"><?php echo $row['class'] ?></a></td>
	<td><a href="student.php?id=<?php echo $id ?>&unenroll=<?php echo $row['scid'] ?>">Unenroll</a></td>
</tr>
<?php } ?>
</table>
<!-- end -->

<!-- Enroll and Unenrol From -->
<p>
<form action="student.php" method="get">
<select name="newclass">
<?php while ( $row = mysql_fetch_assoc( $available_classes ) ) { ?>
	<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
<?php } ?>	
</select>
<input type="hidden" name="id" value="<?php echo $id ?>" />
<input type="submit" />
</form>
</p>


</body>
</html>