<?php
include "conn.php";


if (isset($_POST['btn-submit'])) {
    $selectedDate = $_POST['selectedDates'];
    $selectedDate = json_decode($selectedDate, true);
    // echo'<pre>';print_r($selectedDate);exit;
 
    
    if (is_array($selectedDate)) {

        foreach ($selectedDate as $dateString) {

            // echo'<pre>';print_r($dateString);
            $sql_query = "INSERT INTO t_cal_storedate (SELECTED_DATES) VALUES ('$dateString')";
            $connecting = mysqli_query($conn,$sql_query);

        }
        // exit;
    }
    header("Location: index.php");exit();
}  
