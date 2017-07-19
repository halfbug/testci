<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="description" content="">

    <title>CodeIgniter Bootstrap</title>

    <link href="<?php echo base_url(); ?>assets/admin/css/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url(); ?>assets/admin/css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/vendors/chosen/chosen.css" rel="stylesheet">

    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">-->
    <link href="<?php echo base_url(); ?>assets/admin/vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <!--<link href="<?php echo base_url(); ?>vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendors/tags/css/bootstrap-tags.css" rel="stylesheet">-->

    <!--<link href="<?php echo base_url(); ?>css/forms.css" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.form.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-ui1.11.4.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>


    <script src="<?php echo base_url(); ?>assets/admin/vendors/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap3-typeahead.js"></script>

    <script src="<?php echo base_url(); ?>assets/admin/vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
</head>
<body>
<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="http://localhost/testci/welcome/user_update?id=1"> Google Map</a> </li>
<!--                    <li class="dropdown">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><a href="#">Action</a></li>-->
<!--                            <li><a href="#">Another action</a></li>-->
<!--                            <li><a href="#">Something else here</a></li>-->
<!--                            <li role="separator" class="divider"></li>-->
<!--                            <li class="dropdown-header">Nav header</li>-->
<!--                            <li><a href="#">Separated link</a></li>-->
<!--                            <li><a href="#">One more separated link</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
<!--                    <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>-->
                    <li><a href="<?php echo base_url() ?>controllers/welcome1.php">Login</a></li>
                    <li><a href="../navbar-fixed-top/">Register</a></li>0
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>





