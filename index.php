<?php
namespace MusicCd;

use MusicCd\Classes\CD;

include "classes/cd.php";

 
 
$verb = $_SERVER['REQUEST_METHOD'];

switch ($verb) {
	case 'GET':
		$id = null;
		
		if (isset($_GET['id'])) {
		
			if (filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
			    $id = $_GET['id'];	
			} else {
				http_response_code(400);
			    header("Content-Type: application/problem+json; charset=UTF-8");
				exit;
			}
 		}  
		 
		$cd = new CD();
		
		$cds = $cd->get($id);
		http_response_code(200); 
		header("Content-Type: application/json; charset=UTF-8");
		 
		echo   json_encode(['status' => 'OK', 'data' => $cds]);
		break;

	case 'POST':
		header("Access-Control-Allow-Origin: *");
		 
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		
		$data = json_decode(file_get_contents('php://input'), true);
		
		$cd = new CD();
		
		try {
			$response = $cd->create($data);
			http_response_code(201);
			echo   json_encode(['status' => 'OK', 'uri' => $response]);
			exit;
		} catch (\Exception $e) {
			http_response_code(400);
		    header("Content-Type: application/problem+json; charset=UTF-8");
		    echo   json_encode(['status' => 'Bad Request', 'uri' => $response]);
			exit; 
		}

		 
		break;

	case 'PUT':
		$cd = new CD();

		$data = json_decode(file_get_contents('php://input'), true);

		//check if data exists
		
		$data['id'] = intval($_GET['id']);
		if ($cd->isValid($data['id'])) {
			try {
				$response = $cd->update($data);
				http_response_code(200);
				echo   json_encode(['status' => 'OK', 'uri' => $response]);
				exit;	
			} catch (\Exception $e) {
				http_response_code(400);
			    header("Content-Type: application/problem+json; charset=UTF-8");
			    echo   json_encode(['status' => 'Bad Request', 'uri' => $response]);
				exit; 
			}
			

		}

		// id not found
		http_response_code(404);
	    header("Content-Type: application/problem+json; charset=UTF-8");
	    echo   json_encode(['status' => 'Bad Request', 'uri' => $id]);
		exit; 
		break;

	case 'DELETE':
		$cd = new CD();
		 
		//check if data exists
		$id = intval($_GET['id']);

		if ($cd->isValid($id)) {
			 
			try {
				$response = $cd->delete($id);
				var_dump($response);
				http_response_code(204);
				echo   json_encode(['status' => 'OK', 'data' => $response]);
				exit;	
			} catch (\Exception $e) {
				http_response_code(400);
			    header("Content-Type: application/problem+json; charset=UTF-8");
			    echo   json_encode(['status' => 'Bad Request', 'uri' => $response]);
				exit; 
			}
			

		}

		// id not found
		http_response_code(404);
	    header("Content-Type: application/problem+json; charset=UTF-8");
	    echo   json_encode(['status' => 'Bad Request', 'uri' => $id]);
		exit; 


		break;
	
	default:
		// Invalid Request Method
 		header("HTTP/1.0 405 Method Not Allowed");
		break;
}
