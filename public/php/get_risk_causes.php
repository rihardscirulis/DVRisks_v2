<?php
    $mysqli = new mysqli("localhost", "root", "", "edvrns");
    
    $factor_id = $_POST['factor_id'];

    $get_risk_causes_list = 
        "SELECT risk_causes.name AS name,
            risk_causes.id AS id
        FROM risk_causes
        WHERE risk_causes.factor_id =".$factor_id;
    $risk_cause_result = $mysqli->query($get_risk_causes_list);
    while ($risk_cause = mysqli_fetch_assoc($risk_cause_result)) {
        $risk_causes[] = $risk_cause;
    }

    echo json_encode(array(
        'risk_causes' => $risk_causes
    ));

    exit;
?>
