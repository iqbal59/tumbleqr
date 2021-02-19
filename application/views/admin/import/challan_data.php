<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Challan Data</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Challan Data</li>
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
                    <form method="get" action="<?php echo base_url('admin/import/challandata') ?>"
                        class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">

                                        <div class="col-md-12 controls">


                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5>Enter From Date <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="s_from_date" class="form-control"
                                                                placeholder="MM/DD/YYYY" required
                                                                value="<?php if(!empty($condition)){echo $condition['from_date'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5>Enter To Date <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="s_to_date" class="form-control"
                                                                placeholder="MM/DD/YYYY" required
                                                                value="<?php if(!empty($condition)){echo $condition['to_date'];}?>">
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

                                    <th>Store Name</th>
                                    <th>Order No.</th>
                                    <th>Date</th>

                                    <th>Garment</th>
                                    <th>Sub Garment</th>
                                    <th>Barcode</th>
                                    <th>Primary Service</th>
                                    <th>Due On</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($challans as $challan){ ?>
                                <tr>

                                    <td><?php echo $challan['Store_Name']; ?></td>
                                    <td><?php echo $challan['Order_No']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($challan['Order_Date'])); ?></td>
                                    <td><?php echo $challan['Garment']; ?></td>
                                    <td><?php echo $challan['Sub_Garment']; ?></td>
                                    <td><?php echo $challan['Barcode']; ?></td>
                                    <td><?php echo $challan['Primary_Service']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($challan['Due_on'])); ?></td>


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