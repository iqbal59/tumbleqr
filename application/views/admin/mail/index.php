<style type="text/css">
h3,
h2 {
    text-align: center;
    margin: 0;
    margin-bottom: 10px;
    padding: 0;
}

.table {
    width: 750px;
    border-collapse: collapse;
    margin: 10px auto;
}

/* Zebra striping */
tr:nth-of-type(odd) {
    background: #eee;
}


tr.higlight {
    background: #2eec47;
}

th {
    background: #3498db;
    color: white;
    font-weight: bold;
}

td,
th {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
    font-size: 14px;
}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px) {

    table {
        width: 100%;
    }

    /* Force table to not be like tables anymore */
    table,
    thead,
    tbody,
    th,
    td,
    tr {
        display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    tr {
        border: 1px solid #ccc;
    }

    td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;

        padding-left: 50%;
    }

    td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        /* Label the data */
        content: attr(data-column);

        color: #000;
        font-weight: bold;
    }

}
</style>

<h2>Report Summary
    <?php echo date('d-m-Y', strtotime($dateData)); ?>
</h2>
<h3>Initial Total</h3>
<?php if (!empty($initialTotals)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Date</th>

                        <th>Cloth Scanned (FTD)</th>
                        <th>Cloth Scanned (MTD)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($initialTotals as $challan) { ?>
                    <tr>
                        <td><span style="display:none;"><?php echo strtotime($challan['date']); ?></span>
                            <?php echo $challan['date']; ?>
                        </td>

                        <td>
                            <?php echo $challan['total']; ?>
                        </td>

                        <td>
                            <?php echo $mtdinitial->totalmtd; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } else { ?>

<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>



                        <th>Cloth Scanned (MTD)</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>


                        <td>
                            <?php echo $mtdinitial->totalmtd; ?>
                        </td>
                    </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>

<?php
} ?>

<h3>Initial Hourly</h3>

<?php



// foreach ($allusers as $user) {
//     $users[$user['station_id']]=$user['user_name'];
// }

//print_r($users);


if (!empty($initialTotalsHourly)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Hr No.</th>
                        <th>Total</th>
                        <?php

                            foreach ($initial_stations as $station) {
                                echo "<th>" . $station['incoming_station_id'] . "</th>";
                            }
                            ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $t = 0;

                        $ts = array();
                        foreach ($initialTotalsHourly as $challan) { ?>
                    <tr>
                        <td>
                            <?php echo $challan['hr_no'] . "-" . ($challan['hr_no'] + 1); ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>
                        <?php

                                foreach ($initial_stations as $station) {
                                    echo "<td>" . $challan[$station['incoming_station_id']] . "</td>";
                                    $ts[$station['incoming_station_id']] += $challan[$station['incoming_station_id']];
                                }
                                ?>

                    </tr>
                    <?php } ?>
                </tbody>

                <tfooter>
                    <tr>
                        <td>Total</td>
                        <td>
                            <?php echo $t; ?>
                        </td>
                        <?php

                            foreach ($initial_stations as $station) {
                                echo "<td>" . $ts[$station['incoming_station_id']] . "</td>";
                            }
                            ?>

                    </tr>

                </tfooter>

            </table>


        </div>
    </div>
</div>
<?php } ?>


<h3>Spot Total</h3>

<?php if (!empty($spotTotal)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>



                        <th>Spotter Id</th>
                        <th>DC Clothes</th>
                        <th>Laundry Clothes</th>
                        <th>Total</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dc = 0;
                        $l = 0;
                        $t = 0;

                        foreach ($spotTotal as $challan) { ?>
                    <tr>


                        <td>
                            <?php echo $challan['station_id']; ?>
                        </td>
                        <td>
                            <?php echo $challan['DC'];
                                    $dc += $challan['DC']; ?>
                        </td>
                        <td>
                            <?php echo $challan['Laundry'];
                                    $l += $challan['Laundry']; ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>



                    </tr>
                    <?php } ?>

                    <tr>


                        <td>Total</td>
                        <td>
                            <?php echo $dc; ?>
                        </td>
                        <td>
                            <?php echo $l; ?>
                        </td>
                        <td>
                            <?php echo $t; ?>
                        </td>



                    </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>



<h3>Clothes handled in the month by the spotter</h3>

<?php if (!empty($spotTotalMonth)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>



                        <th>Spotter Id</th>
                        <th>DC Clothes</th>
                        <th>Laundry Clothes</th>
                        <th>Total</th>


                    </tr>
                </thead>
                <tbody>
                    <?php

                        $dc = 0;
                        $l = 0;
                        $t = 0;

                        foreach ($spotTotalMonth as $challan) { ?>
                    <tr>


                        <td>
                            <?php echo $challan['station_id']; ?>
                        </td>
                        <td>
                            <?php echo $challan['DC'];
                                    $dc += $challan['DC']; ?>
                        </td>
                        <td>
                            <?php echo $challan['Laundry'];
                                    $l += $challan['Laundry']; ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>



                    </tr>
                    <?php } ?>

                    <tr>


                        <td>Total</td>
                        <td>
                            <?php echo $dc; ?>
                        </td>
                        <td>
                            <?php echo $l; ?>
                        </td>
                        <td>
                            <?php echo $t; ?>
                        </td>



                    </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>




<h3>Clothes handled today by the QC person, re-mapped to the Spotting person who had handled these clothes earlier</h3>

<?php if (!empty($qc_by_spotter_id)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>



                        <th>Spotter Id</th>
                        <th>QC FTD Clothes</th>
                        <th>QC Fail Clothes</th>
                        <th>QC Fail Count as a % of DC Clothes</th>
                        <th>QC Sorry Clothes</th>
                        <th>Sorry Card as a % of DC Clothes</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $t = 0;
                        $fc = 0;
                        $sc = 0;

                        foreach ($qc_by_spotter_id as $challan) { ?>
                    <tr>


                        <td>
                            <?php echo $challan['station_id']; ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>
                        <td>
                            <?php echo $challan['fail_count'];
                                    $fc += $challan['fail_count']; ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['fail_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo $challan['sorry_count'];
                                    $sc += $challan['sorry_count']; ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['sorry_count'] / $challan['total']) * 100, 2); ?>
                        </td>



                    </tr>
                    <?php } ?>


                    <tr>


                        <td>Total</td>
                        <td>
                            <?php echo $t; ?>
                        </td>
                        <td>
                            <?php echo $fc; ?>
                        </td>
                        <td>
                            <?php echo number_format(($fc / $t) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo $sc ?>
                        </td>
                        <td>
                            <?php echo number_format(($sc / $t) * 100, 2); ?>
                        </td>



                    </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>


<h3>Clothes handled MTD by the QC person, re-mapped to the Spotting person who had handled these clothes earlier</h3>

<?php if (!empty($qc_by_month_spotter_id)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>



                        <th>Spotter Id</th>
                        <th>QC MTD Clothes</th>
                        <th>QC Fail Clothes</th>
                        <th>QC Fail Count as a % of DC Clothes</th>
                        <th>QC Sorry Clothes</th>
                        <th>Sorry Card as a % of DC Clothes</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $t = 0;
                        $fc = 0;
                        $sc = 0;

                        foreach ($qc_by_month_spotter_id as $challan) { ?>
                    <tr>


                        <td>
                            <?php echo $challan['station_id']; ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>
                        <td>
                            <?php echo $challan['fail_count'];
                                    $fc += $challan['fail_count']; ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['fail_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo $challan['sorry_count'];
                                    $sc += $challan['sorry_count']; ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['sorry_count'] / $challan['total']) * 100, 2); ?>
                        </td>



                    </tr>
                    <?php } ?>


                    <tr>


                        <td>Total</td>
                        <td>
                            <?php echo $t; ?>
                        </td>
                        <td>
                            <?php echo $fc; ?>
                        </td>
                        <td>
                            <?php echo number_format(($fc / $t) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo $sc ?>
                        </td>
                        <td>
                            <?php echo number_format(($sc / $t) * 100, 2); ?>
                        </td>



                    </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>


<h3>Spot Hourly</h3>

<?php if (!empty($spotTotalHourly)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Hr No.</th>
                        <th>Total</th>
                        <?php

                            foreach ($stations as $station) {
                                echo "<th>" . $users[$station['station_id']] . "</th>";
                            }
                            ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $t = 0;
                        $tp = 0;
                        $tf = 0;
                        $ts = array();
                        foreach ($spotTotalHourly as $challan) { ?>
                    <tr>
                        <td>
                            <?php echo $challan['hr_no'] . "-" . ($challan['hr_no'] + 1); ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>

                        <?php

                                foreach ($stations as $station) {
                                    echo "<td>" . $challan[$station['station_id']] . "</td>";
                                    $ts[$station['station_id']] += $challan[$station['station_id']];
                                }
                                ?>
                    </tr>
                    <?php } ?>
                </tbody>

                <tfooter>
                    <tr>
                        <td>Total</td>
                        <td>
                            <?php echo $t; ?>
                        </td>

                        <?php

                            foreach ($stations as $station) {
                                echo "<td>" . $ts[$station['station_id']] . "</td>";
                            }
                            ?>


                    </tr>

                </tfooter>

            </table>


        </div>
    </div>
</div>
<?php } ?>


<h3>QC Total</h3>
<?php if (!empty($qctotal)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>QC Station</th>
                        <th>Total</th>
                        <th>Pass Total</th>
                        <th>Fail Total</th>
                        <th>Sorry Total</th>
                        <th>Pass (%)</th>
                        <th>Fail (%)</th>
                        <th>Sorry (%)</th>
                        <th>Repeat Cloth Handled Count</th>
                        <th>Repeat Cloth Handled Count%</th>



                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($qctotal as $challan) { ?>
                    <tr>
                        <td>
                            <?php echo $users[$challan['qc_station_id']]; ?>
                        </td>
                        <td>
                            <?php echo $challan['total']; ?>
                        </td>
                        <td>
                            <?php echo $challan['pass_count']; ?>
                        </td>

                        <td>
                            <?php echo $challan['fail_count']; ?>
                        </td>
                        <td>
                            <?php echo $challan['sorry_count']; ?>
                        </td>

                        <td>
                            <?php echo number_format(($challan['pass_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['fail_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['sorry_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo $repeat = $challan['total'] - $challan['uniquebarcode']; ?>
                        </td>
                        <td>
                            <?php echo number_format((($repeat / $challan['total']) * 100), 2); ?>
                        </td>


                    </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>


<h3>QC Total Monthly</h3>
<?php if (!empty($qctotalmonthly)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>QC Station</th>
                        <th>Total</th>
                        <th>Pass Total</th>
                        <th>Fail Total</th>
                        <th>Sorry Total</th>
                        <th>Pass (%)</th>
                        <th>Fail (%)</th>
                        <th>Sorry (%)</th>
                        <th>Repeat Cloth Handled Count</th>
                        <th>Repeat Cloth Handled Count%</th>



                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($qctotalmonthly as $challan) { ?>
                    <tr>
                        <td>
                            <?php echo $users[$challan['qc_station_id']]; ?>
                        </td>
                        <td>
                            <?php echo $challan['total']; ?>
                        </td>
                        <td>
                            <?php echo $challan['pass_count']; ?>
                        </td>

                        <td>
                            <?php echo $challan['fail_count']; ?>
                        </td>
                        <td>
                            <?php echo $challan['sorry_count']; ?>
                        </td>

                        <td>
                            <?php echo number_format(($challan['pass_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['fail_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo number_format(($challan['sorry_count'] / $challan['total']) * 100, 2); ?>
                        </td>
                        <td>
                            <?php echo $repeat = $challan['total'] - $challan['uniquebarcode']; ?>
                        </td>
                        <td>
                            <?php echo number_format((($repeat / $challan['total']) * 100), 2); ?>
                        </td>


                    </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>






<h3>QC Hourly</h3>
<?php if (!empty($qchourly)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
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
                        $t = 0;
                        $tp = 0;
                        $tf = 0;
                        $ts = 0;
                        foreach ($qchourly as $challan) { ?>
                    <tr>
                        <td>
                            <?php echo $challan['hr_no'] . "-" . ($challan['hr_no'] + 1); ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>
                        <td>
                            <?php echo $challan['pass_count'];
                                    $tp += $challan['pass_count']; ?>
                        </td>

                        <td>
                            <?php echo $challan['fail_count'];
                                    $tf += $challan['fail_count']; ?>
                        </td>
                        <td>
                            <?php echo $challan['sorry_count'];
                                    $ts += $challan['sorry_count']; ?>
                        </td>

                        <td>
                            <?php echo round(($challan['pass_count'] / $challan['total']) * 100); ?>
                        </td>
                        <td>
                            <?php echo round(($challan['fail_count'] / $challan['total']) * 100); ?>
                        </td>
                        <td>
                            <?php echo round(($challan['sorry_count'] / $challan['total']) * 100); ?>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>

                <tfooter>
                    <tr>
                        <td>Total</td>
                        <td>
                            <?php echo $t; ?>
                        </td>
                        <td>
                            <?php echo $tp; ?>
                        </td>
                        <td>
                            <?php echo $tf; ?>
                        </td>

                        <td>
                            <?php echo $ts; ?>
                        </td>
                        <td>
                            <?php echo round(($tp / $t) * 100); ?>
                        </td>
                        <td>
                            <?php echo round(($tf / $t) * 100); ?>
                        </td>
                        <td>
                            <?php echo round(($ts / $t) * 100); ?>
                        </td>
                    </tr>

                </tfooter>

            </table>


        </div>
    </div>
</div>
<?php } ?>

<h3>Packing Total</h3>

<?php if (!empty($packingtotal)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Packer ID</th>
                        <th>DC Clothes Packed</th>
                        <th>Laundry Clothes Packed</th>
                        <th>Shoes Packed</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($packingtotal as $challan) {
                            ?>
                    <tr>

                        <td>
                            <?php echo $users[$challan['packing_station_id']]; ?>
                        </td>
                        </td>
                        <td>
                            <?php echo $challan['DC']; ?>
                        </td>
                        </td>
                        <td>
                            <?php echo $challan['Laundry']; ?>
                        </td>
                        </td>
                        <td>
                            <?php echo $challan['Shoe']; ?>
                        </td>
                        </td>
                    </tr>
                    <?php
                        } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>




<h3>Packing Monthly</h3>

<?php if (!empty($packingtotalmonthly)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Packer ID</th>
                        <th>DC Clothes Packed</th>
                        <th>Laundry Clothes Packed</th>
                        <th>Shoes Packed</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($packingtotalmonthly as $challan) {
                            ?>
                    <tr>

                        <td>
                            <?php echo $users[$challan['packing_station_id']]; ?>
                        </td>
                        </td>
                        <td>
                            <?php echo $challan['DC']; ?>
                        </td>
                        </td>
                        <td>
                            <?php echo $challan['Laundry']; ?>
                        </td>
                        </td>
                        <td>
                            <?php echo $challan['Shoe']; ?>
                        </td>
                        </td>
                    </tr>
                    <?php
                        } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>


<h3>Packing Hourly</h3>

<?php if (!empty($packinghourly)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Hr No.</th>
                        <th>Total</th>
                        <?php

                            foreach ($packing_stations as $station) {
                                echo "<th>" . $users[$station['packing_station_id']] . "</th>";
                            }
                            ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $t = 0;
                        $ts = array();
                        foreach ($packinghourly as $challan) { ?>
                    <tr>
                        <td>
                            <?php echo $challan['hr_no'] . "-" . ($challan['hr_no'] + 1); ?>
                        </td>
                        <td>
                            <?php echo $challan['total'];
                                    $t += $challan['total']; ?>
                        </td>
                        <?php

                                foreach ($packing_stations as $station) {
                                    echo "<td>" . $challan[$station['packing_station_id']] . "</td>";

                                    $ts[$station['packing_station_id']] += $challan[$station['packing_station_id']];
                                }
                                ?>

                    </tr>
                    <?php } ?>
                </tbody>

                <tfooter>
                    <tr>
                        <td>Total</td>
                        <td>
                            <?php echo $t; ?>
                        </td>
                        <?php

                            foreach ($packing_stations as $station) {
                                echo "<td>" . $ts[$station['packing_station_id']] . "</td>";
                            }
                            ?>

                    </tr>

                </tfooter>

            </table>


        </div>
    </div>
</div>
<?php } ?>



<h3>Dispatch Report</h3>

<?php if (!empty($dispatchData)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Due Date</th>
                        <th>Total Due Order as on date</th>
                        <!--
                                    <th>Total Due Order Count</th>
                                    <th>Total order dispathed</th>
-->
                        <th>Order Dispatch today</th>
                        <th>Dispatch (%)</th>
                        <th>DC Order Count (Due)</th>
                        <th>DC Order Dispatched</th>
                        <th>DC Order (%)</th>
                        <th>Laundry Order Count (Due)</th>
                        <th>Laundry Order Dispatched</th>
                        <th>Laundry Order (%)</th>
                        <th>Shoe Order Count (Due)</th>
                        <th>Shoe Order Dispatched</th>
                        <th>Shoe Order (%)</th>

                    </tr>
                </thead>
                <tbody>



                    <?php

                        $td = 0;
                        $tdis = 0;
                        $tdc = 0;
                        $tdcd = 0;
                        $l = 0;
                        $ld = 0;
                        $s = 0;
                        $sd = 0;

                        foreach ($dispatchData as $challan) {
                            if (($challan['total'] - $challan['total_dispatch_all']) == 0 && $challan['total_dispatch'] == 0) {
                                continue;
                            }


                            $color = '';


                            $dt = date('d-m-Y', strtotime($dateData));
                            $dt1 = date('d-m-Y', strtotime($challan['Due_on'] . ' -1 days'));

                            if ($dt == $dt1) {
                                $color = "higlight";
                            } ?>
                    <tr class="<?php echo $color; ?>">

                        <td>
                            <?php echo date('d M y', strtotime($challan['Due_on'] . ' -1 days')); ?>
                        </td>


                        <td>
                            <?php echo $due_order_count = $challan['total'] - $challan['total_dispatch_all'] + $challan['total_dispatch'];
                                    $td += $due_order_count; ?>
                        </td>
                        <!--
                                                                         <td><?php echo $challan['total']; ?>
                        </td>

                        <td><?php echo $challan['total_dispatch_all']; ?>
                        </td>
                        -->


                        <td>
                            <?php echo $challan['total_dispatch'];
                                    $tdis += $challan['total_dispatch']; ?>
                        </td>

                        <td>
                            <?php

                                    if ($due_order_count != 0) {
                                        echo $v = number_format(($challan['total_dispatch'] / $due_order_count) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>

                        <td>
                            <?php echo $challan['DC'];
                                    $tdc += $challan['DC']; ?>
                        </td>

                        <td>
                            <?php echo $challan['dc_dispatch'];
                                    $tdcd += $challan['dc_dispatch']; ?>
                        </td>

                        <td>
                            <?php

                                    if ($challan['DC'] != 0) {
                                        echo $v = number_format(($challan['dc_dispatch'] / $challan['DC']) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>
                        <td>
                            <?php echo $challan['Laundry'];
                                    $l += $challan['Laundry']; ?>
                        </td>

                        <td>
                            <?php echo $challan['laundry_dispatch'];
                                    $ld += $challan['laundry_dispatch']; ?>
                        </td>

                        <td>
                            <?php
                                    if ($challan['Laundry'] != 0) {
                                        echo $v = number_format(($challan['laundry_dispatch'] / $challan['Laundry']) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>

                        <td>
                            <?php echo $challan['Shoe'];
                                    $s += $challan['Shoe']; ?>
                        </td>

                        <td>
                            <?php echo $challan['shoe_dispatch'];
                                    $sd += $challan['shoe_dispatch']; ?>
                        </td>

                        <td>
                            <?php

                                    if ($challan['Shoe'] != 0) {
                                        echo $v = number_format(($challan['shoe_dispatch'] / $challan['Shoe']) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>

                    </tr>
                    <?php
                        } ?>

                    <tr>
                        <td>Total</td>
                        <td>
                            <?php echo $td; ?>
                        </td>
                        <td>
                            <?php echo $tdis; ?>
                        </td>
                        <td>
                            <?php

                                if ($td != 0) {
                                    echo number_format(($tdis / $td) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>
                        <td>
                            <?php echo $tdc; ?>
                        </td>
                        <td>
                            <?php echo $tdcd; ?>
                        </td>
                        <td>
                            <?php
                                if ($tdc != 0) {
                                    echo number_format(($tdcd / $tdc) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>

                        <td>
                            <?php echo $l; ?>
                        </td>
                        <td>
                            <?php echo $ld; ?>
                        </td>
                        <td>
                            <?php
                                if ($l != 0) {
                                    echo number_format(($ld / $l) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>

                        <td>
                            <?php echo $s; ?>
                        </td>
                        <td>
                            <?php echo $sd; ?>
                        </td>
                        <td>
                            <?php
                                if ($s != 0) {
                                    echo number_format(($sd / $s) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>


                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php } ?>




<h3>Dispatch Report Monthly</h3>

<?php if (!empty($dispatchDataMonthly)) { ?>
<div class="card">

    <div class="card-body">



        <div class="table-responsive m-t-40">




            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Due Date</th>
                        <th>Total Due Order Count</th>
                        <th>Order Dispatch</th>
                        <th>Dispatch (%)</th>
                        <th>DC Order Count (Due)</th>
                        <th>DC Order Dispatched</th>
                        <th>DC Order (%)</th>
                        <th>Laundry Order Count (Due)</th>
                        <th>Laundry Order Dispatched</th>
                        <th>Laundry Order (%)</th>
                        <th>Shoe Order Count (Due)</th>
                        <th>Shoe Order Dispatched</th>
                        <th>Shoe Order (%)</th>

                    </tr>
                </thead>
                <tbody>

                    <?php


                        $td = 0;
                        $tdis = 0;
                        $tdc = 0;
                        $tdcd = 0;
                        $l = 0;
                        $ld = 0;
                        $s = 0;
                        $sd = 0;



                        foreach ($dispatchDataMonthly as $challan) {
                            ?>
                    <tr>

                        <td>
                            <?php echo date('d-m-Y', strtotime($challan['Due_on'] . ' -1 days')); ?>
                        </td>

                        <td>
                            <?php echo $challan['total'];
                                    $td += $challan['total']; ?>
                        </td>

                        <td>
                            <?php echo $challan['total_dispatch'];
                                    $tdis += $challan['total_dispatch']; ?>
                        </td>

                        <td>
                            <?php

                                    if ($challan['total'] != 0) {
                                        echo $v = number_format(($challan['total_dispatch'] / $challan['total']) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>

                        <td>
                            <?php echo $challan['DC'];
                                    $tdc += $challan['DC']; ?>
                        </td>

                        <td>
                            <?php echo $challan['dc_dispatch'];
                                    $tdcd += $challan['dc_dispatch']; ?>
                        </td>

                        <td>
                            <?php

                                    if ($challan['DC'] != 0) {
                                        echo $v = number_format(($challan['dc_dispatch'] / $challan['DC']) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>
                        <td>
                            <?php echo $challan['Laundry'];
                                    $l += $challan['Laundry']; ?>
                        </td>

                        <td>
                            <?php echo $challan['laundry_dispatch'];
                                    $ld += $challan['laundry_dispatch']; ?>
                        </td>

                        <td>
                            <?php

                                    if ($challan['Laundry'] != 0) {
                                        echo $v = number_format(($challan['laundry_dispatch'] / $challan['Laundry']) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>

                        <td>
                            <?php echo $challan['Shoe'];
                                    $l += $challan['Shoe']; ?>
                        </td>

                        <td>
                            <?php echo $challan['shoe_dispatch'];
                                    $ld += $challan['shoe_dispatch']; ?>
                        </td>

                        <td>
                            <?php

                                    if ($challan['Shoe'] != 0) {
                                        echo $v = number_format(($challan['shoe_dispatch'] / $challan['Shoe']) * 100, 2);
                                    } else {
                                        echo "0.00";
                                    } ?>
                        </td>

                    </tr>
                    <?php
                        } ?>


                    <tr>
                        <td>Total</td>
                        <td>
                            <?php echo $td; ?>
                        </td>
                        <td>
                            <?php echo $tdis; ?>
                        </td>
                        <td>
                            <?php
                                if ($td != 0) {
                                    echo number_format(($tdis / $td) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>
                        <td>
                            <?php echo $tdc; ?>
                        </td>
                        <td>
                            <?php echo $tdcd; ?>
                        </td>
                        <td>
                            <?php
                                if ($tdc != 0) {
                                    echo number_format(($tdcd / $tdc) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>

                        <td>
                            <?php echo $l; ?>
                        </td>
                        <td>
                            <?php echo $ld; ?>
                        </td>
                        <td>
                            <?php
                                if ($l != 0) {
                                    echo number_format(($ld / $l) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>

                        <td>
                            <?php echo $s; ?>
                        </td>
                        <td>
                            <?php echo $sd; ?>
                        </td>
                        <td>
                            <?php
                                if ($s != 0) {
                                    echo number_format(($sd / $s) * 100, 2);
                                } else {
                                    echo "0.00";
                                }
                                ?>
                        </td>


                </tbody>
            </table>


        </div>
    </div>
</div>
<?php }