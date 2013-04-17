<?php /* Smarty version 2.6.26, created on 2012-10-13 22:58:41
         compiled from _dashboard.followercountbyweek.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', '_dashboard.followercountbyweek.tpl', 4, false),array('modifier', 'count', '_dashboard.followercountbyweek.tpl', 7, false),array('modifier', 'urlencode', '_dashboard.followercountbyweek.tpl', 19, false),)), $this); ?>
  <h2>
    <?php if ($this->_tpl_vars['instance']->network == 'twitter'): ?>Followers <?php elseif ($this->_tpl_vars['instance']->network == 'facebook page'): ?>Fans <?php elseif ($this->_tpl_vars['instance']->network == 'facebook'): ?>Friends <?php endif; ?> By Week
    <?php if ($this->_tpl_vars['follower_count_history_by_week']['trend'] != 0): ?>
        (<?php if ($this->_tpl_vars['follower_count_history_by_week']['trend'] > 0): ?><span style="color:green">+<?php else: ?><span style="color:red"><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['follower_count_history_by_week']['trend'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>/week)
    <?php endif; ?>
  </h2>
  <?php if (! $this->_tpl_vars['follower_count_history_by_week']['history'] || count($this->_tpl_vars['follower_count_history_by_week']['history']) < 2): ?>
      <div class="alert helpful">Not enough data to display chart</div>
  <?php else: ?>
    <div class="article">
        <div id="follower_count_history_by_week"></div>
    </div>
    <?php if ($this->_tpl_vars['follower_count_history_by_week']['milestone'] && $this->_tpl_vars['follower_count_history_by_week']['milestone']['will_take'] > 0): ?>
    <div class="stream-pagination"><small style="color:gray">
        <span style="background-color:#FFFF80;color:black"><?php echo $this->_tpl_vars['follower_count_history_by_week']['milestone']['will_take']; ?>
 week<?php if ($this->_tpl_vars['follower_count_history_by_week']['milestone']['will_take'] > 1): ?>s<?php endif; ?></span> till you reach <span style="background-color:#FFFF80;color:black"><?php echo ((is_array($_tmp=$this->_tpl_vars['follower_count_history_by_week']['milestone']['next_milestone'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 followers</span> at this rate.
    </small></div>
    <?php endif; ?>
  <div class="view-all">
    <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
?v=<?php if ($this->_tpl_vars['instance']->network != 'twitter'): ?>friends<?php else: ?>followers<?php endif; ?>&u=<?php echo ((is_array($_tmp=$this->_tpl_vars['instance']->network_username)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['instance']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
">More...</a>
  </div>
  <?php endif; ?>
  
<script type="text/javascript">
    // Load the Visualization API and the standard charts
    google.load('visualization', '1');
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawFollowerCountByWeekChart);

    <?php echo '
    function drawFollowerCountByWeekChart() {
    '; ?>

        var follower_count_history_by_week_data = new google.visualization.DataTable(<?php echo $this->_tpl_vars['follower_count_history_by_week']['vis_data']; ?>
);
        <?php echo '
        var formatter = new google.visualization.NumberFormat({fractionDigits: 0});
        var formatter_date = new google.visualization.DateFormat({formatType: \'medium\'});

          formatter.format(follower_count_history_by_week_data, 1);
          formatter_date.format(follower_count_history_by_week_data, 0);

          var follower_count_history_by_week_chart = new google.visualization.ChartWrapper({
              containerId: \'follower_count_history_by_week\',
              chartType: \'LineChart\',
              dataTable: follower_count_history_by_week_data,
              options: {
                  width: 325,
                  height: 250,
                  legend: "none",
                  interpolateNulls: true,
                  pointSize: 2,
                  hAxis: {
                      baselineColor: \'#eee\',
                      format: \'MMM d\',
                      textStyle: { color: \'#999\' },
                      gridlines: { color: \'#eee\' }
                  },
                  vAxis: {
                      baselineColor: \'#eee\',
                      textStyle: { color: \'#999\' },
                      gridlines: { color: \'#eee\' }
                  },
              },
          });
          follower_count_history_by_week_chart.draw();
    }
    '; ?>

</script>