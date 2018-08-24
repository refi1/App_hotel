<?php

 if(isset($_POST["from_date"], $_POST["to_date"]))
 {

   $firstdate = $_POST["from_date"];
   $seconddate = $_POST["to_date"];


      $con = mysqli_connect("localhost", "root", "", "hotelii");
      $output = '';
  
	  $query="
				SELECT dh.nrDhomes,dh.Notes,t.Cmimi,t.Lloji
				FROM dhoma dh
				JOIN tipidhomes t On t.TipiDhomesId=dh.TipiDhomesId
				WHERE Gjendje = 1
				AND dh.DhomaId
				NOT IN (SELECT DISTINCT DhomaId
				FROM rezervimi r
				WHERE (r.DateFillimi BETWEEN '".$firstdate."'  AND '".$seconddate."')
				 OR (r.DateMbarimi BETWEEN '".$firstdate."'  AND '".$seconddate."')
				 OR (r.DateFillimi<'".$firstdate."' AND r.DateMbarimi>'".$seconddate."'))";

      $result = mysqli_query($con, $query);

      $output .= '
           <table class="table table-hover">
                <tr>
                    <th width="30%">Numri</th>
                    <th width="30%">Kategoria</th>
                    <th width="40%">Cmimi (€)</th>
                </tr>
      ';
      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                     <tr>
                          <td>'. $row["nrDhomes"] .'</td>
                          <td>'. $row["Lloji"] .'</td>
                          <td>'. $row["Cmimi"] .'</td>
                     </tr>
                ';
           }
      }
      else
      {
           $output .= '
                <tr>
                     <td colspan="5">Asnje dhome nuk u gjet!</td>
                </tr>
           ';
      }
      $output .= '</table>';
      echo $output;
 }
 ?>
