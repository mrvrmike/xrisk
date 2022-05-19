<!-- cuarta parte (cuerpo general) ini -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $titulo_principal?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active"><?php echo $l_menu?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
                <?php 
                function random_color_part() {
                  return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
                }

                function random_color() {
                    return '#'.random_color_part() . random_color_part() . random_color_part();
                }

                $array1 = json_decode(json_encode($traedatos), true);
                //echo gettype($array1). ' - ';
                //echo count($array1). ' - ';
                //echo "</br>";

                for($i=0; $i<count($array1); $i++){
                $ipadd[]  = $array1[$i]['ip_address_i'];
                $iprsum[] = $array1[$i]['suma'];
                $rcolor[] = random_color();
                }
                ?>
        <div class="row">
          <div class="col-8">
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Resumen de Vulnerabilidades encontradas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                <canvas id="pieChart1" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>

                <script>
                  var va1 = [];
                  var va2 = [];
                  const traerdatos2 = <?php echo json_encode($ipadd); ?>;
                  const traerdatos3 = <?php echo json_encode($iprsum); ?>;
                  const arrrcolor = <?php echo json_encode($rcolor); ?>;
                </script>

              </div>
              <!-- /.card-body -->                

            </div>
            <!-- /.card -->
          </div>
          <div class="col-4">
        <!-- espacio para ingresar los nuevos contenidos ini -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Resumen de vulnerabilidades</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Direccion IP</th>
                    <th>Riesgo Acumulado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $c = 1;
                  foreach ($traedatos as $key => $k){
                  ?>                    
                  <tr>
                    <td><?php echo $c; ?></td>
                    <td><?php echo $k->ip_address_i; ?></td>
                    <td><?php echo $k->suma; ?></td>
                  </tr>
                  <?php 
                      $c++;
                    //endforeach; 
                    }
                  ?>                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        <!-- espacio para ingresar los nuevos contenidos fin -->
          </div>
          <!-- cierra col -->
        </div>
        <!-- cierra row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <?php
    //}
    ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>


  <!-- /.control-sidebar -->
<!-- cuarta parte (cuerpo general) fin -->