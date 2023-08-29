<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon.png">
    <title>
        <?php echo isset($page_title) ? $page_title : "tumbledry"; ?>
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <!--
    <link href="<?php echo base_url() ?>assets/plugins/chartist-js/dist/chartist.min.css"
    rel="stylesheet">
    <link
        href="<?php echo base_url() ?>assets/plugins/chartist-js/dist/chartist-init.css"
        rel="stylesheet">
    -->
    <!--
    <link href="<?php echo base_url() ?>assets/plugins/chartist-plugin-tooltip-master/dist/
    chartist-plugin-tooltip.css" rel="stylesheet">
    -->
    <link href="<?php echo base_url() ?>assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- toast CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="<?php echo base_url() ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />



    <!--Form css plugins -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/multiselect/css/multi-select.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet" />
    <!--Form css plugins end -->


    <!-- Vector CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Calendar CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- summernotes CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- wysihtml5 CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <!-- Dropzone css -->
    <link href="<?php echo base_url() ?>assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet"
        type="text/css" />
    <!-- Cropper CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/cropper/cropper.min.css" rel="stylesheet">

    <!-- Footable CSS -->
    <link href="<?php echo base_url() ?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

    <!-- Date picker plugins css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css"
        rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/prettyPhoto.css" media="screen" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url() ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!-- Font Awesome Icon -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free-6.4.2-web/css/all.min.css">
    <style>
    .con {
        font-size: 14px !important;
    }

    table tbody td {
        padding: 4px !important;
    }

    #main-wrapper div .container-fluid {
        padding: 0;
    }

    #main-wrapper div .container-fluid .page-titles {
        margin: 0px 5px 0px 5px;
        padding: 8px 8px 8px 5px !important;
    }

    #main-wrapper div .container-fluid .col-12 .card:nth-of-type(1) .card-body {
        padding-top: 15px !important;
    }

    #main-wrapper div .container-fluid .col-12 .card:nth-of-type(2) .card-body {
        padding: 0px 10px 10px 10px;
    }
    </style>
</head>

