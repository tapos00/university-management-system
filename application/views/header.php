<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>University Management System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>css/myStyle.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
        <script>
       
        </script>
    </head>
    <body>
        <div class="container">
            <header>
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">University Management System</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="mynavs">
                                <li class="<?php echo active_link('department'); ?>"><a href="<?php echo site_url('department'); ?>">Department Entry</a></li>
                                <li class="<?php echo active_link('course'); ?>"><a href="<?php echo site_url('course'); ?>">Course Entry</a></li> 
                                <li class="<?php echo active_link('teacher'); ?>"><a href="<?php echo site_url('teacher'); ?>">Teacher Entry</a></li> 
                                <li class="<?php echo active_link('assing'); ?>"><a href="<?php echo site_url('assing'); ?>">Assign Course</a></li> 
                                <li class="<?php echo active_link('viewCourse'); ?>"><a href="<?php echo site_url('viewcourse'); ?>">Course Info</a></li>
                                <li class="<?php echo active_link('student'); ?>"><a href="<?php echo site_url('student'); ?>">Student Entry</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Info <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="<?php echo active_link('enrollCourse'); ?>"><a href="<?php echo site_url('enrollCourse'); ?>">Course Enroll</a></li>
                                        <li class="<?php echo active_link('result'); ?>"><a href="<?php echo site_url('result'); ?>">Student Result</a></li>
                                        <li class="<?php echo active_link('allocate'); ?>"><a href="<?php echo site_url('allocate'); ?>">allocate</a></li>
                                        <li class="divider"></li>
                                        <li class="<?php echo active_link('viewResult'); ?>"><a href="<?php echo site_url('viewResult'); ?>">View Result</a></li>

                                        <li class="divider"></li>
                                        <li class="<?php echo active_link('class_schedule'); ?>"><a href="<?php echo site_url('class_schedule'); ?>">Class Schedule</a></li>
                                        <li class="<?php echo active_link('unassign'); ?>"><a href="<?php echo site_url('unassign/course'); ?>">Unassign Course</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>
            