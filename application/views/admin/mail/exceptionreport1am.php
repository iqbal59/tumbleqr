 <?php if(!empty($challans)) {?>
 <div class="card">

     <div class="card-body">

         <h3 align="center">Report 1AM: INCOMING TO SPOTTING </h3>

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
                     <?php foreach($challans as $challan){
/*
	                                if($challan['total_garment']!=$challan['psc'])
	                                continue;
*/
	                                
	                                 ?>
                     <tr>

                         <td><?php echo date('d-m-Y', strtotime($start_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($start_date)); ?></td>
                         <td><?php echo date('d-m-Y', strtotime($end_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($end_date)); ?></td>
                         <td><?php echo $challan['total_incoming']; ?></td>
                         <td><?php echo $challan['total_spot']; ?></td>
                         <td><?php echo $challan['total_incoming']-$challan['total_spot']; ?></td>

                         <td><?php echo ($challan['total_spot']/$challan['total_incoming'])*100; ?></td>
                         <td><?php echo (($challan['total_incoming']-$challan['total_spot'])/$challan['total_incoming'])*100;?>
                         </td>

                     </tr>
                     <?php } ?>
                 </tbody>
             </table>


         </div>
     </div>
 </div>
 <?php }?>



 <?php if(!empty($spottoqc)) {?>
 <div class="card">

     <div class="card-body">

         <h3 align="center">Report 1AM: SPOTTING TO QC SCAN </h3>

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
                     <?php foreach($spottoqc as $challan){
/*
	                                if($challan['total_garment']!=$challan['psc'])
	                                continue;
*/
	                                
	                                 ?>
                     <tr>

                         <td><?php echo date('d-m-Y', strtotime($start_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($start_date)); ?></td>
                         <td><?php echo date('d-m-Y', strtotime($end_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($end_date)); ?></td>
                         <td><?php echo $challan['total_spot']; ?></td>
                         <td><?php echo $challan['total_qc']; ?></td>
                         <td><?php echo $challan['total_spot']-$challan['total_qc']; ?></td>

                         <td><?php echo ($challan['total_qc']/$challan['total_spot'])*100; ?></td>
                         <td><?php echo (($challan['total_spot']-$challan['total_qc'])/$challan['total_spot'])*100;?>
                         </td>

                     </tr>
                     <?php } ?>
                 </tbody>
             </table>


         </div>
     </div>
 </div>
 <?php }?>


 <?php if(!empty($qctopack)) {?>
 <div class="card">

     <div class="card-body">

         <h3 align="center">Report 1AM: QC TO PACK </h3>

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
                     <?php foreach($qctopack as $challan){
/*
	                                if($challan['total_garment']!=$challan['psc'])
	                                continue;
*/
	                                
	                                 ?>
                     <tr>

                         <td><?php echo date('d-m-Y', strtotime($start_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($start_date)); ?></td>
                         <td><?php echo date('d-m-Y', strtotime($end_date)); ?></td>
                         <td><?php echo date('H:i:s', strtotime($end_date)); ?></td>
                         <td><?php echo $challan['total_qc']; ?></td>
                         <td><?php echo $challan['total_pack']; ?></td>
                         <td><?php echo $challan['total_qc']-$challan['total_pack']; ?></td>

                         <td><?php echo ($challan['total_pack']/$challan['total_qc'])*100; ?></td>
                         <td><?php echo (($challan['total_qc']-$challan['total_pack'])/$challan['total_qc'])*100;?>
                         </td>

                     </tr>
                     <?php } ?>
                 </tbody>
             </table>


         </div>
     </div>
 </div>
 <?php }?>