<?php

    
    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    
    switch($httpMethod) {
      case 'POST':
        include 'connect.php';
        $conn = getDatabaseConnection("scheduler");
        $date = $_POST['date'];
        $start_time = $_POST['start_time'];
        $duration = $_POST['duration'];
        
        $sql = "INSERT INTO `appointments`(`date`, `start_time`, `duration`, `booked_by`) VALUES ('$date', '$start_time', '$duration', 'Nobody')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        http_response_code(200);
    
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");
    
        echo(json_encode(array()));
        break;
      
     case 'PUT':
        http_response_code(401);
        echo "Not Supported";
        break;
      
    case 'DELETE':
        http_response_code(401);
        echo "Not Supported";
        break;
    }
?>