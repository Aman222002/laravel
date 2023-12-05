<?php

include_once "db.php";


if (isset($_POST['search'])) {

    $Name = $_POST['search'];

    $Query = "SELECT name FROM user WHERE name LIKE '%$Name%' LIMIT 5";
    $result =  MySQLi_query($con, $Query);

    if ($result) {
        if ($result->num_rows) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode(['data' => $data]);
            exit();
        } else {
            echo json_encode(['data' => []]);
            exit();
        }
    } else {
        echo $Query;
        die(mysqli_error($con));
    }
}
if (isset($_POST['download'])) {
    $target_file = "images/B.jpg"; 

    if (file_exists($target_file)) {
            header("Content-Type: image/jpeg");
            header('Content-Disposition: attachment; filename="download_image.jpg"');
            header('Content-Length: ' . filesize($target_file));
            readfile($target_file);
       
    }
}
if (!empty($_FILES['file']['name'])) {
   
    $filename = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    $target_dir = "images/";
    
    $response = [ ];
    
    if (move_uploaded_file($tempname,  $target_dir.$filename)) {
        $response['status'] = 'success';
        $response['message'] = 'File uploaded successfully: ' .  $target_dir . $filename;
        $response['imageurl'] = $target_dir . $filename; 
       
        header('Content-Type: application/json');
        echo json_encode($response); 
        exit();
    }  
    else {
        
        $response['status'] = 'error';
        $response['message'] = 'Failed to upload file.';
        header('Content-Type: application/json');
        echo json_encode($response); 
        exit();
    }
} 
 




