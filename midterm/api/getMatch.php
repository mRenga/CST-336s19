<?php
    
    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("cinder");
    
    $sql = "SELECT picture_url, username, about_me FROM user, match WHERE match.user_id != id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
    
?>