<?php
    $mysqli = new mysqli("localhost", "root", "", "edvrns");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    //$authorityID = $_POST['get_option'];
    $authorityID = 10;
    $query = "SELECT Vards, Uzvards FROM persona INNER JOIN persona_iestade ON persona_iestade.persona_ID = persona.ID WHERE persona_iestade.iestade_ID =".$authorityID;
    $result = $mysqli->query($query);
    while ($row = $result->fetch_array()) {
        $rows[] = $row;
    }
    foreach ($rows as $row) {
        echo "<option>".$row['Vards']."</option>";
    }
    echo "STRĀDĀ";
    exit;
?>

