<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles p-1">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Import</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Import Challan Data</li>
            </ol>
        </div>

    </div>

    <!-- End Bread crumb and right sidebar toggle -->



    <!-- Start Page Content -->

    <div class="row mt-3">
        <div class="col-lg-12 pt-1">

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
            <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i>
                <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                        aria-hidden="true">×</span> </button>
            </div>
            <?php endif ?>


            <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
            <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i>
                <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                        aria-hidden="true">×</span> </button>
            </div>
            <?php endif ?>


            <div class="card card-outline-info mx-1">
                <div class="card-header p-4">
                    <h4 class="m-b-0 text-white"> Import Data <a
                            href="<?php echo base_url('admin/import/challandata');?>" class="btn p-0 btn-info pull-right"><i
                                class="fa fa-list"></i> All Challan Data </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/import/importdata') ?>"
                        class="form-horizontal" enctype="multipart/form-data" novalidate>
                        <div class="form-body">
                            <br>


                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Select Data Type <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <select name="data_type" class="form-control" required
                                                data-validation-required-message="field is required">
                                                <!-- <option value="">--Select--</option> -->
                                                <option value="1">Challan Data</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>



                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Choose CSV file <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="file" name="excel_file" class="form-control" required
                                                data-validation-required-message="file is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>












                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                value="<?=$this->security->get_csrf_hash();?>" />


                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class=" row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Import</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->

</div>