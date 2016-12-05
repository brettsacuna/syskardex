            <div class="login-container">
              <div class="center">
              </div>

              <div class="space-6"></div>
              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <center>
                        <h2 class="header blue lighter bigger">
                          Acceso al Sistema
                        </h2>

                        <?php if($messages["error"]!=""){ ?>
                        <div class="callout callout-danger">
                          <p><?php echo $messages["error"];?></p>
                        </div>
                        <?php } ?>
                      </center>
                      <form id="formLogin" method="post">
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" name="name_usu" placeholder="Usuario" required/>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" class="form-control" name="pass_usu" placeholder="Contraseña" required/>
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                          </label>

                          <div class="space"></div>

                          <div class="clearfix">
                            <!--<label class="inline">
                              <input type="checkbox" class="ace" />
                              <span class="lbl"> Remember Me</span>
                            </label>-->

                            <button type="sumbit" class="width-35 pull-right btn btn-sm btn-primary">
                              <i class='ace-icon fa fa-sign-in'></i>
                              <span class="bigger-110">Ingresar</span>
                            </button>
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>
                    </div><!-- /.widget-main -->
                  </div><!-- /.widget-body -->
                </div><!-- /.login-box -->
              </div><!-- /.position-relative -->
            </div>