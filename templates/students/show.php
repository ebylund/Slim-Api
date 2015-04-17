<h2>show a student</h2>
<p>
	<strong>Name: </strong>	<br>
	<?= $student['name']?>
</p>
<p>
	<strong>Email: </strong>	<br>
	<?= $student['email']?>
</p>
<p>
	<strong>Birthdate: </strong>	<br>
	<?= $student['birthdate']?>
</p>
<p>
	<strong>Age: </strong>	<br>
	<?= $student['age']?>
</p>
<p>
	<a href="/slim_example/index.php/students/<?= $student['id']?>.json">Json</a>
</p>