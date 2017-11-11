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
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/admin/production/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .modal-dialog{
        width:800px;
      }
    </style>
    
  </head>
<?php
  if(isset($parameter)){
    echo "<script>console.log('".$parameter['wl']."');</script>";
  }
?>
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
              require_once ('application/views/komisimusik/SidebarKomisiMusik.php');
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

        <!-- TOP RIGHT NAV BAR FROM -->
        <!-- THIS PART IS RTL !!!!! -->
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
                <h3>Schedule</h3>
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
              <div class="col-md-12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Event Name</th>
                      <th>Date</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Action</th>
                      <!-- <th>Del</th> -->
                    </tr>
                  </thead>

                  <?php
                  if($get_events == null){
                    echo "<tr>";
                      echo "<td>";
                        echo "<p>There's no event posted yet.</p>";
                      echo "</td>";
                    echo "</tr>";
                  }else{
                    foreach ($get_events as $key) {
                      echo "<tr>";
                      echo "<th scope='row'>".$key->id_event."</th>";
                      echo "<td>".$key->event_name."</td>";
                      $temp = $key->start_at;
                      $date = substr($temp, 0, 10);
                      echo "<td>".$date."</td>";
                      $temp = $key->start_at;
                      $start = substr($temp, 11, 8);
                      echo "<td>".$start."</td>";
                      $temp = $key->end_at;
                      $end = substr($temp, 11, 8);
                      echo "<td>".$end."</td>";
                      echo "<td>";
                      if ($key->submitted_volunter > 0) { ?>
                      <!--  -->
                            <form method='post' action="<?php echo base_url('komisimusik/edit_volunter_from_schedule');?>">
                              <input type="hidden" class="hidden" name="event_id_edit" value="<?php echo $key->id_event;?>">
                              <input type='submit' class='btn btn-default' value='Edit'/>
                              <!-- onclick='sentParameterToEdit(<?php echo $key->id_event;?>)'  -->
                            </form>
                            <button type="button" id="button_view_volunter" class='btn btn-default' onclick="showModalView(<?php echo $key->id_event;?>)" >View</button>
                      <?php } else { ?>
                            <form method='post' action=" <?php echo base_url('komisimusik/add_volunter_to_schedule');?>  ">
                              <input type="hidden" class="hidden" name="event_id_add" value="<?php echo $key->id_event;?>">
                              <input type='submit' class='btn btn-default' value='Add Volunter'/><!-- onclick='sentParameterToAdd(<?php echo $key->id_event;?>) -->
                            </form>
                            <button type="button" id="button_view_volunter" class='btn btn-default' onclick="showModalView(<?php echo $key->id_event;?>)" >View</button>
                      <?php } ?>
                           <!--  <form method='post' action="<?php echo base_url('komisimusik/add_volunter_to_schedule');?>  ">
                              <input type="hidden" class="hidden" name="event_id_hidden" value="<?php echo $key->id_event;?>"> -->
                                
                            <!-- </form> -->
                          </td>
                      </tr>
                  
                  <!-- <td> 
                    <form method="POST" action="<?php echo base_url('komisimusik/add_volunter_to_schedule');?>">
                      <input type="submit" class="btn btn-default btn-primary" value="Add Volunter"/>
                    </form>
                  </td> -->
                  <!-- <td> <button>Delete</button> </td> -->
                  <!-- <tr> -->
                  <?php } 
                  } ?>

                </table>
              </div>
            
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- MODAL VIEW-->
        <div id="view_submited_volunter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Volunter Submited</h4>
              </div>
              <div class="modal-body">
                <p id='itsp'></p>
                <br>
                <p>Music Commision</p>
                
                <!-- <table class="modal_table table" id="music_commision"> 
                  
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Voluntered as..</th>
                    <th>Contact</th>
                  </tr>
                  
                </table>  -->
                <div id="sesuatu"></div>
                <!-- loop data here -->
                
                
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div id="data_success" data-toggle="modal" data-target="#confirmation_success"></div>
        <!-- MODAL VIEW-->
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

    <!-- TODO
    EVENT
    Buat insert pelayan untuk event sesuai komisi.
    Button di page yang nampilin event. Button berfungsi sebagai redirect ke page insert.
    Button delete

    INDEX
    Tampilin notif


     -->

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
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/admin/js/datepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>assets/admin/starrr/dist/starrr.js"></script>

    <!-- jquery autocomplete -->
    <!-- <script src="<?php echo base_url();?>assets/bootstrap3-typeahead.js"></script> -->
    <script>
    $(document).ready(function(){
     
     function load_unseen_notification(view = '')
     {
      $.ajax({
       url:"<?php echo base_url('komisimusik/news_feed');?>",
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
     
     // $('#comment_form').on('submit', function(event){
     //  event.preventDefault();
     //  if($('#subject').val() != '' && $('#comment').val() != '')
     //  {
     //   var form_data = $(this).serialize();
     //   $.ajax({
     //    url:"insert.php",
     //    method:"POST",
     //    data:form_data,
     //    success:function(data)
     //    {
     //     $('#comment_form')[0].reset();
     //     load_unseen_notification();
     //    }
     //   });
     //  }
     //  else
     //  {
     //   alert("Both Fields are Required");
     //  }
     // });
     
     $(document).on('click', '#click_me_please', function(){
      $('#count_message').html('0');
      load_unseen_notification('yes');
     });
     
     setInterval(function(){ 
      load_unseen_notification(); 
     }, 5000);
     
    });
    </script>
    <script type="text/javascript">
      // $(document).ready(function(){
        var strings = "";
        
        //jadiin fucntionnya dipanggil sama si button view
        function showModalView(parameter){

          var eventid = parameter;
          var length;
          // $('#button_view_volunter').click( function() {

            // $('#view_submited_volunter').modal('show');
            alert(eventid);
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('komisimusik/view_volunter_from_schedule');?>",
              dataType: "json",
              data: {'event_id_throw_view' : eventid},
              success: function(result){
                if(result != false){
                  $('#view_submited_volunter').modal('show');
                  var arr = $.map(result, function(res){
                                            return {
                                              event_name: res.event_name, 
                                              start_at: res.start_at,
                                              end_at: res.end_at,
                                              volunter_total: res.submitted_volunter,
                                              nama: res.nama,
                                              email: res.email,
                                              handphone: res.handphone,
                                              nama_pelayanan: res.nama_pelayanan
                                            };
                                          }
                                  ); 
                  // alert("event name: "+ arr[0]['event_name']); 
                  length = arr.length; 
                  strings = "";
                  open = '<table class="modal_table table" id="music_commision"><tr><th>#</th><th>Name</th><th>Voluntered as..</th><th>Contact</th></tr>';
                  close = "</table>";
                  for (var i = 0; i < arr.length; i++) {
                    strings += '<tr><td>'+(i+1)+'</td><td>'+arr[i]['nama']+'</td><td>'+arr[i]['nama_pelayanan']+'</td><td><i class="fa fa-envelope" aria-hidden="true"></i> '+arr[i]['email']+'<br><i class="fa fa-mobile" aria-hidden="true"></i> '+arr[i]['handphone']+'</td></tr>';
                    // console.log(arr[i]['nama']); 
                    // $('#music_commision').append('<tr><td>'+(i+1)+'</td><td>'+arr[i]['nama']+'</td><td>'+arr[i]['nama_pelayanan']+'</td><td>'+arr[i]['email']+'<br>'+arr[i]['handphone']+'</td></tr>');
                  }
                  // top  = top+strings;
                  // $('#sesuatu').html(strings);
                  document.getElementById('sesuatu').innerHTML = open+strings+close;
                  document.getElementById('itsp').innerHTML = "Here's the list of volunters that assigned to this events. There are "+length+" volunters that will serve in music as a band.";
                  // console.log(result);
                }else{
                  $('#view_submited_volunter').modal('show');
                  open = "<table class='modal_table table' id='music_commision'><tr><th>#</th><th>Name</th><th>Voluntered as..</th><th>Contact</th></tr><tr><td colspan='4'><h4>There's no volunter data added yet. Please add some volunter.</h4></td></tr></table>";
                  // close = "";
                  // inner = "";
                  // console.log("what? " + open);
                  document.getElementById('sesuatu').innerHTML = open;
                  document.getElementById('itsp').innerHTML = "There is no volunter asssigned in this event yet.";
                  // alert('OUTSIDE IF');
                }
              } ,error: function(xhr, status, error) {
                console.log("error:" + error);
              }
            });
          // $('#view_submited_volunter').on('hidden.bs.modal', function () {
          //   strings = "";
          // });
          // });
        }
        
        // function sentParameterToEdit(parameter){
        //   var eventid = parameter;
        //   // alert(eventid);
        //   $.ajax({
        //     type: "POST",
        //     url: "<?php echo base_url('komisimusik/edit_volunter_from_schedule');?>",
        //     dataType: "json",
        //     data: {'event_id_thrown_edit' : eventid},
        //     success: function(result){
        //       alert(result);
        //     },
        //     error: function(xhr, status, error) {
        //         console.log("error:" + error);
        //     }

        //   });
        //   return false;
        // }
        // function sentParameterToAdd(parameter){
        //   var eventid = parameter;
        //   // alert(eventid);
        //   $.ajax({
        //     type: "POST",
        //     url: "<?php echo base_url('komisimusik/add_volunter_to_schedule');?>",
        //     dataType: "json",
        //     data: {'event_id_thrown_add' : eventid},
        //     success: function(result){
        //       alert(result);
        //     },
        //     error: function(xhr, status, error) {
        //         console.log("error:" + error);
        //     }

        //   });
        //   return false;
        // }
      // });
    </script>
  </body>
</html>