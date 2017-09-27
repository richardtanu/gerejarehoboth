    <!-- Page Content -->
    <style type="text/css">
        .error{
            color:red;
        }
    </style>
    <div class="container">
        <div class="row">
            <!-- <div class="col-sx-8 col-sm-6 col-md-5 col-lg-4"> -->
            <div class="col-md-8 ">
                <div class="col-md-8">
                <?php echo form_open('Login/prosesLogin');?>
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
                            <label for="userName">Username</label>
                            <input type="text" class="focus form-control" id="usernameTxt" name="usernameTxt" placeholder="username">
                                <!-- value="<?php echo set_value('userName');?>" -->
                                  <?php echo form_error('usernameTxt'); ?>                       
                        </div>
                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" class="form-control" id="passwordTxt" name="passwordTxt" placeholder="password"> 
                                <!-- value="<?php echo set_value('password'); ?>" -->
                                <!-- ?php echo form_error('password'); ?> -->
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">
                                <span class="glyphicon glyphicon-log-in"></span>Login
                            </button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    </div>
                        <div class="well">
                            <h4>Blog Categories</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled">
                                        <li><a href="#">Category Name</a>
                                        </li>
                                        <li><a href="#">Category Name</a>
                                        </li>
                                        <li><a href="#">Category Name</a>
                                        </li>
                                        <li><a href="#">Category Name</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled">
                                        <li><a href="#">Category Name</a>
                                        </li>
                                        <li><a href="#">Category Name</a>
                                        </li>
                                        <li><a href="#">Category Name</a>
                                        </li>
                                        <li><a href="#">Category Name</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="well">
                            <h4>Side Widget Well</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                        </div>
                    </div>
                    <footer>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Copyright &copy; Gereja Rehoboth 2017</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    

</body>

</html>
