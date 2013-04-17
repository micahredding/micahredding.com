<?php /* Smarty version 2.6.26, created on 2012-10-13 23:18:50
         compiled from _plugin.showhider.tpl */ ?>
<script type="text/javascript">
<?php echo '
var settings_visible = '; ?>
<?php if ($this->_tpl_vars['is_configured']): ?>true<?php else: ?>false<?php endif; ?><?php echo ';
function show_settings() {
    if (settings_visible) {
        $(".plugin-settings").hide();
        $(\'#settings-flip-prompt\').html(\'Show\');
        settings_visible = false;
        $("#settings-icon").attr("src", site_root + "assets/img/slickgrid/actions.gif");
    } else {
        $(".plugin-settings").show();
        $(\'#settings-flip-prompt\').html(\'Hide\');
        settings_visible = true;
        $("#settings-icon").attr("src", site_root + "assets/img/slickgrid/actions_reverse.jpg");
    }
}
  $(document).ready(function() {
      show_settings();
    });
'; ?>

</script>

<?php if ($this->_tpl_vars['is_configured']): ?>
<p>
    <a href="#" onclick="show_settings(); return false"><img id="settings-icon" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/slickgrid/actions.gif" /> <span id="settings-flip-prompt">Show</span> Settings</a>
</p>
<?php endif; ?>
<br><br>
<div class="plugin-settings">
<h2 class="subhead">Settings</h2>