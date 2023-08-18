<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles p-1">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Spot Hourly Report</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Spot Hourly Report</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">


            <div class="d-flex justify-content-end">
                <!-- <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>Active Store</small></h6>
                        <h4 class="m-t-0 text-info">21</h4>
                    </div>
                </div> -->
                <!-- <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>Inctive User</small></h6>
                        <h4 class="m-t-0 text-primary"><?php echo $count->inactive_user; ?></h4>
                    </div>
                </div> -->

            </div>
        </div>
    </div>

    <!-- End Bread crumb and right sidebar toggle -->



    <!-- Start Page Content -->

    <div class="row p-1">
        <div class="col-12 pt-1">

            <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
            <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i>
                <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                        aria-hidden="true">×</span> </button>
            </div>
            <?php endif ?>

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
            <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i>
                <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                        aria-hidden="true">×</span> </button>
            </div>
            <?php endif ?>

            <div class="card card-outline-info mb-2">
                <!-- <div class="card-header">
                    <h4 class="m-b-0 text-white">Search</h4>
                </div> -->
                <div class="card-body py-1 pt-2">
                    <form method="get" action="<?php echo base_url('admin/reports/spothourly') ?>"
                        class="form-horizontal" novalidate>
                        <div class="form-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-12 controls">


                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group m-0">
                                                        <h5>Enter From Date <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="s_from_date" class="form-control form-control-sm"
                                                                placeholder="MM/DD/YYYY" 
                                                                value="<?php if(!empty($condition)){echo $condition['from_date'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                              



                                                <div class="col-md-3">
                                                    <div class="form-group m-0">
                                                        <h5>Station Id</h5>
                                                        <div class="controls">
                                                           <select  name="store_id" class="form-control form-control-sm">
	                                                           <option value="">--Select--</option>
	                                                           <?php
		                                                           if(!empty($spot_stations)){
			                                                           foreach($spot_stations as $store){
				                                                           $selected='';
				                                                            if(!empty($condition)){if($condition['store_id']==$store['station_id']) {$selected="selected";}}
				                                                           
				                                                           echo '<option value="'.$store['station_id'].'"   '.$selected.'>'.$store['station_id'].'</option>';
			                                                           }
		                                                           }
		                                                           ?>
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>

<div class="col-md-3">
                                                    <div class="form-group m-0">
                                                        <h5>Service Type</h5>
                                                        <div class="controls">
                                                           <select  name="Primary_Service" class="form-control form-control-sm">
	                                                           <option value="">--Select--</option>
	                                                           <?php
		                                                           if(!empty($services)){
			                                                           foreach($services as $service){
				                                                           $selected='';
				                                                            if(!empty($condition)){if($condition['Primary_Service']==$service['Primary_Service']) {$selected="selected";}}
				                                                           
				                                                           echo '<option value="'.$service['Primary_Service'].'"   '.$selected.'>'.$service['Primary_Service'].'</option>';
			                                                           }
		                                                           }
		                                                           ?>
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group mt-1">
                                                        <label class="control-label text-right col-md-3"></label>
                                                        <div class="controls">
                                                            <button type="submit" class="btn btn-sm btn-success">Show</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--/span-->
                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>













                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                value="<?=$this->security->get_csrf_hash();?>" />




                        </div>

                    </form>
                </div>
            </div>
            <?php if(!empty($challans)) {?>
            <div class="card">
                <div class="card-body pt-1">
                    <div class="table-responsive">
                        <table id="example23" class="display text-dark nowrap table table-hover table-striped table-bordered table-sm"
                            cellspacing="0" cellpadding="0" width="100%">
                            <thead>
                                <tr>
									<th>Hr No.</th>
                                    <th>Total</th>
                                     <?php 
	                                    
	                                    foreach($stations as $station){
		                                    echo "<th>".$station['station_id']."</th>";
	                                    }
                                    ?>
                                                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
	                                $t=0;
	                                $tp=0;
	                                $tf=0;
	                                //$ts=0;
	                                 foreach($challans as $challan){ ?>
                                <tr>
									<td><?php echo $challan['hr_no']."-".($challan['hr_no']+1); ?></td>
                                    <td><?php echo $challan['total']; $t+=$challan['total'];?></td>
                                                                       
                                       <?php 
	                                    
	                                    foreach($stations as $station){
		                                    echo "<td>".$challan[$station['station_id']]."</td>";
		                                    $ts[$station['station_id']]+=$challan[$station['station_id']];
	                                    }
                                    ?>                               
                                </tr>
                                <?php } ?>
                            </tbody>
                            
                            <tfooter>
	                           <tr>
		                           <td>Total</td>
		                           <td><?php echo $t; ?></td>
								   
								    <?php 
	                                    
	                                    foreach($stations as $station){
		                                    echo "<td>".$ts[$station['station_id']]."</td>";
	                                    }
                                    ?> 
								   
								   
	                           </tr> 
	                            
                            </tfooter>
                            
                        </table>


                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>


    <!-- End Page Content -->

</div>