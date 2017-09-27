<!DOCTYPE html>
<html lang="en">
 <head>
    <link href="<?= base_url();?>css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
            <div class="row">
               <div class="col-md-6">
                 <div class="row">
                  <div class="col-md-12">
                      <h3>Login Successful <?=$this->session->userdata('nama')?> <?=$this->session->userdata('role')?></h3>
                      <a href="<?= base_url();?>index.php/logout">Logout</a>                                               
                     </div>
                   </div>
                </div>               
            </div>
  </div>        
    </body>
</html>