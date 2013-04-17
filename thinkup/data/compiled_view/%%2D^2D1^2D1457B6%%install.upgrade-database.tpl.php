<?php /* Smarty version 2.6.26, created on 2012-10-13 23:01:37
         compiled from install.upgrade-database.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'install.upgrade-database.tpl', 20, false),array('modifier', 'count', 'install.upgrade-database.tpl', 47, false),)), $this); ?>
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

<div class="container_24 thinkup-canvas round-all clearfix" style="margin-top : 10px;">

    <div class="grid_18" style="margin-bottom : 20px; margin-left : 100px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

  <div class="prepend_20">
    <h1>Upgrade ThinkUp's Database</h1>
  </div>

    <?php if ($this->_tpl_vars['high_table_row_count']): ?>
    <!-- too many db records, use CLI interface? -->
    <div id="info-parent" class="alert urgent" style="margin: 0px 50px 0px 50px; padding: 0.5em 0.7em;">
        <div id="migration-info">
           <p>
            <span class="ui-icon ui-icon-info" style="float: left; margin: 0.3em 0.3em 0pt 0pt;"></span>
            Wow, your database has grown! The <b><?php echo $this->_tpl_vars['high_table_row_count']['table']; ?>
</b> table  has <b><?php echo ((is_array($_tmp=$this->_tpl_vars['high_table_row_count']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ".", ",") : number_format($_tmp, 0, ".", ",")); ?>
 rows</b>.
            Since upgrading a large database can time out in the browser, we recommend that you use the <a href="http://thinkupapp.com/docs/install/upgrade.html">
            <b>command line upgrade tool</b></a> when upgrading ThinkUp.
            </p>
        </div>
    </div>
    <br />
    <?php endif; ?>

    <?php if (! $this->_tpl_vars['migrations'][0]): ?>
    <!-- no upgrade needed -->
     <div class="alert helpful" style="margin: 20px 0px; padding: 0.5em 0.7em;">
         <p>
           <span class="ui-icon ui-icon-check" style="float: left; margin:.3em 0.3em 0 0;"></span>
           Sweet! Your database is up to date. <?php if ($this->_tpl_vars['thinkup_db_version']): ?>Here's <a href="http://thinkupapp.com/docs/changelog/<?php echo $this->_tpl_vars['thinkup_db_version']; ?>
.html" target="_new">what's new in version <b><?php echo $this->_tpl_vars['thinkup_db_version']; ?>
</b></a>.<?php endif; ?>
        </p>
     </div> 
     <br>
    <div>
      <p><a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
" class="linkbutton emphasized">Start using ThinkUp</a></p>
    </div>
     
    <?php else: ?>
    <div id="info-parent" class="alert urgent" style="margin: 0px 50px 0px 50px; padding: 0.5em 0.7em;">
        <div id="migration-info">
        <p>
        <span class="ui-icon ui-icon-info" style="float: left; margin: 0.3em 0.3em 0pt 0pt;"></span>
        Your ThinkUp installation needs <?php echo count($this->_tpl_vars['migrations']); ?>
 database update<?php if (count($this->_tpl_vars['migrations']) > 1): ?>s<?php endif; ?>. <?php if ($this->_tpl_vars['user_is_admin']): ?>Before you proceed, 
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
install/backup.php">back up your current ThinkUp database</a>.<?php else: ?><br />If you haven't already, <a href="http://thinkupapp.com/docs/install/backup.html">back up your current installation's data first</a>.<?php endif; ?>
        </p>
        </div>
        <script type="text/javascript">
        var sql_array = <?php echo $this->_tpl_vars['migrations_json']; ?>
;
        </script>
    </div>
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['migrations'][0]): ?>
    <div class="clearfix">
    <br /><br />
    <div class="grid_10 prefix_9 left">
        <form name="upgrade" method="get" action="" id="upgrade-form" onsubmit="return false;">
        <input id="migration-submit" 
        name="Submit" class="linkbutton emphasized" 
        value="Update ThinkUp's Database" type="submit" style="font-size:24px;line-height:2.2em;">
        </form>
        </div>
     </div>
     
     <div id="upgrade-error" class="alert urgent" style="margin: 20px 0px; padding: 0.5em 0.7em; display: none;">
     Error
     </div>

     <div id="migration-status-details" style="margin: 20px; display: none;"><p><a href="javascript:jchange('migration-status');" class="linkbutton">Show update details:</a></p></div>
     <?php echo '
<script language="javascript" type="text/javascript">
function jchange(o) {
if(document.getElementById(o).style.display==\'none\') {
document.getElementById(o).style.display=\'block\';
 } 
}
</script>
'; ?>

     
     <div style="text-align:center; height: 31px;">
        <img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/loading.gif" style="display: none;" 
        id="migrate_spinner" width="50" height="50">
     </div>
     
     <div id="migration-status" style="margin: 20px; display: none;">
     </div>
    <?php endif; ?>

<br />&nbsp;<br />
    
</div>

<?php if ($this->_tpl_vars['upgrade_token']): ?>
<script type="text/javascript">
var upgrade_token = '<?php echo $this->_tpl_vars['upgrade_token']; ?>
';
</script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/upgrade.js"></script>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>