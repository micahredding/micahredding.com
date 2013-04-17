<?php /* Smarty version 2.6.26, created on 2012-10-18 00:16:00
         compiled from session.login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'help_link', 'session.login.tpl', 13, false),array('modifier', 'filter_xss', 'session.login.tpl', 25, false),)), $this); ?>
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


<div class="container_24 thinkup-canvas round-all clearfix">

    <div class="grid_18" style="margin-bottom : 20px; margin-left : 100px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    
    <div class="grid_18 section" style="margin-bottom : 100px; margin-left : 100px;">
    
        <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'help_link', 'id' => 'login')), $this); ?>

    
        <h2>Log In</h2>
        <div class="article">
            <form name="form1" method="post" action="<?php echo $this->_tpl_vars['site_root_path']; ?>
session/login.php" class="login" style="padding-bottom : 20px;">
            <div class="clearfix">
              <div class="grid_4 prefix_2 right">
                <label for="email">
                  Email:
                </label>
              </div>
              <div class="grid_10 left">
                <input type="text" name="email" id="email"<?php if (isset ( $this->_tpl_vars['email'] )): ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)); ?>
"<?php endif; ?>>
              </div>
            </div>
            <div class="clearfix">
              <div class="grid_4 prefix_2 right">
                <label for="pwd">
                  Password:
                </label>
              </div>
              <div class="grid_10 left">
                <input type="password" name="pwd" id="pwd">
              </div>
            </div>
            <div class="clearfix">
              <div class="grid_10 prefix_6 left">
                <input type="submit" id="login-save" name="Submit" class="linkbutton emphasized" value="Log In">
              </div>
            </div>
            </form>
        </div>
        <div class="view-all">
        <a href="register.php">Register</a> |
        <a href="forgot.php">Forgot password</a>
        </div>
    </div>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>