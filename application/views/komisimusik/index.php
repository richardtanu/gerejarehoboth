<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rehoboth! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- iCheck -->
    <!-- <link href="<?php echo base_url();?>assets/admin/iCheck/skins/flat/blue.css" rel="stylesheet"> -->
    <link href="<?php echo base_url();?>assets/admin/iCheck/skins/all.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/jquery_timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/jquery-ui/jquery-ui.css" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url();?>assets/admin/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url();?>assets/admin/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url();?>assets/admin/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url();?>assets/admin/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/admin/production/css/custom.min.css" rel="stylesheet">

    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Rehoboth</span></a>
            </div>

            <div class="clearfix"></div>

            <br/>

            <!-- sidebar menu -->
            <?php
              require_once ('application/views/admin/sidebar.php');
            ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="#" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green" id="new_count_message">
                      <?php $DB1 = $this->load->database('testdb', TRUE);
                            echo $DB1->where('read_status',0)->count_all_results('notifikasi');?>
                    </span>
                  </a>  
                  <!-- notif message looping -->
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span>
                          <span>Ini harusnya pake pagination</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="page-title">
              <div class="title_left">
                <h3>What's going on?!</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <h1>NASI CAMPUR BINTANG</h1>
              <h6>Jl. Kelenteng no.123</h6>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/admin/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/admin/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/admin/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/admin/production/js/moment/moment.min.js"></script>
    <!-- Custom Theme Scripts -->
    <!-- <script src="<?php echo base_url();?>assets/admin/production/js/custom.min.js"></script> -->
  

    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/admin/iCheck/icheck.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/admin/js/datepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>assets/admin/starrr/dist/starrr.js"></script>
    <script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>">
    </script>
    <script>
    $(document).ready(function(){

      $('#submit_event').click( function() {

        // e.preventDefault();
        // var ckbox = new Array();
        // $("input:checked").each(function() {
        //    ckbox['komisi[]'].push($(this).val());
        // });
        // var check =  $("#event_description").val();
        // alert(check);
        var eventName = $("#event_name").val();
        var date = $("#event_date").val();
        var start =  $("#event_time_start").val();
        var end = $("#event_time_end").val();
        var desc = $("#event_description").val();

        // var sentData = {
        //   'name' : $("#event_name").val(),
        //   'date' : $("#event_date").val(),
        //   'start' : $("#event_time_start").val(),
        //   'end' : $("#event_time_end").val(),
        //   'desc' : $("#event_description").val(),
        // };
        // // var dataString = {
        //   var  eventName = $("#event_name").val();
        //   var  eventDate = $("#event_date").val();
        //   var  start = $("#event_time_start").val();
        //   var end = $("#event_time_end").val();
        //   var  eventDescription = $("#event_description").val();
            // check : ckbox
          // };

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/add_events');?>",
          data: {
            event_name : eventName,
            event_date : date,
            event_time_start : start,
            event_time_end : end,
            event_description : desc,
            
          },
          dataType: "json",
          // contentType: "application/json; charset=utf-8",
          success: function(data){
     
              if(data.success == true){
                $('#confirmation_success').modal('show');

                var StartEnd = start +"-"+ end;
                // $('#notif').html(data.notif);
                $(".modal-body .modal_table .modal_event_name #modal_event_name").html(eventName);
                $(".modal-body .modal_table .modal_event_date #modal_event_date").html(date);
                $(".modal-body .modal_table .modal_start_end #modal_start_end").html(StartEnd);

                $("#event_name").val('');
                $("#event_date").val('');
                $("#event_time_start").val('');
                $("#event_time_end").val('');
                $("#event_description").val('');

                
                var socket = io.connect( 'http://'+window.location.hostname+':3000' );
                socket.emit('new_notif', { 
                  user: data.user_who_created,
                  the_notif: data.notification,
                  created_at: data.created_at,
                  id_event: data.id_event,
                  count_notif: data.count_notif
                });

              } else if (data.success == false) {

                $('#notif').html(data.notif);
                //  alert("totaly fail!");

              }
          } ,error: function(xhr, status, error) {
            console.log(error);
          }
        });
        // return false;
      });
      // return false;
    });
    var socket = io.connect( 'http://'+window.location.hostname+':3000' );
    socket.on("new_notif", function( data ) {
      $( "#new_count_message" ).html( data.count_notif );

    });
    </script>
  </body>
</html>