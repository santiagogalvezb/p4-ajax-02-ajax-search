<?php
require('db.php');
$filter = addslashes($_GET['filter']);
$sql          = "SELECT * FROM dj_data WHERE Artistic_Name LIKE '%".$filter."%'";
$result       = $conn->query($sql);
$json_to_send = array();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $json_to_send[] = $row;
    }
    sleep(5);
    echo json_encode($json_to_send);
} else {
    echo "0 results";
}
$conn->close();

?>