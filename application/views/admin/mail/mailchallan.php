 <?php if(!empty($challans)) {?>
            <div class="card">

                <div class="card-body">



                    <div class="table-responsive m-t-40">




                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" cellpadding="4" align="center" border="1"  width="80%">
                            <thead>
                                <tr>

                                    <th>Store Name</th>
                                    <th>Order No.</th>
                                    <th>Cloth Count</th>
                                   
                                    
                                    <th>Due On</th>
                                    <!-- <th>Dispatch Date</th>
                                    <th>Dispatch Shift</th>
                                     -->
                                    
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

                                    <td><?php echo $challan['Store_Name']; ?></td>
                                    <td><?php echo $challan['Order_No']; ?></td>
                                    <td><?php echo $challan['total_garment']; ?>
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
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <?php }?>
