<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Calendar Project || CORE PHP </title>
  <link rel="stylesheet" href="bootstrap-year-calendar.min.css">
  <style type="text/css">
    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .activeDay {
      background-color: #17a2b8;
      color: #fff;
    }

    .bookDay {
      background-color: #28a745;
      color: #198720;
    }

    .bootstrap-timepicker-widget {
      z-index: 9999;
    }
  </style>
</head>
<?php include "fetch_selected_dates.php"; //echo'<pre>';print_r($selectedDates);exit; ?>
<body>
  <div id="calendar-div"></div>
  <form method="post" action="process.php">
    <input type="text" id="selectedDates" name="selectedDates">
    <button name="btn-submit" id="btn-submit">Submit</button>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="bootstrap-year-calendar.js"></script>
  <script>
    $(document).ready(function() {

      var serverArray = <?php echo json_encode($selectedDates); ?>;
      // console.log(serverArray);
      $('#calendar-div').calendar({
        
        customDayRenderer: function(element, date) {
          var findDate  = (date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()).toString();
          // console.log($.inArray(findDate,serverArray)+">="+0);
          if($.inArray(findDate,serverArray)>=0) {   
            $(element).closest('td').addClass('activeDay');
            $(element).closest('td').attr('data-date', date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate());
          }
        },

        clickDay: function(e) {
          $(e.element[0]).toggleClass('activeDay');

          var dateString = e.date.getFullYear() + '-' + (e.date.getMonth() + 1) + '-' + e.date.getDate();

          if ($(e.element[0]).hasClass('activeDay')) {
            $(e.element[0]).attr('data-date', e.date.getFullYear() + '-' + (e.date.getMonth() + 1) + '-' + e.date.getDate());

            selectedDates[dateString] = true;   

          } else {
            $(e.element[0]).removeAttr('data-date');

            delete selectedDates[dateString];

          }

          $('#selectedDates').val(JSON.stringify(Object.keys(selectedDates))); 
          
        },
        minDate: new Date()
      });  
    });
  </script>
</body>

</html>