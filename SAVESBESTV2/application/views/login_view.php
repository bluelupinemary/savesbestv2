<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/logincss.css">

<body>
      <nav class="navbar navbar-fixed-top">
        <!--start of the navbar title section-->
        <div class="navbar-header lighten-blue">
          <img class="login-img" src="devtools/images/bill/uplb.png" height="50px" width="60px"/>
          <img class="login-img" src="devtools/images/bill/logo-trans.png" height="50px" width="60px"/>
        </div>
      </nav>

      <!--start of the main page section-->
     <div class="container">
          <h1>Sustainable Application of Versatile Electronic System <br/>
Billing of Electricity and other services' Software Technology<h1>
            <!--START OF LOGIN BOX-->
            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3">
                <div class="panel panel-default" style="background-color: rgba(255,255,255,0.3);">
                    <div class="panel-heading">
                        <div class="panel-title text-center">
                            <img src="devtools/images/bill/login.png" height="60px" width="50px">
                        Login
                        </div>
                    </div>
                    <div class="panel-body" style="">
                        <div class="sign-in-panel">
                            <?php  echo form_open('VerifyLogin2',array('class' => 'navbar-form navbar-right')); ?>
                                      Username:
                                <div class="sign-in-panel form-group input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <input type="text" placeholder="Username" size="25"class="form-control" id="username" name="username"/>
                                </div>
                                <br/>
                                      Password:
                                <div class="sign-in-panel form-group input-group">
                                      <span class="input-group-addon"> <i class="glyphicon glyphicon-asterisk"></i></span>
                                      <input type="password" placeholder="Password" size="25" class="form-control" id="password" name="password"/>
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-primary" value="Submit"/>
                                <?php if(validation_errors()):?>
                                  <label style="color:red"><?php echo validation_errors();?></label>
                            <?php endif; ?>
                            </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
</body>
