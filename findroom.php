<?php
include 'db/dbconnect.php';
include 'includes/header.php';
include 'includes/usernavigation.php';


 $query="
				SELECT dh.nrDhomes,dh.Notes,t.Cmimi,t.Lloji
				FROM dhoma dh
				JOIN tipidhomes t On t.TipiDhomesId=dh.TipiDhomesId
				WHERE Gjendje = 1
				";

 $result = mysqli_query($con, $query);
 
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      </head>
      <body>
           <br /><br />

           <div class="container" style="width:900px;">
                <h2 align="center">Kërkim Dhomash</h2>
                <h3 align="center">    Data</h3><br />
                <form class="form-inline">
                <div class="col-md-3">
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Nga Data" />
                </div>
                <div class="col-md-3">
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Tek Data" />
                </div>
                <div class="col-md-5">
                     <input type="button" name="filter" id="kerko" value="Kërko" class="btn btn-primary" />
                </div>
                <div style="clear:both"></div>
              </form>
                <br />
                <div id="dhoma_table">

                     <table class="table table-hover">
                          <tr>
                               <th width="30%">Numri</th>
                               <th width="30%">Kategoria</th>
                               <th width="40%">Cmimi (€)</th>
                          </tr>
                     <?php
                     while($row = mysqli_fetch_array($result))
                     {
                     ?>
                          <tr>
                               <td><?php echo $row["nrDhomes"]; ?></td>
                               <td><?php echo $row["Lloji"]; ?></td>
                               <td><?php echo $row["Cmimi"]; ?></td>
                          </tr>
                     <?php
                     }mysqli_close($con);
                     ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
 <script>
      $(document).ready(function(){
           $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
           });
           $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
           });
           $('#kerko').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"backend/search.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
                          success:function(data)
                          {
                               $('#dhoma_table').html(data);
                          }
                     });
                }
                else
                {
                     alert("Ju lutem zgjidhni datat!");
                }
           });
      });
 </script>
