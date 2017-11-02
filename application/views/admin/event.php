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
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">
                    <?php $var = $this->session->userdata('loggedIn'); 
                          echo $var['username']." ";
                    ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href=""> Profile</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('Login/logout');?>">
                        <i class="fa fa-sign-out pull-right">
                      </i> Log Out</a>
                    </li>
                  </ul>
                </li>
                <!-- NOTIF GOES HERE -->
                <li id="li_notif" role="presentation" class="dropdown">
                  <a id="click_me_please" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span id="count_message" class="badge bg-green" >0</span>
                  </a>  

                  <ul class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                        <!-- news feed goes here -->
                       <ul id="news_feed">
                         
                       </ul>
                    </li>
              
                    <!-- pagination page link down here -->
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                    <!-- pagination page link down here -->

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
                <h3>Adding Events</h3>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_title">
                    <h2>Event Form</h2>
                    <div class="clearfix"></div>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <div class="clearfix"></div>
                </div>
                <!-- <div id="notif"></div> -->
                <div class="x_content">
                  <form class="form-horizontal form-label-left input_mask" method="POST" >
                    <!-- DATE, EVENT NAME, DATE ALT -->
                    <div class="form-group col-md-12">
                      <div class="col-md-3">
                        <label>Pick Date</label>
                        <div id="event_date_alt"></div>
                      </div>
                     
                    
                      <div class="col-md-9 form-group has-feedback">
                      
                        <label>Event name</label>
                        <input class="form-control has-feedback-right" name="event_name" id="event_name" type="text" >
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        <?php echo form_error('event_name'); ?>
                        <br>
                        <label>Pick Date</label>
                        <input class="form-control" name="event_date" id="event_date" type="text" >  
                        <?php echo form_error('event_date'); ?>
                      </div>
                      <div class="col-md-3"></div>
                    </div>
                    <!-- DATE, EVENT NAME, DATE ALT -->
                    <!-- START TIME, END TIME, DESCRIPTION -->
                    <div class="form-group col-md-12">
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <label>Start time</label>
                          <input class="form-control" name="event_time_start" id="event_time_start" type="text" >
                          <?php echo form_error('event_time_start'); ?>
                          <!-- <div id="event_time_start_alt"></div> -->
                        </div>
                        <div class="col-md-6">
                          <label>End time</label>
                          <input class="form-control" name="event_time_end" id="event_time_end" type="text" >
                          <?php echo form_error('event_time_end'); ?>
                          <!-- <div id="event_time_end_alt"></div> -->
                        </div>
                        <div class="col-md-6">
                          <br>
                          <label>Event Description</label>
                          <textarea class="form-control" rows="5" name="event_description" id="event_description"></textarea>
                          <?php echo form_error('event_description'); ?>
                        </div>
                      </div>
                    </div>
                    <!-- START TIME, END TIME, DESCRIPTION -->
                    <!-- CHECKBOXES -->
                    <div class="form-group col-md-12">
                      <h3>What we need?</h3>
                      <P>Check the comission that involved in this event. By manually check the comission, we'll notify the leader of the comission about created event.</P><BR>
                      <div class="col-md-12">
      
                       <!--  <?php foreach ($result as $key) { ?>
                          <div class="col-md-6" style="padding-top: 8px !important">
                              <input class="checkbox" type="checkbox" name="komisi[]" id="ckbx_<?php echo $key->nama_komisi;?>" value="<?php echo $key->nama_komisi;?>"> <?php echo $key->nama_komisi;?>
                              </input>
                          </div>
                        <?php } ?> -->
                        
                      </div>
                    </div>
                    <!-- CHECKBOXES -->
                    <!-- BUTTON SUBMIT, RESET -->
                    <div class="col-md-12">
                      <div class="col-md-12 center">
                        <input class="btn btn-success" type="button" name="submit_event" value="submit" id="submit_event">
                        <input class="btn btn-default" type="reset" name="reset_event_form">
                      </div>
                    </div>
                    <!-- BUTTON SUBMIT, RESET -->
                  </form>
                </div>
                <div class="clearfix"></div>
              </div>
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

    
    <!-- MODAL FOR CONFIRMATION -->
    <div id="confirmation_success" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Data added successfuly!</h4>
          </div>
          <div class="modal-body">
            <p>You have successfully add the following data! The notification was sent to all Head of commission. Make sure you check the completeness of the event's needs(volunteer, equipment, etc). <br> The event will be posted at the calendar in homepage.</p><br>
            <table class="modal_table table">
              <tr class="modal_event_name">
                <td>Event Name</td>
                <td id='modal_event_name'> </td>
              </tr>
              <tr class="modal_event_date">
                <td>Date</td>
                <td id='modal_event_date'> </td>
              </tr>
              <tr class="modal_start_end">
                <td>Start - End</td>
                <td id='modal_start_end'> </td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Procced</button>
          </div>
        </div>
      </div>
    </div>
    <div id="data_success" data-toggle="modal" data-target="#confirmation_success"></div>
    <!-- MODAL FOR CONFIRMATION -->
    <!-- MODAL FOR  -->

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
    <!-- fullcalendar -->
    <!-- <script src="<?php echo base_url();?>assets/admin/fullcalendar/dist/fullcalendar.min.js"></script> -->
    <!-- Custom Theme Scripts -->
    <!-- <script src="<?php echo base_url();?>assets/admin/production/js/custom.min.js"></script> -->
  
    <!-- jquery datetimepicker addons -->
    <script src="<?php echo base_url();?>assets/admin/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/admin/jquery_timepicker/jquery-ui-timepicker-addon.js"></script>
    <script src="<?php echo base_url();?>assets/admin/jquery_timepicker/jquery-ui-sliderAccess.js"></script>

    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/admin/iCheck/icheck.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/admin/js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <!-- <script src="<?php echo base_url();?>assets/admin/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets/admin/jquery.hotkeys/jquery.hotkeys.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets/admin/google-code-prettify/src/prettify.js"></script> -->
    <!-- jQuery Tags Input -->
    <!-- <script src="<?php echo base_url();?>assets/admin/jquery.tagsinput/src/jquery.tagsinput.js"></script> -->
    <!-- Switchery -->
    <!-- <script src="<?php echo base_url();?>assets/admin/switchery/dist/switchery.min.js"></script> -->
    <!-- Select2 -->
    <!-- <script src="<?php echo base_url();?>assets/admin/select2/dist/js/select2.full.min.js"></script> -->
    <!-- Parsley -->
    <!-- <script src="<?php echo base_url();?>assets/admin/parsleyjs/dist/parsley.min.js"></script> -->
    <!-- Autosize -->
    <!-- <script src="<?php echo base_url();?>assets/admin/autosize/dist/autosize.min.js"></script> -->
    <!-- jQuery autocomplete -->
    <!-- <script src="<?php echo base_url();?>assets/admin/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script> -->
    <!-- starrr -->
    <script src="<?php echo base_url();?>assets/admin/starrr/dist/starrr.js"></script>
    <!-- <script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script> -->
    <script>
      $(document).ready(function(){
       
       function load_unseen_notification(view = '')
       {
        $.ajax({
         url:"<?php echo base_url('admin/news_feed');?>",
         method:"POST",
         data:{view:view},
         dataType:"json",
         success:function(data)
         {
          $(' #news_feed').html(data.notification);
          if(data.unseen_notification > 0)
          {
           $('#li_notif .dropdown-toggle #count_message').html(data.unseen_notification);
          }
         }
        });
       }
       
       load_unseen_notification();
       
       $(document).on('click', '#click_me_please', function(){
        $('#count_message').html('0');
        load_unseen_notification('yes');
       });
       
       setInterval(function(){ 
        load_unseen_notification(); 
       }, 5000);
       return false;
      });
    </script>
    <script>
    $(document).ready(function(){
      $('.checkbox').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'icheckbox_flat-blue'
        // increaseArea: '20%' // optional
      });
    });
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
    // var socket = io.connect( 'http://'+window.location.hostname+':3000' );
    // socket.on("new_notif", function( data ) {
    //   $( "#new_count_message" ).html( data.count_notif );

    // });
    </script>
    <script>
      // event_time_start_alt
      // event_time_start
      $('#event_time_start_alt').timepicker({

      });
      $('#event_time_start_alt').change(function(){
        $('#event_time_start').attr('value',$(this).val());
      });
      $('#event_time_end_alt').timepicker({

      });
      $('#event_time_end_alt').change(function(){
        $('#event_time_end').attr('value',$(this).val());
      });

      // $('#event_time_start_alt').change(function(){
      //   var start = $('#event_time_start').timepicker().val();
      //   var end = $('#event_time_start').timepicker().val();
      //   // alert(time1);
      // });
    

      var startTimeTextBox = $('#event_time_start');
      var endTimeTextBox = $('#event_time_end');
      $.timepicker.timeRange(
        startTimeTextBox,
        endTimeTextBox,
        {
          minInterval: (2000*60*60), // 1hr
          timeFormat: 'HH:mm',
          start: {
            timeFormat: 'HH:mm',
            timeOnlyTitle: 'Start at'
          }, // start picker options
          end: {
            timeFormat: 'HH:mm',
            timeOnlyTitle: 'End at'
          } // end picker options
        }
      );

      $('#event_date_alt').datepicker({
        dateFormat: "yy-mm-dd"
      });
      $('#event_date_alt').change(function(){
        $('#event_date').attr('value',$(this).val());
      });
    </script>

  </body>
</html>