<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">QC Complete Report Hourly</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">QC Complete Report</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">


            <div class="d-flex m-t-10 justify-content-end">
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

    <div class="row">
        <div class="col-12">

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

            <div class="card">

                <div class="card-body">
                    <form method="get" action="<?php echo base_url('admin/reports/qcreporthourly') ?>"
                        class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">

                                        <div class="col-md-12 controls">


                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Date <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="s_from_date" class="form-control"
                                                                placeholder="MM/DD/YYYY" 
                                                                value="<?php if(!empty($condition)){echo $condition['from_date'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>






                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label text-right col-md-3"></label>
                                                        <div class="controls">
                                                            <button type="submit" class="btn btn-success">Show</button>
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

                <div class="card-body">



                    <div class="table-responsive m-t-40">




                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
									<th>Hr No.</th>
                                    <th>Total</th>
                                    <th>Pass Total</th>
                                    <th>Fail Total</th>
                                    <th>Sorry Total</th>
                                    <th>Pass (%)</th>
                                    <th>Fail (%)</th>
                                    <th>Sorry (%)</th>
                                  
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
	                                $t=0;
	                                $tp=0;
	                                $tf=0;
	                                $ts=0;
	                                 foreach($challans as $challan){ ?>
                                <tr>
									<td><?php echo $challan['hr_no']."-".($challan['hr_no']+1); ?></td>
                                    <td><?php echo $challan['total']; $t+=$challan['total'];?></td>
                                    <td><?php echo $challan['pass_count']; $tp+=$challan['pass_count'];?></td>
                                    
                                    <td><?php echo $challan['fail_count']; $tf+=$challan['fail_count'];?></td>
                                    <td><?php echo $challan['sorry_count']; $ts+=$challan['sorry_count']; ?></td>
                                     
									<td><?php echo round(($challan['pass_count']/$challan['total'])*100); ?></td>
                                    <td><?php echo round(($challan['fail_count']/$challan['total'])*100); ?></td>
                                    <td><?php echo round(($challan['sorry_count']/$challan['total'])*100); ?></td>
                                   
                                </tr>
                                <?php } ?>
                            </tbody>
                            
                            <tfooter>
	                           <tr>
		                           <td>Total</td>
		                           <td><?php echo $t; ?></td>
								   <td><?php echo $tp; ?></td>
								   <td><?php echo $tf; ?></td>
								   
								   <td><?php echo $ts; ?></td>
								 <td><?php echo round(($tp/$t)*100); ?></td>
								 <td><?php echo round(($tf/$t)*100); ?></td>
								 <td><?php echo round(($ts/$t)*100); ?></td>
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