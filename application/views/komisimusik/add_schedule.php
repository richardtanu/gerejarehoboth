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
                <?php foreach ($get_event_info_by_id as $key) { ?>
                  <h3>Event Info <i class="fa fa-info-circle" aria-hidden="true"></i></h5>
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
                  <!-- <label><p><?php echo $key->id_event;?></p></label> -->
                  <?php
                }?>
                
              </div>
              <div class="col-md-12">
                <form>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Worship Leader</label>
                      <input type="text" class="form-control" id="autocomplete_wl" placeholder="Worship Leader">
                    </div>
                    
                  </div>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Singers</label>
                      <input type="text" class="form-control" id="autocomplete_singers" placeholder="Singers">
                    </div>
                    
                  </div>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Keyboard</label>
                      <input type="text" class="form-control" id="autocomplete_keyboard" placeholder="Keyboard Player">
                    </div>
                    
                  </div>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Guitar</label>
                      <input type="text" class="form-control" id="autocomplete_guitar" placeholder="Guitar Player">
                    </div>
                    
                  </div>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Bass</label>
                      <input type="text" class="form-control" id="autocomplete_bass" placeholder="Bass  Player">
                    </div>
                    
                  </div>
                  <div class="container-fluid form">
                    <div class="form-group col-md-6">
                      <label for="" class="col-form-label">Drum</label>
                      <input type="text" class="form-control" id="autocomplete_drum" placeholder="Drum  Player">
                    </div>
                    
                  </div>
                </form>
              </div>
              

        <!-- jangan di ubah2 -->
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
    Button di page yang nampilin event. Button berfungsi sebagai redirect ke page insert.
    Button delete

    INDEX
    Tampilin notif

    ADD_VOLUNTER PAGE
    Buat form insert

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
      });
    </script>
    <!-- autocomplete -->
    <script>
      $(document).ready(function(){
        $.ajax({
            url: "<?php echo base_url('komisimusik/get_worship_leader');?>",
            type: "POST",
            dataType: "json",
            // async: false,
            success: function(result) {
                
                var pelayan = {
                    worship_leader: []
                };
                // var results = [];
                // results = result;
                
                result.map(function(item) {        
                   pelayan.worship_leader.push({ 
                        "nama" : item.nama,
                        "email"  : item.email,
                        "handphone"       : item.handphone 
                    });
                });
                alert(pelayan.worship_leader.nama);
                $('#autocomplete_wl').typeahead({
                    source: worship_leader
                });
            }
        });
        // $('#autocomplete_wl').typeahead({
        //   source: function (query, process) {
        //     return $.POST('<?php echo base_url('SomeFunctionToGetData');?>', 
        //                   { query: query }, 
        //                   function (data) {
        //                     console.log(data);
        //                     data = $.parseJSON(data);
        //                     return process(data);
        //                 });
        //   }
        //   // [
        //   //   "Richard", "Zico", "Trijono", "Haryo", "Ricky"
        //   // ]
        // });
      });
    </script>
   <!--  <script>
      $(document).ready(function(){
        $.ajax({
            url: ".../GetCountries",
            type: "POST",
            dataType: "JSON",
            async: false,
            success: function(result) {
                objects = [];
                map = {};
                $.each(result, function(i, object) {
                    map[object.caption.en] = object;
                    objects.push(object.caption.en);
                });

                $('input[name=country_title]').typeahead({
                    minLength: 1,
                    items: 2000,
                    source: objects,
                    afterSelect: function (item) {
                        // Call function
                        var countryId = map[item].Id;
                        GetConsulates(countryId, null);
                    }
                });
            } 
        });
      });
    </script> -->
    <script>
      $(document).ready(function(){
        $('#autocomplete_keyboard').typeahead({
          source: 
          [
            "Shelia", "Andry", "Evelyn Runkat"
          ]
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#autocomplete_guitar').typeahead({
          source: 
          [
            "David", "Joshua", "Pipin", "Iwan R", "Gunawan"
          ]
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#autocomplete_bass').typeahead({
          source: 
          [
            "Leo Hansen", "Arif", "Thomas"
          ]
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#autocomplete_drum').typeahead({
          source: 
          [
            "Richard", "Zico", "Trijono", "Haryo", "Jeremy", "Marco", "Ateng"
          ]
        });
      });
    </script>
  </body>
</html>