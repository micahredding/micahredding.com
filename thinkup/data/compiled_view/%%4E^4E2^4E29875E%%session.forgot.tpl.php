<?php /* Smarty version 2.6.26, created on 2012-11-09 20:12:29
         compiled from session.forgot.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'help_link', 'session.forgot.tpl', 21, false),)), $this); ?>
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

<div class="container_24 thinkup-canvas round-all clearfix" style="margin-top : 30px;">

      <?php if (isset ( $this->_tpl_vars['error_msgs'] )): ?>
        <div class="grid_18 alert urgent" style="margin-bottom : 20px; margin-left : 100px;">
          <?php echo $this->_tpl_vars['error_msg']; ?>

        </div>
      <?php endif; ?>
      <?php if (isset ( $this->_tpl_vars['success_msg'] )): ?>
        <div class="grid_18 alert helpful" style="margin-bottom : 20px; margin-left : 100px;">
             <p>
               <span class="ui-icon ui-icon-check" style="float: left; margin:.3em 0.3em 0 0;"></span>
               <?php echo $this->_tpl_vars['success_msg']; ?>

             </p>
         </div> 
      <?php endif; ?>

<div class="grid_18 section" style="margin-bottom : 100px; margin-left : 100px;">
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'help_link', 'id' => 'forgot')), $this); ?>


    <h2>Reset Your Password</h2>

    <div class="article">
    <form name="form1" method="post" action="" class="login append_20">
      <div class="clearfix">
        <div class="grid_4 prefix_2 right">
          <label for="email">
            Email:
          </label>
        </div>
        <div class="grid_10 left">
          <input name="email" type="text" id="email">
        </div>
      </div>
      <div class="clearfix">
        <div class="grid_10 prefix_7 left">
          <input type="submit" id="login-save" name="Submit" class="linkbutton emphasized" value="Send Reset">
        </div>
      </div>
    </form>
    </div>
    <div class="view-all">
      <a href="register.php">Register</a> |
      <a href="login.php">Log In</a>
    </div>

</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>