<body class="fix-header fix-sidebar card-no-border ">

    <!-- Preloader - style you can find in spinners.css -->

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <!-- Main wrapper - style you can find in pages.scss -->

    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <!-- Logo -->

                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('admin/dashboard') ?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!--
                            <img src="<?php echo base_url() ?>assets/images/logo-icon.png"
                            alt="homepage"
                            class="dark-logo" />
                            -->
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url() ?>assets/images/logo-light-icon.png" alt="homepage"
                                class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <!--
                            <img src="<?php echo base_url() ?>assets/images/logo-text.png"
                            alt="homepage"
                            class="dark-logo" />
                            -->
                            <!-- Light Logo text -->
                            <img src="<?php echo base_url() ?>assets/images/logo-light-text.png" class="light-logo"
                                alt="homepage" />
                        </span>
                    </a>
                </div>

                <!-- End Logo -->

                <div class="navbar-collapse">

                    <!-- toggle and nav items -->

                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a
                                class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                        <!-- Search -->

                        <li class="nav-item hidden-sm-down search-box">
                            <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>

                        <!-- Messages -->

                        <li class="nav-item dropdown mega-dropdown"> <a
                                class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="mdi mdi-view-grid"></i></a>
                            <div class="dropdown-menu scale-up-left">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">REPORTS</h4>
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Another fifth link</a></li>
                                        </ul>
                                        <!-- CAROUSEL -->
                                        <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="<?php echo base_url() ?>assets/images/big/img1.jpg"
                                        alt="First slide">
                            </div>
                </div>
                <div class="carousel-item">
                    <div class="container"><img class="d-block img-fluid"
                            src="<?php echo base_url() ?>assets/images/big/img2.jpg"
                            alt="Second slide"></div>
                </div>
                <div class="carousel-item">
                    <div class="container"><img class="d-block img-fluid"
                            src="<?php echo base_url() ?>assets/images/big/img3.jpg"
                            alt="Third slide"></div>
                </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span
            class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span
            class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div> -->
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">REPORTS</h4>
                                        <!-- Accordian -->
                                        <!-- <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">REPORTS</h4>
                                        <!-- Contact -->
                                        <!-- <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form> -->
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">REPORTS</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                    Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- End Messages -->



                    </ul>

                    <!-- User profile and search -->

                    <ul class="navbar-nav my-lg-0">

                        <!-- Comment -->

                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a> -->
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that
                                                        you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this
                                                        template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumarr</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                                notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- End Comment -->


                        <!-- Messages -->

                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a> -->
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img
                                                        src="<?php echo base_url() ?>assets/images/users/1.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img
                                                        src="<?php echo base_url() ?>assets/images/users/2.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See
                                                        you at</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img
                                                        src="<?php echo base_url() ?>assets/images/users/3.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span>
                                                    <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img
                                                        src="<?php echo base_url() ?>assets/images/users/4.jpg"
                                                        alt="user" class="img-circle"> <span
                                                        class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                                e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- End Messages -->



                        <!-- Profile -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user"
                                    class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img
                                                    src="<?php echo base_url() ?>assets/images/users/1.jpg" alt="user">
                                            </div>
                                            <div class="u-text">
                                                <h4>
                                                    <?php echo $this->session->userdata('name'); ?>
                                                </h4>
                                                <p class="text-muted">
                                                    <?php echo $this->session->userdata('email'); ?>
                                                </p><a href="profile.html"
                                                    class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <!-- <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li> -->
                                    <!-- <li role="separator" class="divider"></li> -->
                                    <!-- <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> -->
                                    <!-- <li role="separator" class="divider"></li> -->
                                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i>
                                            Logout</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Language -->

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>

        <!-- End Topbar header -->












        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <aside class="left-sidebar">


            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="m-0 p-0">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa fa-pencil-square-o con"></i><span
                                    class="hide-menu font-weight-normal">Initial Stage</span></a>

                            <ul aria-expanded="false" class="collapse">


                                <li><a href="<?php echo base_url('admin/reports/initial') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Initial
                                            Stage Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/initialcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/initialtotal') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/initialhourly') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Report
                                            Hourly</span></a></li>


                            </ul>
                        </li>


                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-arrows-to-circle con"></i><span
                                    class="hide-menu font-weight-normal">Spotting Stage</span></a>

                            <ul aria-expanded="false" class="collapse">


                                <li><a href="<?php echo base_url('admin/reports/spotcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/spottotal') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/spothourly') ?>"><i
                                            class="fa fa-angle-right"></i> <span class=" font-weight-normal">Report
                                            Hourly</span></a></li>


                            </ul>
                        </li>




                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-medal con"></i><span class="hide-menu font-weight-normal">Quality
                                    Checking</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/qccomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/qcreport') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Quality
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/qcreporthourly') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Quality
                                            Report Hourly</span></a></li>




                            </ul>
                        </li>




                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-suitcase con"></i><span
                                    class="hide-menu font-weight-normal">Packaging</span></a>

                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/packagingcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/packagingall') ?>"><i
                                            class="fa fa-angle-right"></i><span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/packaging') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Packing
                                            Hourly</span></a></li>




                            </ul>
                        </li>

                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-camera con"></i><span
                                    class="hide-menu font-weight-normal">Photo</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/photocomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/photoall') ?>"><i
                                            class="fa fa-angle-right"></i><span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/photo') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Photo
                                            Hourly</span></a></li>

                            </ul>
                        </li>

                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-vest-patches con"></i><span
                                    class="hide-menu font-weight-normal">Tailor</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/tailorcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/tailorall') ?>"><i
                                            class="fa fa-angle-right"></i><span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/tailor') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Tailor
                                            Hourly</span></a></li>

                            </ul>
                        </li>




                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-arrows-rotate con"></i><span
                                    class="hide-menu font-weight-normal">Lot Making</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/lotcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/lotall') ?>"><i
                                            class="fa fa-angle-right"></i><span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/lot') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Lot
                                            Hourly</span></a></li>

                            </ul>
                        </li>



                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-jug-detergent con"></i><span
                                    class="hide-menu font-weight-normal">Washing</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/washcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/washall') ?>"><i
                                            class="fa fa-angle-right"></i><span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/wash') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Wash
                                            Hourly</span></a></li>

                            </ul>
                        </li>


                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-wind con"></i><span
                                    class="hide-menu font-weight-normal">Dry</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/drycomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/dryall') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/dry') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Dry
                                            Hourly</span></a></li>

                            </ul>
                        </li>


                        <li class="m-0 p-0">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa fa-pencil-square-o con"></i><span
                                    class="hide-menu font-weight-normal">Iron Lot</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/ironlotcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/ironlotall') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/ironlot') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Iron Lot
                                            Hourly</span></a></li>

                            </ul>
                        </li>



                        <li class="m-0 p-0">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa fa-pencil-square-o con"></i><span
                                    class="hide-menu font-weight-normal">Iron</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/ironcomplete') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Complete</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/ironall') ?>"><i
                                            class="fa fa-angle-right"></i><span class="font-weight-normal">Total
                                            Report</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/iron') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Iron
                                            Hourly</span></a></li>

                            </ul>
                        </li>



                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-store con"></i><span
                                    class="hide-menu font-weight-normal">Vendor</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <!-- <li><a href="<?php echo base_url('admin/reports/shoes') ?>"><i
                                            class="fa fa-angle-right"></i> Shoes</a></li>

                                <li><a href="<?php echo base_url('admin/reports/shoeschallan') ?>"><i
                                            class="fa fa-angle-right"></i> Shoes Challan</a></li>


                                <li><a href="<?php echo base_url('admin/reports/carpet') ?>"><i
                                            class="fa fa-angle-right"></i> Carpet</a></li>

                                <li><a href="<?php echo base_url('admin/reports/carpetchallan') ?>"><i
                                            class="fa fa-angle-right"></i> Carpet Challan</a></li>

                                <li><a href="<?php echo base_url('admin/reports/raffu') ?>"><i
                                            class="fa fa-angle-right"></i> Raffu</a></li>

                                <li><a href="<?php echo base_url('admin/reports/raffuchallan') ?>"><i
                                            class="fa fa-angle-right"></i> Raffu Challan</a></li> -->

                                <li><a href="<?php echo base_url('admin/reports/report') ?>"><i
                                            class="fa fa-angle-right"></i> <span
                                            class="font-weight-normal">Report</span></a></li>


                            </ul>
                        </li>



                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark"
                                href="<?php echo base_url('admin/reports/pendingreport') ?>" aria-expanded="false"><i
                                    class="fa-solid fa-file-circle-exclamation con"></i><span
                                    class="hide-menu font-weight-normal">Pending Garment
                                    Report</span></a>
                        </li>


                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark"
                                href="<?php echo base_url('admin/reports/garmentreport') ?>" aria-expanded="false"><i
                                    class="fa-solid fa-file-lines con"></i><span
                                    class="hide-menu font-weight-normal">Garment
                                    Report</span></a>
                        </li>



                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark" href="<?php echo base_url('admin/reports/missingyn') ?>"
                                aria-expanded="false"><i class="fa-regular fa-circle-question con"></i><span
                                    class="hide-menu font-weight-normal">Missing
                                    Garment Report</span></a>
                        </li>



                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark" href="<?php echo base_url('admin/reports/imgreport') ?>"
                                aria-expanded="false"><i class="fa-solid fa-image con"></i><span
                                    class="hide-menu font-weight-normal">Garment
                                    Image</span></a>
                        </li>




                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark"
                                href="<?php echo base_url('admin/reports/pendingorderreport') ?>"
                                aria-expanded="false"><i class="fa-solid fa-clock-rotate-left con"></i><span
                                    class="hide-menu font-weight-normal">Order
                                    Status</span></a>
                        </li>


                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark"
                                href="<?php echo base_url('admin/reports/orderpriority') ?>" aria-expanded="false"><i
                                    class="fa-solid fa-list-ol con"></i><span class="hide-menu font-weight-normal">Order
                                    Priority</span></a>
                        </li>

                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark"
                                href="<?php echo base_url('admin/reports/orderstatuspriority') ?>"
                                aria-expanded="false"><i class="mdi mdi-gauge con"></i><span
                                    class="hide-menu font-weight-normal">Order Status
                                    Priority</span></a>
                        </li>

                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark"
                                href="<?php echo base_url('admin/reports/printpackinglabel') ?>"
                                aria-expanded="false"><i class="fa-solid fa-barcode con"></i><span
                                    class="hide-menu font-weight-normal">Print Packing
                                    Label</span></a>
                        </li>

                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark"
                                href="<?php echo base_url('admin/reports/exceptionreport') ?>" aria-expanded="false"><i
                                    class="fa-solid fa-triangle-exclamation con"></i><span
                                    class="hide-menu font-weight-normal">Exception
                                    Report</span></a>
                        </li>


                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-truck-fast con"></i><span
                                    class="hide-menu font-weight-normal">Dispatch</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/reports/readytodispatch') ?>"><i
                                            class="fa fa-angle-right"></i><span class="font-weight-normal">Ready to
                                            Dispatch</span> </a></li>

                                <li><a href="<?php echo base_url('admin/reports/quickwing') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Quick
                                            Win</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/otherreadytodispatch') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Other Ready
                                            to Dispatch</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/dispatchreport') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Dispatch
                                            Order</span></a></li>

                                <li><a href="<?php echo base_url('admin/reports/sendchallan') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Send
                                            Challan</span></a></li>


                                <li><a href="<?php echo base_url('admin/reports/cancelledorder') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Cancel
                                            Order</span></a></li>



                            </ul>
                        </li>


                        <li class="m-0 p-0">

                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa-solid fa-file-import con"></i><span
                                    class="hide-menu font-weight-normal">Import</span></a>

                            <ul aria-expanded="false" class="collapse">


                                <li><a href="<?php echo base_url('admin/import/importchallandata') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Import
                                            Challan Data</span></a></li>

                                <li><a href="<?php echo base_url('admin/import/importstorechallandata') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Import Store
                                            Challan Data</span></a></li>

                                <li><a href="<?php echo base_url('admin/import/challandata') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Challan
                                            Data</span></a></li>

                                <li><a href="<?php echo base_url('admin/import/challanautodata') ?>"><i
                                            class="fa fa-angle-right"></i> <span class="font-weight-normal">Import Auto
                                            Challan data</span></a></li>


                            </ul>
                        </li>



                        <li class="m-0 p-0">
                            <a class="waves-effect waves-dark" href="<?php echo base_url('admin/dashboard') ?>"
                                aria-expanded="false"><i class="fa-solid fa-chart-pie con"></i><span
                                    class="hide-menu font-weight-normal">Dashboard</span></a>
                        </li>

                        <li class="m-0 p-0">
                            <a class="has-arrow waves-effect waves-dark"
                                href="<?php echo base_url('admin/user/all_user_list') ?>" aria-expanded="false"><i
                                    class="fa fa-user con"></i><span
                                    class="hide-menu font-weight-normal">User</span></a>
                            <ul aria-expanded="false" class="collapse">

                                <?php if ($this->session->userdata('role') == 'admin'): ?>

                                <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-angle-right con"></i>
                                        <span class="font-weight-normal">Add User</span></a></li>
                                <li><a href="<?php echo base_url('admin/user/power') ?>"><i
                                            class="fa fa-angle-right con"></i> <span class="font-weight-normal">Add User
                                            Power</span></a></li>
                                <?php else: ?>

                                <?php if (check_power(1)): ?>

                                <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-angle-right"></i>
                                        <span class="font-weight-normal">Add User</span> </a></li>
                                <?php endif; ?>
                                <?php endif ?>

                                <li><a href="<?php echo base_url('admin/user/all_user_list') ?>"><i
                                            class="fa fa-angle-right con"></i> <span class="font-weight-normal">All
                                            Users</span></a></li>
                            </ul>
                        </li>


                        <li class="m-0 p-0">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="fa fa-shopping-cart con"></i><span
                                    class="hide-menu font-weight-normalfont-weight-normal">Master</span></a>
                            <ul aria-expanded="false" class="collapse">



                                <li><a href="<?php echo base_url('admin/store') ?>"><i
                                            class="fa fa-angle-right con"></i>
                                        <span class="font-weight-normal">Stores</span> </a></li>


                            </ul>
                        </li>






                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="#" class="link" data-toggle="tooltip" title="My Profile"><i class="ti-user"></i></a>
                <!-- item-->
                <a href="<?php echo base_url('auth/logout') ?>" class="link" data-toggle="tooltip" title="Logout"><i
                        class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->



        </aside>

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->











        <!-- Page wrapper  -->

        <div class="page-wrapper">




            <!-- ==========================Dynamicaly Show Main Page Content============================ -->

            <?php echo $main_content; ?>

            <!-- ==========================Dynamicaly Show Main Page Content============================ -->




            <!-- footer -->

            <footer class="footer">
                © 2019 !< </footer>

                    <!-- End footer -->

        </div>

        <!-- End Page wrapper  -->




    </div>



    <!-- End Wrapper -->





    <!-- All Jquery -->

    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js">
    </script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/popper.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js">
    </script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js">
    </script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js">
    </script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.js">
    </script>


    <!-- Calendar JavaScript -->
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.js">
    </script>
    <script src='<?php echo base_url() ?>assets/plugins/calendar/dist/fullcalendar.min.js'>
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/calendar/dist/jquery.fullcalendar.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/calendar/dist/cal-init.js">
    </script>

    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js">
    </script>



    <!-- sparkline chart -->
    <script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js">
    </script>

    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/jquery.sweet-alert.custom.js">
    </script>

    <!-- toast notification CSS -->
    <script src="<?php echo base_url() ?>assets/plugins/toast-master/js/jquery.toast.js">
    </script>
    <script src="<?php echo base_url() ?>assets/js/toastr.js"></script>


    <!-- Invoice print JS -->
    <script src="<?php echo base_url() ?>assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {

        $('#barcode-label').keyup(function() {



            if ($(this).val().substr($(this).val().length - 1) == '*' && $(this).val().length > 1) {
                $('#print_label').submit();
            }

        });



        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>


    <!-- Start Table js -->

    <!-- This is data table js -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons-2.4.1/js/dataTables.buttons.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons-2.4.1/js/buttons.flash.min.js"></script> -->
    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script> -->
    <!-- <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script> -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons-2.4.1/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons-2.4.1/js/buttons.print.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' +
                                group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });


        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>

    <!-- Editable datatable-->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatables-editable/jquery.dataTables.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/tiny-editable/mindmup-editabletable.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/tiny-editable/numeric-input-example.js">
    </script>
    <script>
    $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
    $('#editable-datatable').editableTableWidget().numericInputExample().find('td:first').focus();
    $(document).ready(function() {
        $('#editable-datatable').DataTable();
    });
    </script>

    <!-- End Table js -->







    <!-- Start Forms js -->

    <script src="<?php echo base_url() ?>assets/js/validation.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/summernote/dist/summernote.min.js">
    </script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation()
    }(window, document, jQuery);
    // $(".touchspin").TouchSpin(), $(
    //         ".switchBootstrap").bootstrapSwitch();
    // $(".skin-square input").iCheck({
    //         checkboxClass: "icheckbox_square-green",
    //         radioClass: "iradio_square-green"
    //     }),
    </script>

    <script src="<?php echo base_url() ?>assets/plugins/switchery/dist/switchery.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"
        type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"
        type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.prettyPhoto.js"></script>
    <!--     <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script> -->
    <script>
    function clotheDetails() {
        var id = this.id;
        var split_id = id.split('_');
        var orderId = split_id[1];
        var storeId = split_id[2];

        var tooltipText = "";
        $.ajax({
            url: 'https://centuryfasteners.in/tumbleqr/admin/reports/getCloths',
            type: 'post',
            async: false,
            data: {
                orderId: orderId,
                storeId: storeId
            },
            success: function(response) {
                tooltipText = response;
            }
        });
        return tooltipText;
    }


    jQuery(document).ready(function() {

        $("a[rel^='prettyPhoto']").prettyPhoto();
        days = $('input[name="filter_days"]').val();

        var start = moment().subtract(days, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            $('input[name="ss_from_date"]').val(start.format('YYYY-MM-D'));
            $('input[name="ss_to_date"]').val(end.format('YYYY-MM-D'));



        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 2 Days': [moment().subtract(2, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            }
        }, cb);

        cb(start, end);


        //ToolTip


        $('.tooltip-cloth').tooltip({
            delay: 500,
            placement: "bottom",
            title: "Garment 1",
            html: true
        });



        $('#store_id_voucher').select2({
            placeholder: 'Select Store ID'
        });

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });



        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        /*
                $('#pre-selected-options').multiSelect();
                $('#optgroup').multiSelect({
                    selectableOptgroup: true
                });
        */
        /*
                $('#public-methods').multiSelect();
                $('#select-all').click(function() {
                    $('#public-methods').multiSelect('select_all');
                    return false;
                });
                $('#deselect-all').click(function() {
                    $('#public-methods').multiSelect('deselect_all');
                    return false;
                });
                $('#refresh').on('click', function() {
                    $('#public-methods').multiSelect('refresh');
                    return false;
                });
                $('#add-option').on('click', function() {
                    $('#public-methods').multiSelect('addOption', {
                        value: 42,
                        text: 'test 42',
                        index: 0
                    });
                    return false;
                });
        */
        /*
                $(".ajax").select2({
                    ajax: {
                        url: "https://api.github.com/search/repositories",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function(data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatRepo, // omitted for brevity, see the source of this page
                    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                });
        */
    });
    </script>
    <!-- End form js -->







    <!-- auto hide message div-->
    <script type="text/javascript">
    $(document).ready(function() {
        $('.delete_msg').delay(3000).slideUp();
    });



    function clickImage(barcode, garment = '') {
        // alert(barcode);
        $.ajax({
            url: '<?php echo base_url('admin/reports/getimage') ?>',
            type: 'post',
            data: {
                barcode: barcode,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                $('.modal-title').html(garment + ' ' + barcode);

                // Display Modal
                $('#responsive-modal').modal('show');
            }
        });
    }
    </script>



    <!-- Style switcher -->

    <script src="<?php echo base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js">
    </script>


</body>

</html>