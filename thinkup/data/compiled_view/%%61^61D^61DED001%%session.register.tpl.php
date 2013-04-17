<?php /* Smarty version 2.6.26, created on 2012-11-09 20:13:31
         compiled from session.register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'help_link', 'session.register.tpl', 7, false),array('modifier', 'filter_xss', 'session.register.tpl', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_statusbar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container_24 thinkup-canvas clearfix round-all" style="margin-top : 30px;">

    <div class="grid_18 section" style="margin-bottom : 100px; margin-left : 100px;">
        <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'help_link', 'id' => 'register')), $this); ?>

        <h2>Register</h2>
        
        <div class="article">
        
        <div style="margin-right : 20px;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br>
        </div>
        
        <?php if (! $this->_tpl_vars['closed'] && ! $this->_tpl_vars['has_been_registered']): ?>
        <form name="form1" method="post" id="registerform" action="register.php<?php if ($this->_tpl_vars['invite_code']): ?>?code=<?php echo ((is_array($_tmp=$this->_tpl_vars['invite_code'])) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)); ?>
<?php endif; ?>" class="login append_20">
          <div class="clearfix">
            <div class="grid_4 prefix_2 right">
              <label for="full_name">
                Name:
              </label>
            </div>
            <div class="grid_10 left">
              <input name="full_name" type="text" id="full_name"<?php if (isset ( $this->_tpl_vars['name'] )): ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)); ?>
"<?php endif; ?>>
              <small>
                <br>
                Example: Angelina Jolie
              </small>
            </div>
          </div>
          <div class="clearfix">
            <div class="grid_9 prefix_6 left">
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'email')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
            <div class="grid_4 prefix_2 right">
              <label for="email">
                Email:
              </label>
            </div>
            <div class="grid_10 left">
              <input name="email" type="text" id="email"<?php if (isset ( $this->_tpl_vars['mail'] )): ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mail'])) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)); ?>
"<?php endif; ?>>
              <small>
                <br>
                Example: angie@example.com
              </small>
            </div>
          </div>
          <div class="clearfix">
            <div class="grid_9 prefix_6 left">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'password')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
            <div class="grid_4 prefix_2 right">
              <label for="pass1">
                Password:
              </label>
            </div>
            <div class="grid_10 left">
              <input name="pass1" type="password" id="pass1" class="password" onfocus="$('#password-meter').show();">
                <div class="password-meter" style="display:none;" id="password-meter">
                    <div class="password-meter-message"></div>
                    <div class="password-meter-bg">
                        <div class="password-meter-bar"></div>
                    </div>
                </div>
            </div>
          </div>
          <div class="clearfix">
            <div class="grid_6 prefix_0 right">
              <label for="pass2">
                Retype password:
              </label>
            </div>
            <div class="grid_10 left">
              <input name="pass2" type="password" id="pass2" class="password">
              <small>
                <br>
              </small>
            </div>
          </div>
          <div class="clearfix">
            <div class="grid_9 prefix_6 left">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'captcha')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
            <div class="grid_6 prefix_0 right">
              <label for="user_code">
                Prove you&rsquo;re human:
              </label>
            </div>
            <div class="grid_10 left">
              <div class="captcha">
                <?php echo $this->_tpl_vars['captcha']; ?>

              </div>
            </div>
          </div>
          <div class="clearfix">
            <div class="grid_10 prefix_7 left">
              <input type="submit" name="Submit" id="login-save" class="linkbutton emphasized" value="Register">
            </div>
          </div>
        </form>
        <?php endif; ?>
        
        </div>
        
        <div class="view-all">
            <?php if (! $this->_tpl_vars['success_msg']): ?>
            <a href="login.php">Log In</a> |
            <a href="forgot.php">Forgot password</a>
            <?php endif; ?>
        </div>
        
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>