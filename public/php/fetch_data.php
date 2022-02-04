<?php
    $mysqli = new mysqli("localhost", "root", "", "edvrns");
    
    $authority_id = $_POST['authority'];
    $get_personnel_list = 
        "SELECT personnels.name AS name, 
            personnels.surname AS surname, 
            personnels.id AS id 
        FROM personnels  
        WHERE personnels.authority_id =".$authority_id;
    $personnel_result = $mysqli->query($get_personnel_list);
    while ($personnel = mysqli_fetch_assoc($personnel_result)) {
        $personnels[] = $personnel;
    }

    $get_environment_list = 
    "SELECT environments.name AS environment_name, 
        environments.id AS environment_id
        FROM environments
        WHERE environments.authority_id =".$authority_id;
    $environment_result = $mysqli->query($get_environment_list);
    while ($environment = mysqli_fetch_assoc($environment_result)) {
        $environments[] = $environment;
    }
    
    echo json_encode(array(
        'personnels' => $personnels, 
        'environments' => $environments
    ));
    exit;
?>
