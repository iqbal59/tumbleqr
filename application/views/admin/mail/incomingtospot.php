 <?php if(!empty($challans)) {?>
            <div class="card">

                <div class="card-body">

<h3 align="center">Report 4PM: INCOMING TO SPOTTING </h3>

                    <div class="table-responsive m-t-40">




                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" cellpadding="4" align="center" border="1"  width="80%">
                            <thead>
                                <tr>

                                    <th>Start Date</th>
                                    <th>Start Time</th>
                                    <th>End Date</th>
                                    <th>End Time</th>
                                    <th>Count</th>
                                    <th>OK</th>
                                    <th>NOK</th>
                                    <th>NOK-Done</th>
                                    <th>NOK-Pending</th>
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
                                    <td><?php echo date('h:i:s', strtotime($start_date)); ?></td>
                                     <td><?php echo date('d-m-Y', strtotime($end_date)); ?></td>
                                    <td><?php echo date('h:i:s', strtotime($end_date)); ?></td>
                                     <td><?php echo $challan['total_incoming']; ?></td>
                                    <td><?php echo $challan['total_spot_ok']; ?></td>
                                     <td><?php echo $challan['total_incoming']-$challan['total_spot_ok']; ?></td>
                                    <td><?php echo $challan['total_spot']-$challan['total_spot_ok']; ?></td>
                                     <td><?php echo $challan['total_spot_pending']; ?></td>
                                    <td><?php echo ($challan['total_spot_ok']/$challan['total_incoming'])*100; ?></td>
                                     <td><?php echo (($challan['total_incoming']-$challan['total_spot_ok'])/$challan['total_incoming'])*100;?></td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <?php }?>
