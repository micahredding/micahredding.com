<?php /* Smarty version 2.6.26, created on 2012-10-13 23:18:38
         compiled from account.index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', 'account.index.tpl', 33, false),array('modifier', 'filter_xss', 'account.index.tpl', 241, false),array('modifier', 'relative_datetime', 'account.index.tpl', 243, false),array('modifier', 'capitalize', 'account.index.tpl', 248, false),array('insert', 'help_link', 'account.index.tpl', 73, false),array('insert', 'csrf_token', 'account.index.tpl', 104, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array('enable_tabs' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_statusbar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container_24">

  <div role="application" id="tabs">
    
    <ul>
      <li><a href="#plugins">Plugins</a></li>
      <?php if ($this->_tpl_vars['user_is_admin']): ?><li><a id="app-settings-tab" href="#app_settings">Application</a></li><?php endif; ?>
      <li><a href="#instances">Account</a></li>
      <?php if ($this->_tpl_vars['user_is_admin']): ?><li><a href="#ttusers">Users</a></li><?php endif; ?>
    </ul>
    
    <div class="section thinkup-canvas clearfix" id="plugins">
      <div class="alpha omega grid_22 prefix_1 clearfix prepend_20 append_20">

        <div class="append_20 clearfix">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'account')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php if ($this->_tpl_vars['installed_plugins']): ?>
            <?php $_from = $this->_tpl_vars['installed_plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ipindex'] => $this->_tpl_vars['ip']):
        $this->_foreach['foo']['iteration']++;
?>
              <?php if (($this->_foreach['foo']['iteration'] <= 1)): ?>
                <div class="clearfix header">
                  <div class="grid_17 alpha">name</div>
                  <?php if ($this->_tpl_vars['user_is_admin']): ?>
                  <div class="grid_4 omega">activate</div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['user_is_admin'] || $this->_tpl_vars['ip']->is_active): ?>
              <div class="clearfix bt append prepend">
                <div class="grid_18 small alpha">
                    <a href="?p=<?php if ($this->_tpl_vars['ip']->folder_name == 'googleplus'): ?><?php echo ((is_array($_tmp='google+')) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['ip']->folder_name; ?>
<?php endif; ?>"><span id="spanpluginimage<?php echo $this->_tpl_vars['ip']->id; ?>
"><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo $this->_tpl_vars['ip']->folder_name; ?>
/<?php echo $this->_tpl_vars['ip']->icon; ?>
" class="float-l" style="margin-right:5px;"></span>
                    <?php if ($this->_tpl_vars['ip']->is_active): ?><?php if (! $this->_tpl_vars['ip']->isConfigured()): ?><span class="ui-icon ui-icon-alert" style="float: left; margin:.5em 0.3em 0 0;"></span><?php endif; ?><?php endif; ?>
                    <span <?php if (! $this->_tpl_vars['ip']->is_active): ?>style="display:none;padding:5px; color : #00BDF2;"<?php endif; ?> id="spanpluginnamelink<?php echo $this->_tpl_vars['ip']->id; ?>
" style=" font-size : 1.4em;"><?php echo $this->_tpl_vars['ip']->name; ?>
</span></a>
                    <span <?php if ($this->_tpl_vars['ip']->is_active): ?>style="display:none;padding:5px; color : #00BDF2;"<?php endif; ?> id="spanpluginnametext<?php echo $this->_tpl_vars['ip']->id; ?>
" style=" font-size : 1.4em;"><?php echo $this->_tpl_vars['ip']->name; ?>
</span><br />
                    <span style="color:#666"><?php echo $this->_tpl_vars['ip']->description; ?>
</span><br>
                </div>
                <?php if ($this->_tpl_vars['user_is_admin']): ?>
                <div class="grid_4 omega">
                  <span id="spanpluginactivation<?php echo $this->_tpl_vars['ip']->id; ?>
">
                      <input type="submit" name="submit" class="linkbutton btnToggle" id="<?php echo $this->_tpl_vars['ip']->id; ?>
" value="<?php if ($this->_tpl_vars['ip']->is_active): ?>Deactivate<?php else: ?>Activate<?php endif; ?>" />
                  </span>
                  <span style="display: none;" class='linkbutton' id="messageactive<?php echo $this->_tpl_vars['ip']->id; ?>
"></span>
                  </div>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
          <?php else: ?>
            <a href="?m=manage" class="linkbutton">&laquo; Back to plugins</a>
          <?php endif; ?>
        </div>
        <?php if ($this->_tpl_vars['body']): ?>
          <?php echo $this->_tpl_vars['body']; ?>

        <?php endif; ?>
      </div>
    </div> <!-- end #plugins -->

    <?php if ($this->_tpl_vars['user_is_admin']): ?>
    <div class="section thinkup-canvas clearfix" id="app_settings">
        <div style="text-align: center" id="app_setting_loading_div">
            Loading application settings...<br /><br />
            <img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/loading.gif" width="50" height="50" />
        </div>
        <div id="app_settings_div" style="display: none;">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "account.appconfig.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <script type="text/javascript"> var site_root_path = '<?php echo $this->_tpl_vars['site_root_path']; ?>
';</script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/appconfig.js"></script>
        
   <div class="prepend_20">
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'help_link', 'id' => 'backup')), $this); ?>

    <h1>Back Up and Export Data</h1>

    <p><br />
    
    <div style="margin: 0px 0px 30px 0px;">
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
install/backup.php" class="linkbutton emphasized">Back up ThinkUp's entire database</a>
        <p style="padding-left : 20px; margin-top : 14px;">Recommended before upgrading ThinkUp.</p>
      </div>

    <div style="margin: 0px 0px 30px 0px;">
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
install/exportuserdata.php" class="linkbutton emphasized">Export a single service user's data</a>
        <p style="padding-left : 20px; margin-top : 14px;">For transfer into another existing ThinkUp database.</p>
    </div>
    </p>
  </div>
        
    </div> <!-- end #app_setting -->
    <?php endif; ?>

    <div class="sections" id="instances">
      <div class="thinkup-canvas clearfix">
        <div class="alpha omega grid_22 prefix_1 clearfix prepend_20 append_20">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'password')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'help_link', 'id' => 'account')), $this); ?>

        <h1>Password</h1><br />
          <form name="changepass" id="changepass" method="post" action="index.php?m=manage#instances" class="prepend_20 append_20">
            <div class="clearfix">
              <div class="grid_7 prefix_1 right"><label for="oldpass">Current password:</label></div>
              <div class="grid_7 left" style="margin: 0px 0px 10px 5px; width:360px;">
                <input name="oldpass" type="password" id="oldpass" style="width:360px;">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'csrf_token')), $this); ?>
<!-- reset password -->
              </div>
            </div>
            <div class="clearfix">
              <div class="grid_7 prefix_1 right"><label for="pass1">New password:</label></div>
              <div class="grid_12 left">
                <input name="pass1" type="password" id="pass1" style="width:360px;"
                onfocus="$('#password-meter').show();">
                <div class="password-meter" style="display:none;" id="password-meter">
                    <div class="password-meter-message"></div>
                    <div class="password-meter-bg">
                        <div class="password-meter-bar"></div>
                    </div>
                </div>
                <br>
              </div>
              <div class="clearfix append_bottom" style="margin: 40px 0px 0px 0px;">
                <div class="grid_7 prefix_1 right"><label for="pass2">Re-type new password:</label></div>
                <div class="grid_7 left" style=" margin: 0px 0px 10px 5px;">
                  <input name="pass2" type="password" id="pass2" style="width:360px;">
                </div>
              </div>
              <div class="prefix_8 grid_7 left">
                <input type="submit" id="login-save" name="changepass" value="Change password" class="linkbutton emphasized">
              </div>
            </div>
          </form>
<br><br>
<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'help_link', 'id' => 'rss')), $this); ?>

<h1>Automate ThinkUp Data Capture</h1><br />

<p>ThinkUp can capture data automatically if you subscribe to this secret RSS feed URL in your favorite newsreader.</p>

<div style="text-align: center; padding: 20px 0px 20px 0px;width:100%;">
<a href="<?php echo $this->_tpl_vars['rss_crawl_url']; ?>
" class="linkbutton emphasized">Secret RSS Feed to Update ThinkUp</a>
<div style="clear:all">&nbsp;<br><br><br></div>
</div>

<p>Alternately, use the command below to set up a cron job that runs hourly to update your posts. (Be sure to change yourpassword to your real password!)
<br /><br />
<div><small><code style="font-family:Courier;" id="clippy_2988"><?php echo $this->_tpl_vars['cli_crawl_command']; ?>
</code></small>


      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
              width="100"
              height="14"
              class="clippy"
              id="clippy" >
      <param name="movie" value="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/flash/clippy.swf"/>
      <param name="allowScriptAccess" value="always" />
      <param name="quality" value="high" />
      <param name="scale" value="noscale" />
      <param NAME="FlashVars" value="id=clippy_2988&amp;copied=copied!&amp;copyto=copy to clipboard">
      <param name="bgcolor" value="#FFFFFF">
      <param name="wmode" value="opaque">
      <embed src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/flash/clippy.swf"
             width="100"
             height="14"
             name="clippy"
             quality="high"
             allowScriptAccess="always"
             type="application/x-shockwave-flash"
             pluginspage="http://www.macromedia.com/go/getflashplayer"
             FlashVars="id=clippy_2988&amp;copied=copied!&amp;copyto=copy to clipboard"
             bgcolor="#FFFFFF"
             wmode="opaque"
      />
      </object>



</div>
<br /><br /><br/>
</p>

<h1>Your API Key</h1><br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'api_key')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

          <div style="padding: 20px 0px 20px 0px;">
             <strong>Your Current ThinkUp API Key:</strong>
             <span id="hidden_api_key" style="display: none;"><?php echo $this->_tpl_vars['owner']->api_key; ?>
</span>
             <span id="show_api_key">
             <a href="javascript:;" onclick="$('#show_api_key').hide(); $('#hidden_api_key').show();" class="linkbutton">
             Click to view</a>
             </span>
          </div> 

<p>Accidentally share your secret RSS URL?</p>

          <form method="post" action="index.php?m=manage#instances" class="prepend_20 append_20" 
          style="padding: 20px 0px 0px 0px;" id="api-key-form">
      <div class="grid_10 prefix_9 left">
                <input type="hidden" name="reset_api_key" value="Reset API Key" />
                <span id="apikey_conf" style="display: none;">
                Don't forget! If you reset your API key, you will need to update your ThinkUp crawler RSS feed subscription. This action cannot be undone.
                </span>
                <input type="button" value="Reset Your API Key" 
                class="linkbutton"
                <?php echo '
                onclick="if(confirm($(\'#apikey_conf\').html().trim())) { $(\'#api-key-form\').submit();}">
                '; ?>

              </div>
              <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'csrf_token')), $this); ?>
<!-- reset api_key -->
          </form>
        </div>
      </div>
    </div> <!-- end #instances -->
    
    <?php if ($this->_tpl_vars['user_is_admin']): ?>
      <div class="thinkup-canvas" id="ttusers">

     <div class="thinkup-canvas clearfix">
         <div class="alpha omega grid_20 prefix_1 clearfix prepend_20 append_20">
        <h1>Invite New User</h1>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array('field' => 'invite')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <form name="invite" method="post" action="index.php?m=manage#ttusers" class="prepend_20 append_20">
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'csrf_token')), $this); ?>
<input type="submit" id="login-save" name="invite" value="Create Invitation" 
                class="linkbutton emphasized">
          </form>
        </div>

      <div class="alpha omega grid_22 prefix_1 clearfix prepend_20 append_20">
      <h1>Registered Users</h1>

        <div class="append_20 clearfix">
        
<?php $_from = $this->_tpl_vars['owners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oid'] => $this->_tpl_vars['o']):
        $this->_foreach['oloop']['iteration']++;
?>
  <?php if (($this->_foreach['oloop']['iteration'] <= 1)): ?>
    <div class="clearfix header">
      <div class="grid_14 alpha">name</div>
      <div class="grid_3">activate</div>
      <div class="grid_3 omega">admin</div>
    </div>
  <?php endif; ?>
  
  <div class="clearfix bt append prepend">
    <div class="grid_14 small alpha">
        <span<?php if ($this->_tpl_vars['o']->is_admin): ?> style="background-color:#FFFFCC"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['o']->full_name)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)); ?>
</span><br>
        <small><?php echo ((is_array($_tmp=$this->_tpl_vars['o']->email)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)); ?>
</small>
        <span style="color:#666"><br><small><?php if ($this->_tpl_vars['o']->last_login != '0000-00-00'): ?>logged in <?php echo ((is_array($_tmp=$this->_tpl_vars['o']->last_login)) ? $this->_run_mod_handler('relative_datetime', true, $_tmp) : smarty_modifier_relative_datetime($_tmp)); ?>
 ago<?php endif; ?></small></span>
         <?php if ($this->_tpl_vars['o']->instances != null): ?>
         <br><br>Service users:
         <span style="color:#666"><br><small>
          <?php $_from = $this->_tpl_vars['o']->instances; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iid'] => $this->_tpl_vars['i']):
?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['i']->network_username)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)); ?>
 | <?php echo ((is_array($_tmp=$this->_tpl_vars['i']->network)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

              <?php if (! $this->_tpl_vars['i']->is_active): ?> (paused)<?php endif; ?><br>
          <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
           &nbsp;
        <?php endif; ?>
        </small></span>
    </div>
        <div class="grid_4">
          <?php if ($this->_tpl_vars['o']->id != $this->_tpl_vars['owner']->id): ?>
          <span id="spanowneractivation<?php echo $this->_tpl_vars['o']->id; ?>
">
          <input type="submit" name="submit" class="linkbutton toggleOwnerActivationButton" id="user<?php echo $this->_tpl_vars['o']->id; ?>
" value="<?php if ($this->_tpl_vars['o']->is_activated): ?>Deactivate<?php else: ?>Activate<?php endif; ?>" />
          </span>
          <span style="display: none;" class="linkbutton" id="messageowneractive<?php echo $this->_tpl_vars['o']->id; ?>
"></span>
          <?php endif; ?>
      </div>
        <div class="grid_4 omega">
          <?php if ($this->_tpl_vars['o']->id != $this->_tpl_vars['owner']->id && $this->_tpl_vars['o']->is_activated): ?>
          <span id="spanowneradmin<?php echo $this->_tpl_vars['o']->id; ?>
">
          <input type="submit" name="submit" class="linkbutton toggleOwnerAdminButton" id="userAdmin<?php echo $this->_tpl_vars['o']->id; ?>
" value="<?php if ($this->_tpl_vars['o']->is_admin): ?>Demote<?php else: ?>Promote<?php endif; ?>" />
          </span>
          <span style="display: none;" class="linkbutton" id="messageadmin<?php echo $this->_tpl_vars['o']->id; ?>
"></span>
          <?php endif; ?>
      </div>
  </div>
<?php endforeach; endif; unset($_from); ?>
        </div>
     </div>

          
        </div> <!-- end .thinkup-canvas -->
      </div> <!-- end #ttusers -->
    <?php endif; ?> <!-- end is_admin -->



   
  </div>
</div>

<script type="text/javascript">
  <?php echo '
$(function() {
    $(".btnPub").click(function() {
      var element = $(this);
      var u = element.attr("id");
      var dataString = \'u=\' + u + "&p=1&csrf_token=" + window.csrf_token; // toggle public on
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-public.php",
        data: dataString,
        success: function() {
          $(\'#div\' + u).html("<span class=\'linkbutton\' id=\'message" + u + "\'></span>");
          $(\'#message\' + u).html("Set to public!").hide().fadeIn(1500, function() {
            $(\'#message\' + u);
          });
        }
      });
      return false;
    });

    $(".btnPriv").click(function() {
      var element = $(this);
      var u = element.attr("id");
      var dataString = \'u=\' + u + "&p=0&csrf_token=" + window.csrf_token; // toggle public off
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-public.php",
        data: dataString,
        success: function() {
          $(\'#div\' + u).html("<span class=\'linkbutton\' id=\'message" + u + "\'></span>");
          $(\'#message\' + u).html("Set to private!").hide().fadeIn(1500, function() {
            $(\'#message\' + u);
          });
        }
      });
      return false;
    });
  });

  $(function() {
    $(".btnPlay").click(function() {
      var element = $(this);
      var u = element.attr("id");
      var dataString = \'u=\' + u + "&p=1&csrf_token=" + window.csrf_token; // toggle active on
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-active.php",
        data: dataString,
        success: function() {
          $(\'#divactivate\' + u).html("<span class=\'linkbutton\' id=\'message" + u + "\'></span>");
          $(\'#message\' + u).html("Started!").hide().fadeIn(1500, function() {
            $(\'#message\' + u);
          });
        }
      });
      return false;
    });

    $(".btnPause").click(function() {
      var element = $(this);
      var u = element.attr("id");
      var dataString = \'u=\' + u + "&p=0&csrf_token=" + window.csrf_token; // toggle active off
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-active.php",
        data: dataString,
        success: function() {
          $(\'#divactivate\' + u).html("<span class=\'linkbutton\' id=\'message" + u + "\'></span>");
          $(\'#message\' + u).html("Paused!").hide().fadeIn(1500, function() {
            $(\'#message\' + u);
          });
        }
      });
      return false;
    });
  });

  $(function() {
    var activate = function(u) {
      var dataString = \'pid=\' + u + "&a=1&csrf_token=" + window.csrf_token; // toggle plugin on
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-pluginactive.php",
        data: dataString,
        success: function() {
          $(\'#spanpluginactivation\' + u).css(\'display\', \'none\');
          $(\'#messageactive\' + u).html("Activated!").hide().fadeIn(1500, function() {
            $(\'#messageactive\' + u);
          });
          $(\'#spanpluginnamelink\' + u).css(\'display\', \'inline\');
          $(\'#\' + u).val(\'Deactivate\');
          $(\'#spanpluginnametext\' + u).css(\'display\', \'none\');
          $(\'#\' + u).removeClass(\'btnActivate\');
          $(\'#\' + u).addClass(\'btnDectivate\');
          setTimeout(function() {
              $(\'#messageactive\' + u).css(\'display\', \'none\');
              $(\'#spanpluginactivation\' + u).hide().fadeIn(1500);
            },
            2000
          );
        }
      });
      return false;
    };

    var deactivate = function(u) {
      var dataString = \'pid=\' + u + "&a=0&csrf_token=" + window.csrf_token; // toggle plugin off
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-pluginactive.php",
        data: dataString,
        success: function() {
          $(\'#spanpluginactivation\' + u).css(\'display\', \'none\');
          $(\'#messageactive\' + u).html("Deactivated!").hide().fadeIn(1500, function() {
            $(\'#messageactive\' + u);
          });
          $(\'#spanpluginnamelink\' + u).css(\'display\', \'none\');
          $(\'#spanpluginnametext\' + u).css(\'display\', \'inline\');
          $(\'#\' + u).val(\'Activate\');
          $(\'#\' + u).removeClass(\'btnDeactivate\');
          $(\'#\' + u).addClass(\'btnActivate\');
          setTimeout(function() {
              $(\'#messageactive\' + u).css(\'display\', \'none\');
              $(\'#spanpluginactivation\' + u).hide().fadeIn(1500);
            },
            2000
          );
        }
      });
      return false;
    };

    $(".btnToggle").click(function() {
      if($(this).val() == \'Activate\') {
        activate($(this).attr("id"));
      } else {
        deactivate($(this).attr("id"));
      }
    });
  });
  
    $(function() {
    var activateOwner = function(u) {
      //removing the "user" from id here to stop conflict with plugin    
      u = u.substr(4);
      var dataString = \'oid=\' + u + "&a=1&csrf_token=" + window.csrf_token; // toggle owner active on
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-owneractive.php",
        data: dataString,
        success: function() {
          $(\'#spanowneractivation\' + u).css(\'display\', \'none\');
          $(\'#messageowneractive\' + u).html("Activated!").hide().fadeIn(1500, function() {
            $(\'#messageowneractive\' + u);
          });
          $(\'#spanownernamelink\' + u).css(\'display\', \'inline\');
          $(\'#user\' + u).val(\'Deactivate\');
          $(\'#spanownernametext\' + u).css(\'display\', \'none\');
          $(\'#user\' + u).removeClass(\'btnActivate\');
          $(\'#user\' + u).addClass(\'btnDectivate\');
          $(\'#userAdmin\' + u).show();
          setTimeout(function() {
              $(\'#messageowneractive\' + u).css(\'display\', \'none\');
              $(\'#spanowneractivation\' + u).hide().fadeIn(1500);
            },
            2000
          );
        }
      });
      return false;
    };

    var deactivateOwner = function(u) {
      //removing the "user" from id here to stop conflict with plugin
      u = u.substr(4);
      var dataString = \'oid=\' + u + "&a=0&csrf_token=" + window.csrf_token; // toggle owner active off
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-owneractive.php",
        data: dataString,
        success: function() {
          $(\'#spanowneractivation\' + u).css(\'display\', \'none\');
          $(\'#messageowneractive\' + u).html("Deactivated!").hide().fadeIn(150, function() {
            $(\'#messageowneractive\' + u);
          });
          $(\'#spanownernamelink\' + u).css(\'display\', \'none\');
          $(\'#spanownernametext\' + u).css(\'display\', \'inline\');
          $(\'#user\' + u).val(\'Activate\');
          $(\'#user\' + u).removeClass(\'btnDeactivate\');
          $(\'#user\' + u).addClass(\'btnActivate\');
          $(\'#userAdmin\' + u).hide();
          setTimeout(function() {
              $(\'#messageowneractive\' + u).css(\'display\', \'none\');
              $(\'#spanowneractivation\' + u).hide().fadeIn(1500);
            },
            2000
          );
        }
      });
      return false;
    };

    var promoteOwner = function(u) {
      //removing the "userAdmin" from id here to stop conflict with plugin    
      u = u.substr(9);
      var dataString = \'oid=\' + u + "&a=1&csrf_token=" + window.csrf_token; // toggle owner active on
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-owneradmin.php",
        data: dataString,
        success: function() {
          $(\'#spanowneradmin\' + u).css(\'display\', \'none\');
          $(\'#messageadmin\' + u).html("Promoted!").hide().fadeIn(1500, function() {
            $(\'#messageadmin\' + u);
          });
          $(\'#spanownernamelink\' + u).css(\'display\', \'inline\');
          $(\'#userAdmin\' + u).val(\'Demote\');
          $(\'#spanownernametext\' + u).css(\'display\', \'none\');
          $(\'#userAdmin\' + u).removeClass(\'btnActivate\');
          $(\'#userAdmin\' + u).addClass(\'btnDectivate\');
          setTimeout(function() {
              $(\'#messageadmin\' + u).css(\'display\', \'none\');
              $(\'#spanowneradmin\' + u).hide().fadeIn(1500);
            },
            2000
          );
        }
      });
      return false;
    };

    var demoteOwner = function(u) {
      //removing the "userAdmin" from id here to stop conflict with plugin
      u = u.substr(9);
      var dataString = \'oid=\' + u + "&a=0&csrf_token=" + window.csrf_token; // toggle owner active off
      $.ajax({
        type: "GET",
        url: "'; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'account/toggle-owneradmin.php",
        data: dataString,
        success: function() {
          $(\'#spanowneradmin\' + u).css(\'display\', \'none\');
          $(\'#messageadmin\' + u).html("Demoted!").hide().fadeIn(1500, function() {
            $(\'#messageadmin\' + u);
          });
          $(\'#spanownernamelink\' + u).css(\'display\', \'none\');
          $(\'#spanownernametext\' + u).css(\'display\', \'inline\');
          $(\'#userAdmin\' + u).val(\'Promote\');
          $(\'#userAdmin\' + u).removeClass(\'btnDeactivate\');
          $(\'#userAdmin\' + u).addClass(\'btnActivate\');
          setTimeout(function() {
              $(\'#messageadmin\' + u).css(\'display\', \'none\');
              $(\'#spanowneradmin\' + u).hide().fadeIn(1500);
            },
            2000
          );
        }
      });
      return false;
    };

    $(".toggleOwnerActivationButton").click(function() {
      if($(this).val() == \'Activate\') {
        activateOwner($(this).attr("id"));
      } else {
        deactivateOwner($(this).attr("id"));
      }
    });

    $(".toggleOwnerAdminButton").click(function() {
      if($(this).val() == \'Promote\') {
        promoteOwner($(this).attr("id"));
      } else {
        demoteOwner($(this).attr("id"));
      }
    });


  });

  '; ?>

</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array('linkify' => 'false')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>