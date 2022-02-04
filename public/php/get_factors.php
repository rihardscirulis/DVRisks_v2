<?php
    $mysqli = new mysqli("localhost", "root", "", "edvrns");
    
    $factor_group_id = $_POST['factor_group'];
    $get_factors_list = 
        "SELECT factors.name AS name, 
            factors.id AS id 
        FROM factors  
        WHERE factors.factor_group_id =".$factor_group_id;
    $factors_result = $mysqli->query($get_factors_list);
    while ($factor = mysqli_fetch_assoc($factors_result)) {
        $factors[] = $factor;
    }

    echo json_encode(array(
        'factors' => $factors,
    ));

    exit;
?>
