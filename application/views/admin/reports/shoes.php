<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles p-1">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Shoes Vendor Report</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Shoes Vendor Report</li>
            </ol>
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
                <!-- <div class="col-md-12">
                            <h4 class="m-b-10 text-white text-left">Search</h4>
                        </div> -->
                <div class="card-body py-1 pt-2">
                <form method="get" class="mb-0" action="<?php echo base_url('admin/reports/shoes') ?>"
                                class="form-horizontal" novalidate>
                    <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-12 controls">
                                <!-- CSRF token -->
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                    value="<?=$this->security->get_csrf_hash();?>" />

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <h5>Enter From Date <span class="text-danger">*</span>
                                            </h5>
                                            <div class="controls">
                                                <input type="date" name="s_from_date" class="form-control form-control-sm"
                                                    placeholder="MM/DD/YYYY" value="<?php if(!empty($condition)) {
                                                        echo $condition['from_date'];
                                                    } ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <h5>Enter To Date <span class="text-danger">*</span>
                                            </h5>
                                            <div class="controls">
                                                <input type="date" name="s_to_date" class="form-control form-control-sm"
                                                    placeholder="MM/DD/YYYY" value="<?php if(!empty($condition)) {
                                                        echo $condition['to_date'];
                                                    }?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <h5>Station Id</h5>
                                            <div class="controls">
                                                <select name="station_id" class="form-control form-control-sm">
                                                    <option value="">--Select--</option>
                                                    <option value="429"
                                                        <?php echo $condition['station_id']=='429'?"selected":""; ?>>429
                                                    </option>
                                                    <option value="439"
                                                        <?php echo $condition['station_id']=='439'?"selected":""; ?>>439
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <h5>&nbsp;</h5>
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
                                </div>
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
                                <th>Store Code</th>
                                <th>Store Name</th>
                                <th>Order No.</th>
                                <th>Order Date</th>
                                <th>Cloth No.</th>
                                <th>Garment</th>
                                <th>Primary Service</th>
                                <th>Due On</th>
                                <th>Incoming Time</th>
                                <th>Date Sent to Vendor</th>
                                <th>Vendor Due Date</th>
                                <th>Date Received from Vendor</th>
                                <th>TAT</th>
                                <th>Processed AT</th>
                                <th>QC Date</th>
                                <th>QC Status</th>
                                <th>Packing Date</th>
                                <th>Dispatch Date</th>
                                <th>Delayed By</th>
                                <th>Deduction</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           // print_r($challans);
                        foreach($challans as $challan) {
                            ?>
                            <tr>
                                <td><?php echo $challan['store_id']?>
                                </td>

                                <td><?php echo $challan['Store_Name']; ?>
                                </td>
                                <td><?php echo $challan['Order_No']; ?>
                                </td>
                                <td><span
                                        style="display:none;"><?php echo strtotime($challan['Order_Date']);?></span><?php echo date("d-m-Y", strtotime($challan['Order_Date'])); ?>
                                </td>
                                <td><?php echo $challan['Barcode']; ?>
                                </td>
                                <td><?php echo $challan['Sub_Garment']; ?>
                                </td>
                                <td><?php echo $challan['Primary_Service']; ?>
                                </td>
                                <td><span
                                        style="display:none;"><?php echo strtotime($challan['Due_on']);?></span><?php echo date("d-m-Y", strtotime($challan['Due_on'])); ?>
                                </td>
                                <td><span
                                        style="display:none;"><?php echo strtotime($challan['initial_time']);?></span><?php echo $challan['initial_time']; ?>
                                </td>

                                <td><span
                                        style="display:none;"><?php echo strtotime($challan['spot_time']);?></span><?php echo $challan['spot_time']; ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>



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
    </div>


    <!-- End Page Content -->

</div>