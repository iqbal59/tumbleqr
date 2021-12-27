 <?php
 
$total=count($spottoqc);
$total_ok=0;
 foreach($spottoqc as $challan){
    if($challan['diff_in_hr'])
    $total_ok+=1;
}
?>

 <div class="card">

     <div class="card-body">

         <h3 align="center">Report : QC TO Re-Spotting SCAN </h3>

         <div class="table-responsive m-t-40">




             <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                 cellpadding="4" align="center" border="1" width="80%">
                 <thead>
                     <tr>

                         <th>Start Date</th>
                         <th>Start Time</th>
                         <th>End Date</th>
                         <th>End Time</th>
                         <th>Count</th>
                         <th>OK</th>
                         <th>NOK</th>

                         <th>OK (%)</th>
                         <th>NOK (%)</th>


                     </tr>
                 </thead>
                 <tbody>

                     <tr>

                         <td><?php echo date('d-m-Y', strtotime($start_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($start_date)); ?></td>
                         <td><?php echo date('d-m-Y', strtotime($end_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($end_date)); ?></td>
                         <td><?php echo $total; ?></td>
                         <td><?php echo $total_ok ?></td>
                         <td><?php echo ($total-$total_ok); ?></td>
                         <td><?php echo round(($total_ok/$total)*100,2); ?></td>
                         <td><?php echo round((($total-$total_ok)/$total)*100,2);?>
                         </td>

                     </tr>

                 </tbody>
             </table>


         </div>
     </div>
 </div>