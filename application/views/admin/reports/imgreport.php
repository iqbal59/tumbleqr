<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles p-1">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Garment Image</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Garment Image Report</li>
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


            <div class="card card-outline-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="m-b-10 text-white text-left">Search</h4>
                        </div>

                        <div class="col-md-12">




                            <form method="get" class="mb-0" action="<?php echo base_url('admin/reports/imgreport') ?>">



                                <!-- CSRF token -->
                                <!-- <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>"
                                /> -->

                                <input type="hidden" name="filter_days" value="<?php echo $days ?>" />
                                <input type="hidden" name="ss_from_date" value="<?php if (!empty($condition)) {
                                    echo $condition['from_date'];
                                } ?>">
                                <input type="hidden" name="ss_to_date" value="<?php if (!empty($condition)) {
                                    echo $condition['to_date'];
                                } ?>" />



                                <div class="form-row align-items-center">

                                    <div class="col-2">
                                        <div class="input-group input-group-sm ">
                                            <!-- <div class="input-group-addon">Store Code</div> -->
                                            <select name="store_id" class="form-control input-sm">
                                                <option value="">--Select Store--</option>

                                                <?php if (!empty($stores)) {
                                                    foreach ($stores as $store) {
                                                        $selected = '';
                                                        if (!empty($condition)) {
                                                            if ($condition['store_id'] == $store['store_id']) {
                                                                $selected = "selected";
                                                            }
                                                        }
                                                        echo '<option value="' . $store['store_id'] . '" ' . $selected . '>' . $store['Store_Name'] . '</option>';
                                                    }
                                                } ?>
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

                                    <div class="col-2">
                                        <div class="input-group input-group-sm ">
                                            <!-- <div class="input-group-addon">Primary Service</div> -->
                                            <select name="primary_service" class="form-control input-sm">
                                                <option value="">--Select Primary Service--</option>

                                                <?php if (!empty($services)) {
                                                    foreach ($services as $s) {
                                                        $selected = '';
                                                        if (!empty($condition)) {
                                                            if ($condition['primary_service'] == $s['Primary_Service']) {
                                                                $selected = "selected";
                                                            }
                                                        }
                                                        echo '<option value="' . $s['Primary_Service'] . '" ' . $selected . '>' . $s['Primary_Service'] . '</option>';
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-2">
                                        <div class="input-group input-group-sm ">
                                            <!-- <div class="input-group-addon">Garment Type</div> -->
                                            <select name="garment_type" class="form-control input-sm select2">
                                                <option value="">--Garment Type--</option>

                                                <?php if (!empty($garment)) {
                                                    foreach ($garment as $g) {
                                                        $selected = '';
                                                        if (!empty($condition)) {
                                                            if ($condition['garment_type'] == $g['Sub_Garment']) {
                                                                $selected = "selected";
                                                            }
                                                        }
                                                        echo '<option value="' . $g['Sub_Garment'] . '" ' . $selected . '>' . $g['Sub_Garment'] . '</option>';
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-sm btn-success">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>


                <?php if (!empty($challans)) { ?>



                <div class="card-body pt-1">



<<<<<<< HEAD
                    <table id="example23" class="table text-dark table-hover table-striped table-bordered" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
=======
                        <table id="example23" class="table table-hover table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
>>>>>>> 7202032b3325134e9a0e55523f65012f04885558

                                    <th>Store Name</th>
                                    <th>Order No.</th>
                                    <th>Order Date</th>
                                    <th>Garment</th>
                                    <th>Barcode</th>

                                    <th>Primary Service</th>
                                    <th>Due On</th>
                                    <th>Station Id</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($challans as $challan) {
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $challan->Store_Name; ?>
                                        </td>
                                        <td>
                                            <?php echo $challan->Order_No; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d-m-Y', strtotime($challan->Order_Date)); ?>
                                        </td>
                                        <td>
                                            <?php echo $challan->Sub_Garment; ?>
                                        </td>
                                        <td>
                                            <?php echo $challan->Barcode; ?>
                                        </td>


                                        <td>
                                            <?php echo $challan->Primary_Service; ?>
                                        </td>
                                        <td><span style="display:none;"><?php echo strtotime($challan->Due_on . ' - 1 days'); ?></span>
                                            <?php echo date("d-m-Y", strtotime($challan->Due_on . ' - 1 days')); ?>
                                        </td>

                                        <td>
                                            <?php echo $challan->station_id; ?>
                                        </td>

                                        <td><a href="javascript:void(0)" title="<?php echo $challan->Sub_Garment; ?>"
                                                onClick="clickImage('<?php echo $challan->Barcode; ?>', '<?php echo $challan->Sub_Garment; ?>')">
                                                <img style="height: 75px"
                                                    src="https://swatinfosystems.com/upload/<?php echo $challan->picture; ?>"
                                                    class="img-thumbnail" height="100"></a>
                                        </td>

                                    </tr>
                                    <?php
                                } ?>
                            </tbody>
                        </table>



                    </div>

                <?php } ?>
            </div>
        </div>


        <!-- End Page Content -->

    </div>

    <!-- modal -->
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.modal -->