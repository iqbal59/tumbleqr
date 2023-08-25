<?php if (!empty($challans)) {

    // print_r($challans);
    ?>
    <div class="card">
        <div class="card-body pt-1">
            <div class="table-responsive">

                <h3 align="center" class="text-center">VENDOR REPORT (
                    <?php echo $condition['vendor_name'] ?>)
                </h3>

                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                    cellpadding="4" align="center" border="1" width="80%">
                    <thead>
                        <tr>
                            <th>Store Name</th>
                            <th>Order No.</th>
                            <th>Barcode</th>
                            <th>Garment Name</th>
                            <th>Service</th>
                            <th>Vendor Name</th>
                            <th>Check-Out</th>
                            <th>check-Out SID</th>
                            <th>Due On</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($challans as $challan) { ?>
                            <tr>

                                <td>
                                    <?php echo $challan['Store_Name']; ?>

                                </td>
                                <td>
                                    <?php echo $challan['Order_No']; ?>

                                </td>
                                <td>
                                    <?php echo $challan['Barcode']; ?>

                                </td>
                                <td>
                                    <?php echo $challan['Sub_Garment']; ?>

                                </td>


                                <td>
                                    <?php echo $challan['Primary_Service']; ?>

                                </td>

                                <td>
                                    <?php echo $challan['vendor_name']; ?>

                                </td>
                                <td>
                                    <?php echo $challan['out_time']; ?>

                                </td>

                                <td>
                                    <?php echo $challan['out_station_id']; ?>

                                </td>

                                <td>
                                    <?php echo date("d-m-Y", strtotime($challan['Due_on'] . ' - 1 days')); ?>

                                </td>




                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php } ?>