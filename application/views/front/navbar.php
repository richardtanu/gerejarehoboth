<body>
    <?php $loggedIn = $this->session->userdata('loggedIn');?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('Home/index');?>">Gereja Rehoboth</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="<?php echo base_url('Home/about');?>">About</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Home/services');?>">Services</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('Home/contact');?>">Contact</a>
                    </li>

                    <?php
                    if($loggedIn != null) { 
                        echo "<script>alert('".$loggedIn['role']."');</script>";
                        if($loggedIn['role'] == 'superadmin'){
                            echo "<li><a href='". base_url('admin/index')."'>Schedule</a></li>";
                        }else
                        if ($loggedIn['role'] == 'Komisi Musik') {
                            echo "<li><a href='". base_url('komisimusik/index')."'>Schedule</a></li>";
                        }
                        if ($loggedIn['role'] == 'Komisi Evangelism') {
                            echo "<li><a href='". base_url('komisipastoral/index')."'>Schedule</a></li>";
                        }
                        ?>
                        <li>
                            <a href="<?php echo base_url('Login/logout')?>">Logout</a>
                        </li> 
                    <?php 
                    }else{
                    ?>
                        <li>
                            <a href="<?php echo base_url('Login/index')?>">Login</a>
                        </li>
                    <?php
                    }
                    ?>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>