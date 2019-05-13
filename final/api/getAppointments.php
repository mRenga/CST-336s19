<?php
    include 'connect.php';
    $conn = getDatabaseConnection("scheduler");
    
    $np = array();
    $np[':username'] = $_SESSION['username'];
    $sql = "SELECT * FROM appointments WHERE  date >= CURDATE()";
    
    $stmt= $conn->prepare($sql);
    $stmt->execute($np);
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>