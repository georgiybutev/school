<?php
include('global.php');
datalink( );

if ( isset($_GET['id'] ) ) {
	
	$id = $_GET['id'];
}


# Get classes and courses
$class = mysql_query( "SELECT name, duration, description FROM class WHERE course_id = $id" );
$course = mysql_query( "SELECT * FROM course WHERE id = $id LIMIT 1" );

# Classes loop - begin
?>

<!-- Include eye-candy -->
<?php include('students.html'); ?>
<!-- end -->

<!-- Get the name of the courses -->
<h1 class="align-center">
	<?php $row = mysql_fetch_assoc( $course ); echo $row['name']; ?>
</h1>
<!-- end -->

<!-- Table listing all the classes a student is enrolled in -->
<table>
	<tr>
	
		<th>Name</th>
		<th>Duration</th>
		<th>Description</th>	
		
	</tr>
	
<?php while ( $row = mysql_fetch_assoc( $class ) ) { ?>

	<tr>

		<td class="align-right"><?php echo $row['name'] ?></td>
		<td><?php echo $row['duration'] ?></td>
		<td><?php echo $row['description'] ?></td>
	
	</tr>
	
<?php } ?>
</table>
<!-- end -->