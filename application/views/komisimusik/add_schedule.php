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
                <h3>Schedule > add</h3>
                harusnya ada breadscrumb
              </div>
             <!--  <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- <div class="col-md-12">
                <?php foreach ($get_event_info_by_id as $key) { ?>
                  <h3>Event Info <i class="fa fa-info-circle" aria-hidden="true"></i></h3>
                  <p>This event held on <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php $date = $key->start_at; echo substr($date, 0, 10);?></p>
                  <table class="table table-striped">
                    <tr>
                      <td>
                        Event name
                      </td>
                      <td>
                        Start at
                      </td>
                      <td>
                        End at
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <?php echo $key->event_name;
                        ?>
                      </td>
                      <td>
                        <?php $temp = $key->start_at;
                              $start = substr($temp, 11, 8);
                              echo $start;
                        ?>
                      </td>
                      <td>
                        <?php $temp = $key->end_at;
                              $end = substr($temp, 11, 8);
                              echo $end;
                        ?>
                      </td>

                    </tr>
                  </table>
                  <label><p><?php echo $key->id_event;?></p></label> 
                  <?php
                }?>-->
                
              <!-- </div> --> 
              <div class="col-md-12">
                <form class="form">
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Worship Leader</label>
                      <input type="text" class="form-control" id="autocomplete_wl" placeholder="Worship Leader">
                    </div>
                    
                  </div>
                  <!-- <hr> -->
                  <div class="container-fluid form">
                  
                    <div class="form-group col-md-12"  >
                      <div class="col-md-6">
                        <label>Singers</label>
                        <button type="button" class="btn btn-outline-success btn-sm" id="addMoreBtnSingers"><i class="glyphicon glyphicon-plus"></i> More</button> 
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      
                      <input type="text" class="form-control autocomplete_singers" name="autocomplete_singers" placeholder="Singers">
                    </div>
                    <div id="addMoreSingers">
                      
                    </div>
                  </div>
                  <!-- <hr> -->
                  <div class="container-fluid form">
                    <div class="form-group col-md-12">
                      <label>Keyboard</label>
                      <button class="btn btn-outline-success btn-sm" id="addMoreBtnKeyboard"><i class="glyphicon glyphicon-plus"></i> More</button> 
                    </div>
                    <div class="form-group col-md-12" style="">
                     
                      <input type="text" class="form-control autocomplete_keyboard" name="autocomplete_keyboard" placeholder="Keyboard">
                    </div>
                    <div id="addMoreKeyboard">
                      
                    </div>
                  </div>
                  <!-- <hr> -->
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Guitar</label>
                      <input type="text" class="form-control" id="autocomplete_guitar" name="autocomplete_guitar" placeholder="Guitar Player">
                    </div>
                    
                  </div>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Bass</label>
                      <input type="text" class="form-control" id="autocomplete_bass" name="autocomplete_bass" placeholder="Bass  Player">
                    </div>
                    
                  </div>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Drum</label>
                      <input type="text" class="form-control" id="autocomplete_drum" name="autocomplete_drum"placeholder="Drum  Player">
                    </div>
                    
                  </div>
                </form>

                <!-- <div class="input-group control-group after-add-more">
                  <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                  </div>
                </div> 

                <div class="copy hide">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div> -->

              </div>
              

        <!-- jangan di ubah2
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

    <!-- TODO
    EVENT
    Buat insert pelayan untuk event sesuai komisi.
    Button delete.

    ADD_VOLUNTER PAGE
    Add to schedule button.
    Group added servant (worship leader, guitar). Inserting more than one input name(by checklist, button with jquery, or?).
    Stupid grid.. make new ones.

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
    <script src="<?php echo base_url();?>assets/admin/bootstrap3-typeahead.js"></script>
    <!-- notif -->
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
    <!-- autocomplete -->
    
    <!-- autocomplete worshipleader -->
    <script type="text/javascript">
      $(document ).ready(function(){
        // e.preventDefault();
        var worship_leader = new Array;
        $.ajax({
            url: "<?php echo base_url('komisimusik/get_worship_leader');?>",
            type: "POST",
            dataType: "json",
            // async: false,
            success: function(result) {
                
                // var worship_leader = new Array;
                $.map(result, function(data){
                    var group;
                    group = {
                        id_pelayan: data.id_pelayan,
                        nama: data.nama
                    };
                    worship_leader.push(group);
                });
                $('#autocomplete_wl').typeahead({
                        source: worship_leader,
                        displayText: function (item){ return item.nama},
                        afterSelect: function (item){ return item.id_pelayan}
                });
              
            }
        }); 
      });
    </script>

    <!-- autocomplete singers -->
    <script>
      $(document).ready(function(){
        var singers = new Array;
        $.ajax({
            url: "<?php echo base_url('komisimusik/get_singers');?>",
            type: "POST",
            dataType: "json",
            // async: false,
            success: function(result) {
                
               
                $.map(result, function(data){
                    var group;
                    group = {
                        id_pelayan: data.id_pelayan,
                        nama: data.nama,
                        selected: false
                    };
                    singers.push(group);
                });
            }
        });
        $('.autocomplete_singers').typeahead({
                    source: singers,
                    displayText: function (item){ return item.nama},
                    afterSelect: function (item){ return item.id_pelayan}
        });
        // var taOptsHash = {
        //   source: singers},
        //   {displayText: function (item){ return item.nama}},
        //   {afterSelect: function (item){ return item.id_pelayan}};
        function initTypeAhead(optsHash, count) {
            $('.autocomplete_singers'+count).typeahead({
              source: singers,
              displayText: function (item){ return item.nama},
              afterSelect: function (item){ return item.id_pelayan}
            });
        }
        $( "#addMoreBtnSingers" ).on( "click", function(e) {
          e.preventDefault();
          var count = $( ".autocomplete_singers" ).length;
          var html = '<div class="form-group col-md-6"><input name="autocomplete_singers'+
                      count+
                     '"class="form-control autocomplete_singers'+
                     count+
                     '" placeholder="Singers" type="text"></div>';

          $("#addMoreSingers").append(html);
          initTypeAhead(taOptsHash, count);
          return false;
        });
      // return false;
      });
    </script>
    <script>
      $(document).ready(function(){
        var keyboard = new Array;
        $.ajax({
            url: "<?php echo base_url('komisimusik/get_keyboard_player');?>",
            type: "POST",
            dataType: "json",
            // async: false,
            success: function(result) {
                
               
                $.map(result, function(data){
                    var group;
                    group = {
                        id_pelayan: data.id_pelayan,
                        nama: data.nama,
                        selected: false
                    };
                    keyboard.push(group);
                });
            }
        });
        $('.autocomplete_keyboard').typeahead({
                    source: keyboard,
                    displayText: function (item){ return item.nama},
                    afterSelect: function (item){ return item.id_pelayan}
        });
        // var taOptsHash = {
        //   source: keyboard},
        //   {displayText: function (item){ return item.nama}},
        //   {afterSelect: function (item){ return item.id_pelayan}};
        function initTypeAhead(optsHash, count) {
            $('.autocomplete_keyboard'+count).typeahead({
              source: keyboard,
              displayText: function (item){ return item.nama},
              afterSelect: function (item){ return item.id_pelayan}
            });
        }
        $( "#addMoreBtnKeyboard" ).on( "click", function(e) {
          e.preventDefault();
          var count = $( ".autocomplete_keyboard" ).length;
          var html = '<div class="form-group col-md-6"><input name="autocomplete_keyboard'+
                      count+
                     '"class="form-control autocomplete_keyboard'+
                     count+
                     '" placeholder="Keyboard" type="text"></div>';

          $("#addMoreKeyboard").append(html);
          initTypeAhead(taOptsHash, count);
          return false;
        });
      // return false;
      });
    </script>
    <script>
      $(document).ready(function(){
        $.ajax({
            url: "<?php echo base_url('komisimusik/get_guitar_player');?>",
            type: "POST",
            dataType: "json",
            // async: false,
            success: function(result) {
                
                var worship_leader = new Array;
                $.map(result, function(data){
                    var group;
                    group = {
                        id_pelayan: data.id_pelayan,
                        nama: data.nama
                    };
                    worship_leader.push(group);
                });

                $('#autocomplete_guitar').typeahead({
                    source: worship_leader,
                    displayText: function (item){ return item.nama},
                    afterSelect: function (item){ return item.id_pelayan}
                });
            }
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $.ajax({
            url: "<?php echo base_url('komisimusik/get_bass_player');?>",
            type: "POST",
            dataType: "json",
            // async: false,
            success: function(result) {
                
                var worship_leader = new Array;
                $.map(result, function(data){
                    var group;
                    group = {
                        id_pelayan: data.id_pelayan,
                        nama: data.nama
                    };
                    worship_leader.push(group);
                });

                $('#autocomplete_bass').typeahead({
                    source: worship_leader,
                    displayText: function (item){ return item.nama},
                    afterSelect: function (item){ return item.id_pelayan}
                });
            }
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $.ajax({
            url: "<?php echo base_url('komisimusik/get_drum_player');?>",
            type: "POST",
            dataType: "json",
            // async: false,
            success: function(result) {
                
                var worship_leader = new Array;
                $.map(result, function(data){
                    var group;
                    group = {
                        id_pelayan: data.id_pelayan,
                        nama: data.nama
                    };
                    worship_leader.push(group);
                });

                $('#autocomplete_drum').typeahead({
                    source: worship_leader,
                    displayText: function (item){ return item.nama},
                    afterSelect: function (item){ return item.id_pelayan}
                });
            }
        });
      });
    </script>
  </body>
</html>