<!DOCTYPE html>
<html>
<head>
<!--Script Reference[1]-->
<?php include('includes/header.php'); ?>
</head>
<body>
<!--Chart Placement[2]-->
<div id ='chartDiv'></div>
<script>
  var chartData={
    "type":"bar",  // Specify your chart type here.
    "series":[  // Insert your series data here.
        { "values": [35, 42, 67, 89]},
        { "values": [28, 40, 39, 36]}
    ]
  };
  zingchart.render({ // Render Method[3]
    id:'chartDiv',
    data:chartData,
    height:400,
    width:600
  });
</script>
</body>
</html>
