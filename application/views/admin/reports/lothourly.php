<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Lot Hourly Report</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Lot Hourly Report</li>
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
                        <h4 class="m-t-0 text-primary"><?php echo $count->inactive_user; ?>
                </h4>
            </div>
        </div> -->

            </div>
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
                        <div class="col-md-12">
                            <h4 class="m-b-10 text-white text-left">Search</h4>
                        </div>

                        <div class="col-md-12">
                            <form method="get" class="mb-0" action="<?php echo base_url('admin/reports/lot') ?>"
                                class="form-horizontal" novalidate>
                                <!-- CSRF token -->
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                    value="<?=$this->security->get_csrf_hash();?>" />

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5 class="text-white">Enter From Date <span class="text-danger">*</span>
                                            </h5>
                                            <div class="controls">
                                                <input type="date" name="s_from_date" class="form-control"
                                                    placeholder="MM/DD/YYYY" value="<?php if(!empty($condition)) {
                                                    echo $condition['from_date'];
                                                } ?>">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5 class="text-white">Station Id</h5>
                                            <div class="controls">
                                                <select name="station_id" class="form-control">
                                                    <option value="">--Select--</option>
                                                    <?php
                                                       if(!empty($lot_stations)) {
                                                           foreach($lot_stations as $s) {
                                                               $selected='';
                                                               if(!empty($condition)) {
                                                                   if($condition['station_id']==$s['station_id']) {
                                                                       $selected="selected";
                                                                   }
                                                               }

                                                               echo '<option value="'.$s['station_id'].'"   '.$selected.'>'.$s['station_id'].'</option>';
                                                           }
                                                       }
                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5 class="text-white">Service Type</h5>
                                            <div class="controls">
                                                <select name="Primary_Service" class="form-control">
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
                                        <div class="form-group">
                                            <h5>&nbsp;</h5>
                                            <div class="controls">
                                                <button type="submit" class="btn btn-success">Show</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if(!empty($challans)) {?>
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Hr No.</th>
                                <th>Total</th>
                                <?php

                                        foreach($lot_stations as $s) {
                                            echo "<th>".$s['station_id']."</th>";
                                        }
                    ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $t=0;
                    $tp=0;
                    $tf=0;
                    $ts=array();
                    //$ts=0;
                    foreach($challans as $challan) { ?>
                            <tr>
                                <td><?php echo $challan['hr_no']."-".($challan['hr_no']+1); ?>
                                </td>
                                <td><?php echo $challan['total'];
                        $t+=$challan['total'];?>
                                </td>

                                <?php


                        foreach($lot_stations as $s) {
                            echo "<td>".$challan[$s['station_id']]."</td>";

                            $ts[$s['station_id']]+=$challan[$s['station_id']];
                        }
                        ?>
                            </tr>
                            <?php } ?>
                        </tbody>

                        <tfooter>
                            <tr>
                                <td>Total</td>
                                <td><?php echo $t; ?>
                                </td>

                                <?php

                            foreach($lot_stations as $s) {
                                echo "<td>".$ts[$s['station_id']]."</td>";
                            }
                    ?>


                            </tr>

                        </tfooter>

                    </table>

                    <?php }?>
                </div>
            </div>


        </div>
    </div>


    <!-- End Page Content -->

</div>