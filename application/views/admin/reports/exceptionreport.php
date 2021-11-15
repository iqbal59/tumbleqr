<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Exception Report</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Exception Report</li>
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
                    <form method="get" action="<?php echo base_url('admin/reports/exceptionreport') ?>"
                        class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">

                                        <div class="col-md-12 controls">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>From Station<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="from_station" class="form-control" required>
                                                                <option value="">--Select--</option>
                                                                <option value="1"
                                                                    <?php if(!empty($condition) && $condition['from_station']=='1'){echo "selected";} ?>>
                                                                    Incoming</option>
                                                                <option value="2"
                                                                    <?php if(!empty($condition) && $condition['from_station']=='2'){echo "selected";} ?>>
                                                                    Spotting</option>
                                                                <option value="3"
                                                                    <?php if(!empty($condition) && $condition['from_station']=='3'){echo "selected";} ?>>
                                                                    QC</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>To Station <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="to_station" class="form-control" required>
                                                                <option value="">--Select--</option>
                                                                <option value="2"
                                                                    <?php if(!empty($condition) && $condition['to_station']=='2'){echo "selected";} ?>>
                                                                    Spotting</option>
                                                                <option value="3"
                                                                    <?php if(!empty($condition) && $condition['to_station']=='3'){echo "selected";} ?>>
                                                                    QC</option>
                                                                <option value="4"
                                                                    <?php if(!empty($condition) && $condition['to_station']=='4'){echo "selected";} ?>>
                                                                    Packing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>From Date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="from_date" class="form-control"
                                                                placeholder="MM/DD/YYYY"
                                                                value="<?php if(!empty($condition)){echo $condition['from_date'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>From Time<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="time" name="from_time" class="form-control"
                                                                placeholder="HH:MM:SS"
                                                                value="<?php if(!empty($condition)){echo $condition['from_time'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>To Date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="to_date" class="form-control"
                                                                placeholder="MM/DD/YYYY"
                                                                value="<?php if(!empty($condition)){echo $condition['to_date'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>To Time<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="time" name="to_time" class="form-control"
                                                                placeholder="HH:MM:SS"
                                                                value="<?php if(!empty($condition)){echo $condition['to_time'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Till Date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="till_date" class="form-control"
                                                                placeholder="MM/DD/YYYY"
                                                                value="<?php if(!empty($condition)){echo $condition['till_date'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <h5>Till Time<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="time" name="till_time" class="form-control"
                                                                placeholder="HH:MM:SS"
                                                                value="<?php if(!empty($condition)){echo $condition['till_time'];} ?>">
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

                    <h3 align="center">Report : INCOMING TO SPOTTING </h3>

                    <div class="table-responsive m-t-40">




                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" cellpadding="4" align="center" border="1" width="80%">
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

                                    <td><?php echo date('d-m-Y', strtotime($condition['from_date'])); ?></td>
                                    <td><?php echo $condition['from_time']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($condition['to_date'])); ?></td>
                                    <td><?php echo $condition['to_time']; ?>
                                    <td>
                                        <?php echo $challan['total_incoming']; ?></td>
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

                    <h3 align="center">Report : SPOTTING TO QC SCAN </h3>

                    <div class="table-responsive m-t-40">




                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" cellpadding="4" align="center" border="1" width="80%">
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

                                    <td><?php echo date('d-m-Y', strtotime($condition['from_date'])); ?></td>
                                    <td><?php echo $condition['from_time']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($condition['to_date'])); ?></td>
                                    <td><?php echo $condition['to_time']; ?>
                                    <td><?php echo $challan['total_spot']; ?></td>
                                    <td><?php echo $challan['total_qc_done']; ?></td>
                                    <td><?php echo $challan['total_spot']-$challan['total_qc_done']; ?></td>

                                    <td><?php echo ($challan['total_qc_done']/$challan['total_spot'])*100; ?></td>
                                    <td><?php echo (($challan['total_spot']-$challan['total_qc_done'])/$challan['total_spot'])*100;?>
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

                    <h3 align="center">Report: QC TO PACK </h3>

                    <div class="table-responsive m-t-40">




                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" cellpadding="4" align="center" border="1" width="80%">
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

                                    <td><?php echo date('d-m-Y', strtotime($condition['from_date'])); ?></td>
                                    <td><?php echo $condition['from_time']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($condition['to_date'])); ?></td>
                                    <td><?php echo $condition['to_time']; ?>
                                    <td><?php echo $challan['total_qc']; ?></td>
                                    <td><?php echo $challan['total_pack_done']; ?></td>
                                    <td><?php echo $challan['total_qc']-$challan['total_pack_done']; ?></td>

                                    <td><?php echo ($challan['total_pack_done']/$challan['total_qc'])*100; ?></td>
                                    <td><?php echo (($challan['total_qc']-$challan['total_pack_done'])/$challan['total_qc'])*100;?>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>


    <!-- End Page Content -->

</div>