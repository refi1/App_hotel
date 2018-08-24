<?php
include 'includes/header.php' ;
include('includes/adminnav.php');
include('db/dbconnect.php');
 if ($_SESSION['RoletId'] != 2 ) {
   header('Location: index.php');
   exit;
 }
?>
<html>

<body>
  <script>
  <?php
  $query="
  SELECT  DISTINCT count(*)
PerdoruesId
  From perdorues where RoletId=1
  AND Inaktiv=1
 				";
  $data = mysqli_query($con, $query);

    ?>

  var myData=[<?php
  while($info=mysqli_fetch_array($data))
      echo $info['PerdoruesId'].','; 
  ?>];

  <?php
  $query1="
  SELECT  DISTINCT count(*)
  PerdoruesId
  From perdorues where RoletId=1
  AND Inaktiv=0
        ";
  $data1 = mysqli_query($con, $query1);

    ?>

  var myData1=[<?php
  while($info1=mysqli_fetch_array($data1))
      echo $info1['PerdoruesId'].','; 
  ?>];


//shtova ketu
<?php
$dhomaLira="
SELECT  DISTINCT count(*)
DhomaId
From dhoma  where Gjendje=1
      ";
$telira = mysqli_query($con, $dhomaLira);

  ?>

var myDataDhoma=[<?php
while($info=mysqli_fetch_array($telira))
    echo $info['DhomaId'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];

<?php
$dhomazena="
SELECT  DISTINCT count(*)
DhomaId
From dhoma  where Gjendje=0
      ";
$tezena = mysqli_query($con, $dhomazena);

  ?>

var myDataDhomaZena=[<?php
while($info1=mysqli_fetch_array($tezena))
    echo $info1['DhomaId'].','; 
?>];


  window.onload=function(){
  zingchart.render({
      id:"chartDiv",
      width:"100%",
      height:400,
      data:{
      "type":"pie3d",
      "title":{
          "text":"Përdoruesit e Hotelit"
      },
      "scale-x":{
          "labels":"test"
      },
      "series":[
          {"values":myData,"text":"Usera Aktiv"},
          {"values":myData1,"text":"Usera Inkativ"}
  ]

  }
  });
  zingchart.render({
      id:"chartDivdhoma",
      width:"100%",
      height:400,
      data:{
      "type":"pie3d",
      "title":{
          "text":"Dhomat e Hotelit"
      },
      "scale-x":{
          "labels":"test"
      },
      "series":[
          {"values":myDataDhoma,"text":"Dhoma të lira"},

          {"values":myDataDhomaZena,"text":"Dhoma të zëna"}
  ]

  }
  });
  };

</script>

              <div align="center" style="position:relative;top:130px;">
              <div style="display:inline-block;width:500px;" id ='chartDiv'></div>
              <div style="display:inline-block;width:500px;" id ='chartDivdhoma'></div>
</div>


</body>
</html>
