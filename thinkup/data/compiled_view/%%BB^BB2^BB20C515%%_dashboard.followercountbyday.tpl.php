<?php /* Smarty version 2.6.26, created on 2012-10-13 22:58:41
         compiled from _dashboard.followercountbyday.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', '_dashboard.followercountbyday.tpl', 4, false),array('modifier', 'count', '_dashboard.followercountbyday.tpl', 7, false),array('modifier', 'urlencode', '_dashboard.followercountbyday.tpl', 14, false),)), $this); ?>
  <h2>
    <?php if ($this->_tpl_vars['instance']->network == 'twitter'): ?>Followers <?php elseif ($this->_tpl_vars['instance']->network == 'facebook page'): ?>Fans <?php elseif ($this->_tpl_vars['instance']->network == 'facebook'): ?>Friends <?php endif; ?>By Day
    <?php if ($this->_tpl_vars['follower_count_history_by_day']['trend']): ?>
        (<?php if ($this->_tpl_vars['follower_count_history_by_day']['trend'] > 0): ?><span style="color:green">+<?php else: ?><span style="color:red"><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['follower_count_history_by_day']['trend'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>/day)
    <?php endif; ?>
  </h2>
  <?php if (! $this->_tpl_vars['follower_count_history_by_day']['history'] || count($this->_tpl_vars['follower_count_history_by_day']['history']) < 2): ?>
    <div class="alert helpful">Not enough data to display chart</div>
  <?php else: ?>
      <div class="article">
        <div id="follower_count_history_by_day"></div>
    </div>
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
    google.setOnLoadCallback(drawFollowerCountByDayChart);

    <?php echo '
    function drawFollowerCountByDayChart() {
    '; ?>

        var follower_count_history_by_day_data = new google.visualization.DataTable(<?php echo $this->_tpl_vars['follower_count_history_by_day']['vis_data']; ?>
);
        <?php echo '
        var formatter = new google.visualization.NumberFormat({fractionDigits: 0});
        var formatter_date = new google.visualization.DateFormat({formatType: \'medium\'});

          formatter.format(follower_count_history_by_day_data, 1);
          formatter_date.format(follower_count_history_by_day_data, 0);
        
          var follower_count_history_by_day_chart = new google.visualization.ChartWrapper({
              containerId: \'follower_count_history_by_day\',
              chartType: \'LineChart\',
              dataTable: follower_count_history_by_day_data,
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
          follower_count_history_by_day_chart.draw();
    }
    '; ?>

</script>