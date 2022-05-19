<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src=<?php echo base_url()."/plugins/jquery/jquery.min.js"; ?>></script>

<!-- Bootstrap -->
<script src=<?php echo base_url()."/plugins/bootstrap/js/bootstrap.bundle.min.js"; ?>></script>
<!-- overlayScrollbars -->
<script src=<?php echo base_url()."/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"; ?>></script>
<!-- AdminLTE App -->
<script src=<?php echo base_url()."/dist/js/adminlte.js"; ?>></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src=<?php echo base_url()."/plugins/jquery-mousewheel/jquery.mousewheel.js"; ?>></script>
<script src=<?php echo base_url()."/plugins/raphael/raphael.min.js"; ?>></script>
<script src=<?php echo base_url()."/plugins/jquery-mapael/jquery.mapael.min.js"; ?>></script>
<script src=<?php echo base_url()."/plugins/jquery-mapael/maps/usa_states.min.js"; ?>></script>
  <?php 
    if (isset($dhead)){ ?>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/searchpanes/2.0.1/js/dataTables.searchPanes.min.js"></script> 
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/highcharts-3d.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>

      <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

      <script type="text/javascript" class="init">
        $(document).ready(function () {
          // Create DataTable
          const table = $('#example_12').DataTable({
            //dom: 'Pfrtip',
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'csvHtml5',
                'excelHtml5'
            ]
          });

          // Create the chart with initial data
          const container = $('<div/>').insertBefore(table.table().container());

          const chart = Highcharts.chart(container[0], {
            chart: {
              type: 'pie',
              options3d: {
                  enabled: true,
                  alpha: 45,
                  beta: 0
              }
            },
            title: {
              text: 'Catálogo de vulnerabilidades conocidas explotadas - CISA',
            },
            /*accessibility: {
              point: {
                valueSuffix: '%'
              }
            },*/
            /*tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },*/
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        //format: '{point.name}'
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
              data: chartData(table),
            }]
          });

          // On each draw, update the data in the chart
          table.on('draw', function () {
            chart.series[0].setData(chartData(table));
          });
        });

        function chartData(table) {
          const counts = {};

          // Count the number of entries for each position
          table
            .column(1, { search: 'applied' })
            .data()
            .each(function (val) {
              if (counts[val]) {
                counts[val] += 1;
              } else {
                counts[val] = 1;
              }
            });

          // And map it to the format highcharts uses
          return $.map(counts, function (val, key) {
            return {
              name: key,
              y: val,
            };
          });
        }

      </script> 
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>      
      <!-- <script type="text/javascript" language="javascript" src="https://datatables.net/examples/resources/demo.js"></script>-->
      
    <?php
    }else{
      ?>
      <!-- ChartJS -->
      <script src=<?php echo base_url()."/plugins/chart.js/Chart.min.js"; ?>></script>
      <script src=<?php echo base_url()."/dist/js/pages/dashboard2.js"; ?>></script>
      <?php
    }
    ?>




  <!---- links de estilos inicio -->
  <?php 
    if (isset($js_files)){
    foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
  <?php endforeach; }?>
  <!---- links de estilos fin -->
  <?php 
    if (isset($sp)){ ?>
       <script src="<?php echo base_url()."/js_mrmr/".$sp; ?>"></script>
  <?php 
  }
  ?>  


</body>
</html>
