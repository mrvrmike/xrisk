<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src=<?php echo base_url()."/plugins/jquery/jquery.min.js"; ?>></script>

<!-- Bootstrap -->
<script src=<?php echo base_url()."/plugins/bootstrap/js/bootstrap.bundle.min.js"; ?>></script>
<!-- overlayScrollbars -->
<script src=<?php echo base_url()."/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"; ?>></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/plugins/raphael/raphael.min.js"></script>
<script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <?php 
    if (isset($dhead)){ ?>
      <!-- <script type="text/javascript" src="/media/js/site.js?_=44555364a87fdd80f06fe495aa9139ce"></script>-->
      <!-- <script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fapi%2Fhighcharts.html" async></script>-->
      <!-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
      <!--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/searchpanes/2.0.1/js/dataTables.searchPanes.min.js"></script> -->
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://code.highcharts.com/highcharts.js"></script>
      <script type="text/javascript" class="init">
        $(document).ready(function () {
          // Create DataTable
          const table = $('#example_12').DataTable({
            dom: 'Pfrtip',
          });

          // Create the chart with initial data
          const container = $('<div/>').insertBefore(table.table().container());

          const chart = Highcharts.chart(container[0], {
            chart: {
              type: 'pie',
            },
            title: {
              text: 'Catálogo de vulnerabilidades conocidas explotadas - CISA',
            },
            series: [
              {
                data: chartData(table),
              },
            ],
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
