<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Missing Garment</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Missing Garment Report</li>
            </ol>
        </div>

    </div>

    <!-- End Bread crumb and right sidebar toggle -->



    <!-- Start Page Content -->

    <div class="row page-titles">
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


            <div class="card card-outline-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2 my-auto">
                            <h4 class="m-b-0 text-white text-middle">Search</h4>
                        </div>
                        <div class="col-md-10">




                            <form method="get" class="mb-0" action="<?php echo base_url('admin/reports/missingyn') ?>">
                                <input type="hidden" name="filter_days" value="<?php echo $days?>" />
                                <input type="hidden" name="s_from_date" value="<?php if (!empty($condition)) {
                                    echo $condition['from_date'];
                                } ?>">
                                <input type="hidden" name="s_to_date" value="<?php if (!empty($condition)) {
                                    echo $condition['to_date'];
                                }?>" />



                                <div class="form-row align-items-right">
                                    <div class="col-md-3">
                                        <select name="filter_type" class="form-control form-control-sm">
                                            <option value="1" <?php if (!empty($condition)) {
                                                echo $condition['filter_type']=='1'?"selected":"";
                                            }?>>Sent
                                                to Workshop and Not Rececived at Plant
                                            </option>
                                            <option value="2" <?php if (!empty($condition)) {
                                                echo $condition['filter_type']=='2'?"selected":"";
                                            }?>>Not
                                                Sent to Workshop and Rececived at Plant
                                            </option>
                                            <option value="3" <?php if (!empty($condition)) {
                                                echo $condition['filter_type']=='3'?"selected":"";
                                            }?>>Not
                                                Sent to Workshop and Not Rececived at Plant
                                            </option>
                                        </select>


                                    </div>
                                    <div class="col-md-4">


                                        <!-- CSRF token -->
                                        <!-- <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                        value="<?=$this->security->get_csrf_hash();?>"
                                        /> -->



                                        <div class="input-group input-group-sm ">
                                            <div class="input-group-addon">Store Code</div>
                                            <select name="store_id" class="form-control input-sm">
                                                <option value="">--Select Store--</option>
                                                <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if (!empty($stores)) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            foreach ($stores as $store) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $selected='';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if (!empty($condition)) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($condition['store_id']==$store['store_id']) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $selected="selected";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                echo '<option value="'.$store['store_id'].'"   '.$selected.'>'.$store['Store_Name'].'</option>';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
            ?>
                                            </select>

                                        </div>






                                    </div>



                                    <div class="col-4">
                                        <div id="reportrange"
                                            style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span> <i class="fa fa-caret-down"></i>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <button type="submit" class="btn btn-sm btn-success">Show</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>


                <?php if (!empty($challans)) {?>


                <div class="card-body">


                    <?php if (!empty($condition)) {
                        if ($condition['filter_type']==1) {
                            echo "<h3 class='text-center'>Sent to Workshop and Not Rececived at Plant</h3>";
                        } elseif ($condition['filter_type']==2) {
                            echo "<h3 class='text-center'>Not Sent to Workshop and Rececived at Plant</h3>";
                        } elseif ($condition['filter_type']==3) {
                            echo "<h3 class='text-center'>Not Sent to Workshop and Not Rececived at Plant</h3>";
                        }
                    }?>


                    <table id="example23" class="table table-hover table-striped table-bordered" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>

                                <th>Store Name</th>
                                <th>Order No.</th>
                                <th>Order Date</th>
                                <th>Garment</th>
                                <th>Barcode</th>

                                <th>Primary Service</th>
                                <th>Due On</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($challans as $challan) {
                                ?>
                            <tr>

                                <td><?php echo $challan->Store_Name; ?>
                                </td>
                                <td><?php echo $challan->Order_No; ?>
                                </td>
                                <td><?php echo date('d-m-Y', strtotime($challan->Order_Date)); ?>
                                </td>
                                <td><?php echo $challan->Sub_Garment; ?>
                                </td>
                                <td><?php echo $challan->Barcode; ?>
                                </td>


                                <td><?php echo $challan->Primary_Service; ?>
                                </td>
                                <td><span
                                        style="display:none;"><?php echo strtotime($challan->Due_on. ' - 1 days'); ?></span><?php echo date("d-m-Y", strtotime($challan->Due_on. ' - 1 days')); ?>
                                </td>



                            </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>



                </div>

                <?php }?>
            </div>
        </div>


        <!-- End Page Content -->

    </div>