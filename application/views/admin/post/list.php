<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo APP_NAME . ' | ' . APP_DESCRIPTION ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/admin/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/admin/custom.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/admin/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <script src="<?php echo base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            
            <?php $this->load->view('admin/template/header');?>

            <?php $this->load->view('admin/template/nav');?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Simple</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header">

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Condensed Full Width Table</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-condensed">
                                        <tbody><tr>
                                                <th style="width: 10px">#</th>
                                                <th>Task</th>
                                                <th>Progress</th>
                                                <th style="width: 40px">Label</th>
                                            </tr>
                                            <tr>
                                                <td>1.</td>
                                                <td>Update software</td>
                                                <td>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-red">55%</span></td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Clean database</td>
                                                <td>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-yellow">70%</span></td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Cron job running</td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light-blue">30%</span></td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Fix and squish bugs</td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-green">90%</span></td>
                                            </tr>
                                        </tbody></table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            
            <?php $this->load->view('admin/template/footer'); ?>
            
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->


        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/js/admin/adminlte.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/admin/demo.js"></script>
    </body>
</html>
