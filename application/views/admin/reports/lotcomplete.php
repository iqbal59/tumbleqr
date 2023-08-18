<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles p-1">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">LOT Garment Complete Report</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">LOT Garment Complete Report</li>
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
                <form method="get" class="mb-0" action="<?php echo base_url('admin/reports/lotcomplete') ?>"
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
                                    <div class="col-md-2">
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
                                    <div class="col-md-2">
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
                                            <h5>Store Name</h5>
                                            <div class="controls">
                                                <select name="store_id" class="form-control form-control-sm">
                                                    <option value="">--Select--</option>
                                                    <?php
                                                           if(!empty($stores)) {
                                                               foreach($stores as $store) {
                                                                   $selected='';
                                                                   if(!empty($condition)) {
                                                                       if($condition['store_id']==$store['store_id']) {
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
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group mb-1">
                                            <h5>Services</h5>
                                            <div class="controls">
                                                <select name="Primary_Service" class="form-control form-control-sm">
                                                    <option value="">--Select--</option>
                                                    <?php
                                                        if(!empty($services)) {
                                                            foreach($services as $service) {
                                                                $selected='';
                                                                if(!empty($condition)) {
                                                                    if($condition['Primary_Service']==$service['Primary_Service']) {
                                                                        $selected="selected";
                                                                    }
                                                                }

                                                                echo '<option value="'.$service['Primary_Service'].'"   '.$selected.'>'.$service['Primary_Service'].'</option>';
                                                            }
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-2">
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

                                <th>Store Name</th>
                                <th>Order No.</th>
                                <th>Order Date</th>
                                <th>Cloth No.</th>
                                <th>Garment</th>
                                <th>Station Id</th>

                                <th>Primary Service</th>
                                <th>Due On</th>
                                <th>Scan Time</th>
                                <th>Lot Description</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($challans as $challan) { ?>
                            <tr>

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

                                <td><?php echo $challan['station_id']; ?>
                                </td>
                                <td><?php echo $challan['Primary_Service']; ?>
                                </td>
                                <td><span
                                        style="display:none;"><?php echo strtotime($challan['Due_on']);?></span><?php echo date("d-m-Y", strtotime($challan['Due_on'])); ?>
                                </td>
                                <td><span
                                        style="display:none;"><?php echo strtotime($challan['lot_time']);?></span><?php echo $challan['lot_time']; ?>
                                </td>

                                <td>

                                    <?php
                                $remarks=json_decode($challan['remarks']);
                                ?>
                                    <p>
                                        <?php echo $remarks->wash_machine;?><br />
                                        <?php echo $remarks->for_wash;?><br />
                                        <?php echo implode(",", $remarks->wash_instruction);?><br />
                                        <?php echo $remarks->dry_machine;?><br />
                                        <?php echo $remarks->for_dry;?><br />
                                        <?php echo implode(",", $remarks->dry_instruction);?>

                                    </p>
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
    </div>


    <!-- End Page Content -->

</div>