<?php

// $app->get('/students', function() use ($app){
// 	$db = new DB();
// 	$students = $db->getStudents();
// 	$app->render('students/index.php', array (
// 		'students' => $students
// 	));
// });

// $app->get('/students/:id', function($id) use ($app){
// 	//load a student from db using given id
// 	//render a view with student data
// 	$db = new DB();
// 	$student = $db->getStudent($id);
// 	$app->render('student/show.php', array (
// 		'student' => $student
// 	));
// });
// 


?>
<table>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Birthdate</th>
		<th>Age</th>
		<th></th>
	</tr>
<?php foreach($students as $student): ?>
	<tr>
		<td><?= $student['name'] ?></td>
		<td><?= $student['email'] ?></td>
		<td><?= $student['birthdate'] ?></td>
		<td><?= $student['age'] ?></td>
		<td>
			<a href="/slim_example/index.php/students/<?= $student['id'] ?>">Show</a>
			<a href="/slim_example/index.php/students/<?= $student['id']?>.json">Json</a>

		</td>
	</tr>
<?php endforeach ?>

</table>
<a href="/slim_example/index.php/students/new">New Student</a>
<nbsp;><a href="/slim_example/index.php/students.json">Json</a>

<p>
	<!-- <a href="/slim_example/index.php"></a> -->
</p>