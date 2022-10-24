<?php
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

	header("Content-Type: application/json");

	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Slim\Factory\AppFactory;
	use ReallySimpleJWT\Token;

	require __DIR__ . "/../vendor/autoload.php";
	require "model/student.php";
	require_once "config/config.php";

	$app = AppFactory::create();

	$app->get("/", function (Request $request, Response $response, $args) {
		echo "Hello, world!";
		return $response;
	});

	$app->post("/Authenticate", function (Request $request, Response $response, $args) {
		global $api_username;
		global $api_password;
        //Read request body input string.
		$request_body_string = file_get_contents("php://input");

		//Parse the JSON string.
		$request_data = json_decode($request_body_string, true);

		$username = $request_data["username"];
		$password = $request_data["password"];

		if ($username != $api_username || $password != $api_password) {
			$error = array("message" => "Invalid credentials.");
			echo json_encode($error);

			http_response_code(401);
			die();
		}

		$token = Token::create($username, $password, time() + 3600, "localhost");

		setcookie("token", $token);

		echo "true";

		return $response;
	});

	$app->post("/Student", function (Request $request, Response $response, $args) {
		//Check the client's authentication.
		require "controller/require_authentication.php";

		//Read request body input string.
		$request_body_string = file_get_contents("php://input");

		//Parse the JSON string.
		$request_data = json_decode($request_body_string, true);

		//Check if all values are provided.
		if (!isset($request_data["name"]) || empty($request_data["name"])) {
			$error = array("message" => "Please provide a name.");
			echo json_encode($error);

			http_response_code(400);
			die();
		}
		if (!isset($request_data["age"]) || !is_numeric($request_data["age"])) {
			$error = array("message" => "Please provide an integer number for the age.");
			echo json_encode($error);

			http_response_code(400);
			die();
		}

		$name = $request_data["name"];
		$age = $request_data["age"];

		//Limit the length of the name.
		if (strlen($name) > 250) {
			$error = array("message" => "The name is too long. Please enter less than or equal to 250 characters.");
			echo json_encode($error);

			http_response_code(400);
			die();
		}

		//Limit the range of the age.
		if ($age < 0 || $age > 200) {
			$error = array("message" => "The age must be between 0 and 200 years.");
			echo json_encode($error);

			http_response_code(400);
			die();
		}

		//Make sure the age is an integer.
		if (is_float($age)) {
			$error = array("message" => "The age must not have decimals.");
			echo json_encode($error);

			http_response_code(400);
			die();
		}

		create_new_student($name, $age);

		return $response;
	});

	$app->get("/Student/{student_id}", function (Request $request, Response $response, $args) {
		//Check the client's authentication.
		require "controller/require_authentication.php";

		$student_id = $args["student_id"];

		//Get the entity.
		$student = get_student($student_id);

		if ($student) {
			echo json_encode($student);
		}

		return $response;
	});

	$app->run();
?>