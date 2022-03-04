 <?php if(!empty($challans)) {?>
 <div class="card">

     <div class="card-body">



         <div class="table-responsive m-t-40">



             <h3 align="center" class="text-center">CHALLAN GARMENT-DISPATCHED</h3>

             <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                 cellpadding="4" align="center" border="1" width="80%">


                 <thead>
                     <tr>
                         <th colspan="8">Date: <?php echo date("d-m-Y");?></th>
                     </tr>
                     <tr>

                         <th>Store Name</th>
                         <th>Order No.</th>
                         <th>Cloth Count</th>
                         <th>Hanger</th>
                         <th>Fold</th>
                         <th>Due On</th>
                         <th>Comments <br>(Dispatch)</th>
                         <th>Comments<br>
                             <(Store) </th>
                                 <!-- <th>Dispatch Date</th>
                                    <th>Dispatch Shift</th>
                                     -->

                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     $total=0;
                     $th=0;
                     $tf=0;
                     foreach($challans as $challan){
/*
	                                if($challan['total_garment']!=$challan['psc'])
	                                continue;
*/
	                                
	                                 ?>
                     <tr>

                         <td><?php echo $challan['Store_Name']; ?></td>
                         <td><?php echo $challan['Order_No']; ?></td>
                         <td><?php echo $challan['total_garment']; $total+=$challan['total_garment']; ?>
                         <td><?php echo $challan['total_hanger']; $th+= $challan['total_hanger'];?>
                         <td><?php echo $challan['total_fold']; $tf+=$challan['total_fold'];?>
                         </td>



                         <td><?php echo date("d-m-Y", strtotime($challan['Due_on'])); ?>
                         </td>
                         <!-- <td> <?php echo date("d-m-Y", strtotime($challan['dispatch_time'])); ?>
                                    </td>
                                    <td>
	                                    
	                                    <?php 
											$hr_no=date("H", strtotime($challan['dispatch_time']));
											
											if($hr_no <=13)
											echo "Shift 1";
											else
											echo "Shift 2";
		                                    
	                                    ?>
	                                    
                                    </td> -->
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                     </tr>
                     <?php } ?>
                     <tr>
                         <td colspan="2"><strong>Total</strong></td>
                         <td><strong><?php echo $total;?></strong></td>
                         <td><strong><?php echo $th;?></strong></td>
                         <td><strong><?php echo $tf;?></strong></td>
                         <td colspan="3"></td>

                     </tr>
                 </tbody>
             </table>


         </div>
     </div>
 </div>
 <?php }?>