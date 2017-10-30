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
    <!-- bootstrap tags input. -->
    <link href="<?php echo base_url();?>assets/admin/bootstrap-tagsinput/src/bootstrap-tagsinput.css" rel="stylesheet">
    <style type="text/css">
      .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
           -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      }

      .tt-hint {
        color: #999
      }

      .tt-menu {    /* used to be tt-dropdown-menu in older versions */
        width: 422px;
        margin-top: 4px;
        padding: 4px 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 4px;
           -moz-border-radius: 4px;
                border-radius: 4px;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
           -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                box-shadow: 0 5px 10px rgba(0,0,0,.2);
      }

      .tt-suggestion {
        padding: 3px 20px;
        line-height: 24px;
      }

      .tt-suggestion.tt-cursor,.tt-suggestion:hover {
        color: #fff;
        background-color: #0097cf;

      }

      .tt-suggestion p {
        margin: 0;
      }
    </style>
    
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
                harusnya ada breadcrumbs
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
                
                <?php 
                  if(isset($error)){
                    echo $error;
                  }
                    // echo "<script>alert('not error!');</script>";
                ?>
                <div class="form_error">
                  <?php echo validation_errors(); ?>
                </div>
                 
                <!-- <?php echo form_open(); ?> -->
                <form class="form" action="<?php echo base_url('komisimusik/volunter_submit');?>"  method="POST">

                  <div class="container-fluid form">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Worship Leader
                      </div>
                      <div class="panel-body">
                        <div class="input-group control-group">
                          <div id="taginputwl">
                            <input type="text" class="typeahead form-control" name="taginputwl" placeholder="Worship Leader" autocomplete="off">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- WL -->
                  <hr>
                  <div class="container-fluid form">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Singers
                      </div>
                      <div class="panel-body">
                        <div class="input-group control-group">
                          <div id="taginputsingers">
                            <input type="text" class="typeahead form-control" name="taginputsingers" placeholder="Singers" autocomplete="off">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- singers -->
                  <hr>
                  <div class="container-fluid form">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <label>Keyboard</label>
                      </div>
                      <div class="panel-body">
                        <div class="input-group control-group">
                          <div id="taginputkeyboard">
                            <input type="text" class="typeahead form-control" name="taginputkeyboard" placeholder="Keyboard" autocomplete="off">
                          </div>
                        </div>
                      </div>
                    </div>
                   </div>
                   <div class="container-fluid form">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <label>Guitar</label>
                        </div>
                        <div class="panel-body">
                          <div class="input-group control-group">
                            <div id="taginputguitar">
                              <input type="text" class="typeahead form-control" name="taginputguitar" placeholder="Guitar" autocomplete="off">
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="container-fluid form">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <label>Bass</label>
                        </div>
                        <div class="panel-body">
                          <div class="input-group control-group">
                            <div id="taginputbass">
                              <input type="text" class="typeahead form-control" name="taginputbass" placeholder="Bass" autocomplete="off">
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="container-fluid form">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <label>Drum</label>
                        </div>
                        <div class="panel-body">
                          <div class="input-group control-group">
                            <div id="taginputdrum">
                              <input type="text" class="typeahead form-control" name="taginputdrum" placeholder="Drum" autocomplete="off">
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                  <div class="panel-body">
                    <input class="btn btn-success btn-sm" type="submit" name="submitButton" value="Submit" />
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
              <div class="col-md-12 panel">
                
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
    <script src="<?php echo base_url();?>assets/admin/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/admin/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <!-- <script src="<?php echo base_url();?>assets/admin/nprogress/nprogress.js"></script> -->
    <!-- bootstrap-daterangepicker -->
    <!-- <script src="<?php echo base_url();?>assets/admin/production/js/moment/moment.min.js"></script> -->
    <!-- Custom Theme Scripts -->
    <!-- <script src="<?php echo base_url();?>assets/admin/production/js/custom.min.js"></script> -->
    <!-- bootstrap-progressbar -->
    <!-- <script src="<?php echo base_url();?>assets/admin/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
    <!-- bootstrap-daterangepicker -->
    <!-- <script src="<?php echo base_url();?>assets/admin/js/datepicker/daterangepicker.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets/admin/starrr/dist/starrr.js"></script> -->
    <!-- jquery autocomplete -->
    <!-- <script src="<?php echo base_url();?>assets/admin/bootstrap3-typeahead.js"></script> -->
    <!-- typeahead.js bloodhound -->
    <script src="<?php echo base_url();?>assets/admin/bloodhound.js"></script>
    <!-- typeahead.js bloodhound -->
    <script src="<?php echo base_url();?>assets/admin/typeahead.jquery.js"></script>
    <!-- tags bootstrap input -->
    <script src="<?php echo base_url();?>assets/admin/bootstrap-tagsinput/src/bootstrap-tagsinput.js"></script>
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
 <!--    <script type="text/javascript">
      
      $(document ).ready(function(){

        // var anjing = new bloodhound(){
          
        // }
        $('#typeaheadWorshipLeader').typeahead({

        });
      // });
        // e.preventDefault();
        // var worship_leader = new Array;
        // $.ajax({
        //     url: "<?php echo base_url('komisimusik/get_worship_leader');?>",
        //     type: "POST",
        //     dataType: "json",
        //     // async: false,
        //     success: function(result) {
                
        //         var worship_leader = new Array;
        //         result.map(function(data){
        //             var group;
        //             group = {
        //               value: data.nama
        //               // key: data.nama
        //             };
        //             worship_leader.push(group);
        //         });
        //         // console.log(result);
        //         // $('.auto_wl').tagsinput({
        //         //   typeahead: {
        //         //     source: result.map(function(item){
        //         //       return item.value;
        //         //     }),
        //         //     afterSelect: function() {
        //         //       this.$element[0].value = '';
        //         //     }
        //         //   }
        //         // });
        //     }
        // });
        // var $input = $(".auto_wl");
        // $input.typeahead({
        //   source: function(query, process){
        //     $.ajax({
        //       url: "<?php echo base_url('komisimusik/get_worship_leader');?>",
        //       type: "POST",
        //       dataType: "json",

        //     });
        //   },
        //   autoSelect: true
        // });
        // $input.change(function() {
        //   var current = $input.typeahead("getActive");
        //   if (current) {
        //     // Some item from your model is active!
        //     if (current.name == $input.val()) {
        //       // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
        //     } else {
        //       // This means it is only a partial match, you can either add a new item
        //       // or take the active if you don't want new items
        //     }
        //   } else {
        //     // Nothing is active so it is a new value (or maybe empty value)
        //   }
        // });
        // $('input').tagsinput({
        //   typeahead: {
        //     name: 'citynames',
        //     displayKey: 'name',
        //     valueKey: 'name',
        //     source: citynames.ttAdapter()
        //   }
        // });
        // $('.auto_wl').tagsinputx({
        //                 source: worship_leader,
        //                 displayText: function (item){ return item.nama},
        //                 afterSelect: function (item){ return item.id_pelayan}
         
        
        
      });
    </script> -->
    <!-- autocomplete wl -->
    <script type="text/javascript">
      $(function() {
      var datas = [];
      

      ajaxCallAtTheFirst();
      var arrCopy;
      // initializeBloodhoundAndTheOtherStuffs(arrCopy);
      // if(){
      //   console.log('TRUE!');
      // }
      
      function ajaxCallAtTheFirst(){
        $.ajax({
              url: "<?php echo base_url('komisimusik/get_worship_leader');?>",
              type: "POST",
              dataType: "json",
              success: function(result) {
                processTheResult(result);
              }
        });
      }
      
      function processTheResult(result){
        var arr = $.map(result, function(el){
                                  return el.nama;
                                }
                       );
        arrCopy = arr;
        // var a = [1, 2, 3];
        var b = new Array(arr.length);
        for (var i = 0; i < arr.length; i++) {
          b[i] = arr[i];
        }
        initializeBloodhoundAndTheOtherStuffs(b);
        console.log("arrCopy inside function");
        console.log(arrCopy);
        console.log("-----------------------");
        console.log(b);
      }

      function initializeBloodhoundAndTheOtherStuffs(arr){
        var wl = new Bloodhound({
        datumTokenizer:  function(d) { return Bloodhound.tokenizers.whitespace(d.name); },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: 
           $.map(arr, function (result) {
                        return {name: result};
                      }
                )
        });
        wl.initialize();

        $('#taginputwl .typeahead').tagsinput({
            typeaheadjs: [{
                  minLength: 1,
                  highlight: true,
            },{
                minlength: 1,
                name: 'tesHasil',
                displayKey: 'name',
                valueKey: 'name',
                source: wl.ttAdapter()
            }],
            freeInput : true
        });
        console.log("-------------------");
        console.log(arr);
      }
      });
    </script>
    <!-- autocomplete singers -->
    <script type="text/javascript">
      $(function() {
        var datas = [];
        

        ajaxCallAtTheFirst();
        var arrCopy;
        // initializeBloodhoundAndTheOtherStuffs(arrCopy);
        // if(){
        //   console.log('TRUE!');
        // }
        
        function ajaxCallAtTheFirst(){
          $.ajax({
                url: "<?php echo base_url('komisimusik/get_singers');?>",
                type: "POST",
                dataType: "json",
                success: function(result) {
                  processTheResult(result);
                }
          });
        }
        
        function processTheResult(result){
          var arr = $.map(result, function(el){
                                    return el.nama;
                                  }
                         );
          arrCopy = arr;
          // var a = [1, 2, 3];
          var b = new Array(arr.length);
          for (var i = 0; i < arr.length; i++) {
            b[i] = arr[i];
          }
          initializeBloodhoundAndTheOtherStuffs(b);
          console.log("arrCopy inside function");
          console.log(arrCopy);
          console.log("-----------------------");
          console.log(b);
        }

        function initializeBloodhoundAndTheOtherStuffs(arr){
          var wl = new Bloodhound({
          datumTokenizer:  function(d) { return Bloodhound.tokenizers.whitespace(d.name); },
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: 
             $.map(arr, function (result) {
                          return {name: result};
                        }
                  )
          });
          wl.initialize();

          $('#taginputsingers .typeahead').tagsinput({
              typeaheadjs: [{
                    minLength: 1,
                    highlight: true,
              },{
                  minlength: 1,
                  name: 'tesHasil',
                  displayKey: 'name',
                  valueKey: 'name',
                  source: wl.ttAdapter()
              }],
              freeInput : true
          });
          console.log("-------------------");
          console.log(arr);
        }
        });
    </script>
    <!-- autocomplete keyboard/ -->
    <script type="text/javascript">
      $(function() {
        var datas = [];
        

        ajaxCallAtTheFirst();
        var arrCopy;
        // initializeBloodhoundAndTheOtherStuffs(arrCopy);
        // if(){
        //   console.log('TRUE!');
        // }
        
        function ajaxCallAtTheFirst(){
          $.ajax({
                url: "<?php echo base_url('komisimusik/get_keyboard_player');?>",
                type: "POST",
                dataType: "json",
                success: function(result) {
                  processTheResult(result);
                }
          });
        }
        
        function processTheResult(result){
          var arr = $.map(result, function(el){
                                    return el.nama;
                                  }
                         );
          arrCopy = arr;
          // var a = [1, 2, 3];
          var b = new Array(arr.length);
          for (var i = 0; i < arr.length; i++) {
            b[i] = arr[i];
          }
          initializeBloodhoundAndTheOtherStuffs(b);
          console.log("arrCopy inside function");
          console.log(arrCopy);
          console.log("-----------------------");
          console.log(b);
        }

        function initializeBloodhoundAndTheOtherStuffs(arr){
          var wl = new Bloodhound({
          datumTokenizer:  function(d) { return Bloodhound.tokenizers.whitespace(d.name); },
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: 
             $.map(arr, function (result) {
                          return {name: result};
                        }
                  )
          });
          wl.initialize();

          $('#taginputkeyboard .typeahead').tagsinput({
              typeaheadjs: [{
                    minLength: 1,
                    highlight: true,
              },{
                  minlength: 1,
                  name: 'tesHasil',
                  displayKey: 'name',
                  valueKey: 'name',
                  source: wl.ttAdapter()
              }],
              freeInput : true
          });
          console.log("-------------------");
          console.log(arr);
        }
        });
    </script>

    <script type="text/javascript">
      $(function() {
        var datas = [];
        

        ajaxCallAtTheFirst();
        var arrCopy;
        // initializeBloodhoundAndTheOtherStuffs(arrCopy);
        // if(){
        //   console.log('TRUE!');
        // }
        
        function ajaxCallAtTheFirst(){
          $.ajax({
                url: "<?php echo base_url('komisimusik/get_guitar_player');?>",
                type: "POST",
                dataType: "json",
                success: function(result) {
                  processTheResult(result);
                }
          });
        }
        
        function processTheResult(result){
          var arr = $.map(result, function(el){
                                    return el.nama;
                                  }
                         );
          arrCopy = arr;
          // var a = [1, 2, 3];
          var b = new Array(arr.length);
          for (var i = 0; i < arr.length; i++) {
            b[i] = arr[i];
          }
          initializeBloodhoundAndTheOtherStuffs(b);
          console.log("arrCopy inside function");
          console.log(arrCopy);
          console.log("-----------------------");
          console.log(b);
        }

        function initializeBloodhoundAndTheOtherStuffs(arr){
          var wl = new Bloodhound({
          datumTokenizer:  function(d) { return Bloodhound.tokenizers.whitespace(d.name); },
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: 
             $.map(arr, function (result) {
                          return {name: result};
                        }
                  )
          });
          wl.initialize();

          $('#taginputguitar .typeahead').tagsinput({
              typeaheadjs: [{
                    minLength: 1,
                    highlight: true,
              },{
                  minlength: 1,
                  name: 'tesHasil',
                  displayKey: 'name',
                  valueKey: 'name',
                  source: wl.ttAdapter()
              }],
              freeInput : true
          });
          console.log("-------------------");
          console.log(arr);
        }
        });
    </script>
    <script type="text/javascript">
      $(function() {
        var datas = [];
        

        ajaxCallAtTheFirst();
        var arrCopy;
        // initializeBloodhoundAndTheOtherStuffs(arrCopy);
        // if(){
        //   console.log('TRUE!');
        // }
        
        function ajaxCallAtTheFirst(){
          $.ajax({
                url: "<?php echo base_url('komisimusik/get_bass_player');?>",
                type: "POST",
                dataType: "json",
                success: function(result) {
                  processTheResult(result);
                }
          });
        }
        
        function processTheResult(result){
          var arr = $.map(result, function(el){
                                    return el.nama;
                                  }
                         );
          arrCopy = arr;
          // var a = [1, 2, 3];
          var b = new Array(arr.length);
          for (var i = 0; i < arr.length; i++) {
            b[i] = arr[i];
          }
          initializeBloodhoundAndTheOtherStuffs(b);
          console.log("arrCopy inside function");
          console.log(arrCopy);
          console.log("-----------------------");
          console.log(b);
        }

        function initializeBloodhoundAndTheOtherStuffs(arr){
          var wl = new Bloodhound({
          datumTokenizer:  function(d) { return Bloodhound.tokenizers.whitespace(d.name); },
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: 
             $.map(arr, function (result) {
                          return {name: result};
                        }
                  )
          });
          wl.initialize();

          $('#taginputbass .typeahead').tagsinput({
              typeaheadjs: [{
                    minLength: 1,
                    highlight: true,
              },{
                  minlength: 1,
                  name: 'tesHasil',
                  displayKey: 'name',
                  valueKey: 'name',
                  source: wl.ttAdapter()
              }],
              freeInput : true
          });
          console.log("-------------------");
          console.log(arr);
        }
        });
    </script>
    <script type="text/javascript">
      $(function() {
        var datas = [];
        

        ajaxCallAtTheFirst();
        var arrCopy;
        // initializeBloodhoundAndTheOtherStuffs(arrCopy);
        // if(){
        //   console.log('TRUE!');
        // }
        
        function ajaxCallAtTheFirst(){
          $.ajax({
                url: "<?php echo base_url('komisimusik/get_drum_player');?>",
                type: "POST",
                dataType: "json",
                success: function(result) {
                  processTheResult(result);
                }
          });
        }
        
        function processTheResult(result){
          var arr = $.map(result, function(el){
                                    return el.nama;
                                  }
                         );
          arrCopy = arr;
          // var a = [1, 2, 3];
          var b = new Array(arr.length);
          for (var i = 0; i < arr.length; i++) {
            b[i] = arr[i];
          }
          initializeBloodhoundAndTheOtherStuffs(b);
          console.log("arrCopy inside function");
          console.log(arrCopy);
          console.log("-----------------------");
          console.log(b);
        }

        function initializeBloodhoundAndTheOtherStuffs(arr){
          var wl = new Bloodhound({
          datumTokenizer:  function(d) { return Bloodhound.tokenizers.whitespace(d.name); },
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: 
             $.map(arr, function (result) {
                          return {name: result};
                        }
                  )
          });
          wl.initialize();

          $('#taginputdrum .typeahead').tagsinput({
              typeaheadjs: [{
                    minLength: 1,
                    highlight: true,
              },{
                  minlength: 1,
                  name: 'tesHasil',
                  displayKey: 'name',
                  valueKey: 'name',
                  source: wl.ttAdapter()
              }],
              freeInput : true
          });
          console.log("-------------------");
          console.log(arr);
        }
        });
    </script>

  </body>
</html>