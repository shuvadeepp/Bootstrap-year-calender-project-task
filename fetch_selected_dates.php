<?php
include "conn.php";

$selectedDates = array();

$sql_query = "SELECT  DATE_FORMAT(SELECTED_DATES, '%Y-%c-%e') AS SELECTED_DATE FROM t_cal_storedate";
$connecting = mysqli_query($conn, $sql_query);

if (mysqli_num_rows($connecting) > 0) {
  while ($row = mysqli_fetch_assoc($connecting)) {
    $selectedDates[] = $row["SELECTED_DATE"];
  } 
}
// echo'<pre>';print_r($selectedDates);exit;  
// echo json_encode($selectedDates);
