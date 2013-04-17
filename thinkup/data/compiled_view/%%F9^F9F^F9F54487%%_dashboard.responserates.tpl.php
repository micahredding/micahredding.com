<?php /* Smarty version 2.6.26, created on 2012-10-13 23:18:29
         compiled from _dashboard.responserates.tpl */ ?>
<h2>Response Rates</h2>
<div class="clearfix article">
    <div id="response_rates"></div>
</div>

<script type="text/javascript">
    // Load the Visualization API and the standard charts
    google.load('visualization', '1');
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawResponseRatesChart);

    <?php echo '
    function drawResponseRatesChart() {
    '; ?>

        var response_rates_data = new google.visualization.DataTable(<?php echo $this->_tpl_vars['hot_posts_data']; ?>
);

        <?php echo '
        var response_rates_chart = new google.visualization.ChartWrapper({
          containerId: \'response_rates\',
          chartType: \'BarChart\',
          dataTable: response_rates_data,
          options: {
              colors: [\'#3e5d9a\', \'#3c8ecc\', \'#BBCCDD\'],
              isStacked: true,
              width: 650,
              height: 250,
              chartArea:{left:300,height:"80%"},
              legend: \'bottom\',
              hAxis: {
                textStyle: { color: \'#fff\', fontSize: 1 }
              },
              vAxis: {
                minValue: 0,
                baselineColor: \'#ccc\',
                textStyle: { color: \'#999\' },
                gridlines: { color: \'#eee\' }
              },
            }
        });
        response_rates_chart.draw();
    }
    '; ?>

</script>