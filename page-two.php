<?php
include "conn.php";

    $storedDates = [];  

    $sql_query = "SELECT * FROM t_cal_storedate";
    $get_query = mysqli_query($conn, $sql_query);

    if ($get_query) {
        while ($row = mysqli_fetch_assoc($get_query)) {
            $storedDates[] = date("d-m-Y", strtotime($row['SELECTED_DATES']));  
        }
    }

 
    // echo '<pre>'; print_r($storedDates); exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <title> Datepicker Page || CORE PHP </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br><br><br><br><br>
                <input type="text" class="form-control" name="enter-name" id="enter-name" placeholder="Name">
                <br>
                <div class="input-group date datepicker">
                    <span class="input-group-addon"></span>
                    <input type="text" class="form-control" name="selected-date" id="selected-date" value=""
                        placeholder="Select Date">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
/* This datepicker features is that only database data show in datepicker other are disable. */

    $(document).ready(function () {
        var storedDates = <?php echo json_encode($storedDates); ?>;
        // console.log(storedDates);
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            startDate: "today",
            endDate: Infinity,
            beforeShowDay: function (date) {
                var formattedDate = moment(date).format('DD-MM-YYYY'); // moment CDN added 
                var isStoredDate = storedDates.includes(formattedDate);
                // console.log(isStoredDate);
                return {
                    enabled: isStoredDate
                };
            }
        });
    });
</script>

</html>
