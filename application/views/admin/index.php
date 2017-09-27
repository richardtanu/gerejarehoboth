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
    <!-- FullCalendar -->
    <link href="<?php echo base_url();?>assets/admin/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/admin/production/css/custom.min.css" rel="stylesheet">
    <!-- wickedpicker -->
    <!-- <link href="<?php echo base_url();?>assets/admin/wickedpicker/dist/wickedpicker.min.css" rel="stylesheet"> -->
    <!-- timedropper -->
    <!-- <link href="<?php echo base_url();?>assets/admin/timedropper/timedropper.css" rel="stylesheet"> -->
    <!-- jquery datetimepicker ui addons -->
    <link href="<?php echo base_url();?>assets/admin/jquery_timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/jquery-ui/jquery-ui.css" rel="stylesheet">


    <style type="text/css">

      /*#timpedropper_start{
        z-index: 200;
      }
      #timpedropper_end{
        z-index: 200;
      }*/
      .ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
        float:left;
        background: #900;
        display: none;
      }
      #error_message{
        color : red;
      }

      #timepicker_start{
          left: 0px;
          top: 0px;
          z-index: 200;
      }
      #timepicker_end{
          left: 0px;
          top: 0px;
          z-index: 200;
      }
    </style>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!-- /menu profile quick info -->

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
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url();?>assets/Admin/images/img.jpg" alt="Profile Image" /></span>
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
          <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar Events <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- <div id='calendar'></div> -->
                    <div id='calendar1'></div>
                   <!--  <div id='calendar2'></div>
                    <div id='calendar3'></div> -->

                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- /page content -->
         <?php
          if(isset($stuff)){
            echo $stuff['eventName']."<br>";
            echo $stuff['start']."<br>";
            echo $stuff['end'];
          }else{

          }
        ?>
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
<!--     <?php
      if($errors)
      {
        echo $errors;
      }
    ?> -->
    <!-- calendar modal -->
    <div id="add_event_on_day_click" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Add new event</h4>
          </div>

          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              
              <?php echo form_open("", array("class" => "form-horizontal calender", "id" => "event_form" , "role" => "form", "method" => "POST") ); ?>
              <!-- <form id="antoform" class="form-horizontal calender" role="form"> -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Event Title</label>
                  <div class="col-sm-9">

                    <input class="form-control" id="event_name" name="event_name" placeholder="Event title" type="text" />
                    <!-- <div id="error_message" class="error_message"></div> -->
                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Start at</label>
                  <div class="col-sm-9">

                    <input class="form-control" id="event_start" name="event_start" type="text" placeholder="Start time"/>
                    <div id="event_start_alt"></div>
                    <!-- <div id="error_message" class="error_message"></div> -->
                    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">End at</label>
                  <div class="col-sm-9">

                    <input class="form-control" id="event_end" name="event_end" type="text" placeholder="End time"/>
                    <div id="event_end_alt"></div>
                    <!-- <div id="error_message" class="error_message"></div> -->

                  </div>
                </div>
                
              <!-- </form> -->
            </div>
          </div>

          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal" value="close"></button> -->
            <!-- <button type="button" class="btn btn-primary modalSubmit" id="submit_button_cal">Add event</button>  -->
            <input type="submit"  class="btn btn-primary"  id="submit_button_cal" value="Add Event"/>
            </form>
          </div>
         
        </div>
      </div>
    </div>

    <!-- <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-default antodelete2" data-dismiss="modal">Delete</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->

    <!-- <div id="fc_delete" data-toggle="modal" data-target="#CalenderModalDelete"></div> -->
    <div id="day_click" data-toggle="modal" data-target="#add_event_on_day_click"></div>
    <!-- <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div> -->
    <!-- /calendar modal -->


    <!-- FullCalendar -->
    
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
    <script src="<?php echo base_url();?>assets/admin/fullcalendar/dist/fullcalendar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/admin/production/js/custom.min.js"></script>
    <!-- wickedpicker -->
    <!-- <script src="<?php echo base_url();?>assets/admin/wickedpicker/dist/wickedpicker.min.js"></script> -->
    <!-- timedropper -->
    <!-- <script src="<?php echo base_url();?>assets/admin/timedropper/timedropper.js"></script> -->
    <!-- jquery datetimepicker addons -->
    <script src="<?php echo base_url();?>assets/admin/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/admin/jquery_timepicker/jquery-ui-timepicker-addon.js"></script>
    <script src="<?php echo base_url();?>assets/admin/jquery_timepicker/jquery-ui-sliderAccess.js"></script>

    <script>

      //start timepicker
      // $('#event_start_alt').datetimepicker({
      //     timeOnly: true,
      //     timeFormat: 'HH:mm TT',
      //     altFormat: 'HH:mm TT',
      //     timeOnlyTitle: 'Start at'
      // });
      // // alternate start timepicker
      // $('#event_start').change(function(){
      //   $('#event_start_alt').datetimepicker();
      // });
      // $('#event_start_alt').change(function(){
      //   $('#event_start').attr('value',$(this).val());
      // });

      // //end timepicker
      // $('#event_end_alt').datetimepicker({
      //     timeOnly: true,
      //     timeFormat: 'HH:mm TT',
      //     altFormat: 'HH:mm TT',
      //     timeOnlyTitle: 'End at'
      // });
      // // alternate end timepicker
      // $('#event_end').change(function(){
      //   $('#event_end_alt').datetimepicker();
      // });
      // $('#event_end_alt').change(function(){
      //   $('#event_end').attr('value',$(this).val());
      // });
      
      //range
      var startTimeTextBox = $('#event_start');
      var endTimeTextBox = $('#event_end');
      $.timepicker.timeRange(
        startTimeTextBox,
        endTimeTextBox,
        {
          minInterval: (1000*60*60), // 1hr
          timeFormat: 'HH:mm',
          start: {
            timeFormat: 'HH:mm TT',
            timeOnlyTitle: 'Start at'
          }, // start picker options
          end: {
            timeFormat: 'HH:mm TT',
            timeOnlyTitle: 'End at'
          } // end picker options
        }
      );

        
      $('#calendar1').fullCalendar({
        selectable: true,
        selectHelper: true,
        eventClick: function(calEvent, jsEvent, view) {

            alert('Event: ' + calEvent.title);
            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            alert('View: ' + view.name);

              // change the border color just for fun
            $(this).css('border-color', 'red');

        },
        dayClick: function(date, jsEvent, view) {
          $('#day_click').click();   
        },
        timeFormat: 'H(:mm)',
        eventSources: [
        {
          events: function(start, end, timezone, callback) {
            $.ajax({
              url: '<?php echo base_url(); ?>CalendarController/get_events',
              dataType: 'json',
              type: 'POST',
              data: {
                    // our hypothetical feed requires UNIX timestamps
                start: start.unix(),
                end: end.unix()
              },
              success: function(msg) {
                var events = msg.events;
                callback(events);
              }
            });
          } 
        }
        ]
      });
      $('#event_form').submit(function(e){
        e.preventDefault();
        
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('CalendarController/add_event');?>",
          data: $('#event_form').serialize(),
          dataType: 'JSON',
          success: function(response){
            if(response.success == true){
              // if success we would show message
              // and also remove the error class
              $('#the-message').append('<div class="alert alert-success">' +
                '<span class="glyphicon glyphicon-ok"></span>' +
                ' Data has been saved' +
                '</div>');
              $('.form-group').removeClass('has-error')
                      .removeClass('has-success');
              $('.text-danger').remove();

              // reset the form
              me[0].reset();

              // close the message after seconds
              $('.alert-success').delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              });

            }else{
             
              $.each(response.messages, function(key, value){
                var element  = $('#' + key);
                // alert(key);
        

                element.closest('div.col-sm-9').closest('div.form-group')
                .removeClass('has-error')
                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                .find('.text-danger')
                .remove();
                
                element.after(value);
              });
            }
          }
        })
      })

        // $('#inputEvent').submit(function(e){
        //   e. preventDefault();

        //   $.ajax({
        //     type: 'POST',
        //     async: true,
        //     url: "<?php echo base_url('CalendarController/add_event');?>",
        //     data: $('#inputEvent').serialize(),
        //     success: function(data){
        //       var obj = $.parseJSON(data);
        //       if(obj != null){
        //         $('#error_message').html(obj['event_title']);
        //       }
        //       console.log("OK!");
        //     },
        //     error: function(error){
        //       // alert('error');
        //       console.log("ERROR!");
        //     }
        //   });
        //   // return false;
        // });

    </script>

  </body>
</html>