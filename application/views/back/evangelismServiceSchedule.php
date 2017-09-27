<?php 
    $loggedIn = $this->session->userdata('loggedIn');
?>

<script type="text/javascript">
    $(document).ready(function(){
       $('#datepick').datepicker({
            format: "dd/mm/yyyy",
            daysOfWeekHighlighted: "0",
            autoclose: true,
            todayHighlight: true
        });
    });
                        
</script>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('homeControl/index');?>">Gereja Rehoboth</a>
                <a class="navbar-brand" href="<?php echo base_url('adminControl/index');?>">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            
                <!-- untuk notifikasi -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>

                <!-- untuk logout, profile, settings -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $loggedIn['nama'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('loginControl/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="navbar">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo base_url('Evangelism/index');?>"><i class="fa fa-fw fa-info"></i> Dashboard</a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url('Evangelism/index');?>"><i class="fa fa-fw fa-check-square-o "></i>Approve Schedule</a>
                    </li>
                   <!--  <li>
                        <a href="<?php echo base_url('Evangelism/ViewSchedule');?>"><i class="fa fa-fw fa-calendar"></i>  Services</a>
                    </li> -->
                    <li class="">
                    <li >
                        <a href="<?php echo base_url('Evangelism/ViewSchedule');?>"><i class="fa fa-fw fa-table"></i> Service Schedule</a>
                    </li>
                    
                    <li class="">
                    <li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-calendar"></i> Non-Eventual Schedule <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url('Evangelism/index');?>">Funeral visitation</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('Evangelism/index');?>">Mid-Week Service</a>
                            </li>
                        </ul>
                    </li>
                </ul>
               
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Service Schedule <small>Make and maintain services schedule</small>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-8 ">

                <?php echo form_open('loginControl/prosesLogin');?>
                    <div class="well">
                    <?php if($this->session->flashdata('pesan1')){?>
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <h4>Oops!</h4>
                            <?php echo $this->session->flashdata('pesan1');?>
                        </div>
                    <?php }elseif ($this->session->flashdata('pesan2')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <h4>Something Wrong!</h4>
                            <?php echo $this->session->flashdata('pesan2');?>
                        </div>
                    <?php } ?>
                                                     
                        <div class="form-group">                       
                            <label for="datepicker">Tanggal Melayani</label>
                            <div class="input-group date" id="datepick">
                                <input type="text" class="form-control"/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>        
                        </div>
                        <div class="form-group">
                            <label for="services">Kebaktian</label>
                            <select class="form-control" id="kebaktians">
                                <?php
                                $first=true; // Used to select the first element
                                foreach ($komunitas as $k): /* everything between here and 'endforeach' is part of the loop */ ?>
                                    <option value="<?php echo $k->id_komunitas ?>" <?php if ($first) echo 'selected="selected"'?>>
                                    <?php echo $k->nama_kebaktian;?>
                                    </option>
                                    <?php if ($first) $first = false;?>
                                <?php endforeach ?>
                            </select>
                            <!-- check select option: check valuenya apakah ada atau tidak ada -->
                            <!-- <script type="text/javascript">
                                var kebaktians = document.getElementById( "kebaktians" );
                                alert( kebaktians.options[ kebaktians.selectedIndex ].value );
                            </script> -->
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">
                                <span class="glyphicon glyphicon-saved"></span> Create
                            </button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

</body>

</html>
