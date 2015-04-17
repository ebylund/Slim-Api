<?php
require 'vendor/autoload.php';
require 'includes/DB.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

function renderJSON($status_code, $response){
	$app = \Slim\Slim::getInstance();
	$app->response->headers->set('Content-Type', 'application/json');
	$app->response->setStatus($status_code);
	echo json_encode($response);
}

$app = new \Slim\Slim();

$app->get('/hello/:name', function ($name) use ($app) {
  $app->render('hello.php', array(
    'name' => $name 
  ));
});

$app->get('/students/new', function () use ($app) { 
	$app->render('students/new.php');
});

///////////////////
//create student //
///////////////////

$app->post('/students', function () use ($app) {
	$student = $app->request->post();
	$db = new DB();
	$db->createStudent($student);
	// echo "Created!";
	// print_r($student);
	renderJSON(201, $student);
});

/////////////////
// new student //
/////////////////

$app->post('/students/new', function() use ($app){
	$student = $app->request->post();
	$db = new DB();
	$db->createStudent($student);
	renderJSON(201, $student);
});

////////////////////
// students index //
////////////////////

$app->get('/students/', function() use ($app){
	$db = new DB();
	$students = $db->getStudents();
	$app->render('students/index.php', array (
		'students' => $students
	));
});

/////////////////////////
// students index json //
/////////////////////////

$app->get('/students.json', function() use ($app){
	$db = new DB();
	$students = $db->getStudents();
	// echo "Created!";
	// print_r($students);
	renderJSON(200, $students);
});

/////////////////
//student show //
/////////////////

$app->get('/students/:id', function($id) use ($app){
	//load a student from db using given id
	//render a view with student data
	$db = new DB();
	$student = $db->getStudent($id);
	$app->render('students/show.php', array (
		'student' => $student
	));
})->conditions(array('id' => '\d+'));

//////////////////////
//student show json //
//////////////////////

$app->get('/students/:id.json', function($id) use ($app){
	//load a student from db using given id
	//render a view with student data
	$db = new DB();
	$student = $db->getStudent($id);
	renderJSON(200, $student);
})->conditions(array('id' => '\d+'));

$app->run();

?>