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
          $url = 'https://www.cisa.gov/sites/default/files/feeds/known_exploited_vulnerabilities.json';
                   
          //read json file from url in php
          $readJSONFile = file_get_contents($url);

                   
          //convert json to array in php
          $arr = json_decode($readJSONFile, TRUE);
          $ar2 = $arr['vulnerabilities'];

        ?>
        <div class="row">
          <div class="col-8">

            <!--mike ini-->
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"><?php echo $arr['title']; ?></h3>
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
                <div class="demo-html">
                  <table id="example" class="display" style="width:100%">
                    <thead>
                      <?php
                        echo $cabfoot = "<tr>
                            <th>cveID</th>
                            <th>vendorProject</th>
                            <th>product</th>
                            <th>vulnerabilityName</th>
                            <th>shortDescription</th>
                            <th>requiredAction</th>
                            <th>dueDate</th>
                        </tr>"
                        //echo $cabfoot;
                        ?>
                    </thead>
                    <tbody>
                        <?php
                          //for($i=0; $i<count($ar2); $i++){
                          for($i=0; $i<10; $i++){
                               echo '<tr>
                               <td>'.$ar2[$i]['cveID'].'</td>
                               <td>'.$ar2[$i]['vendorProject'].'</td>
                               <td>'.$ar2[$i]['product'].'</td>
                               <td>'.$ar2[$i]['vulnerabilityName'].'</td>
                               <td>'.$ar2[$i]['shortDescription'].'</td>
                               <td>'.$ar2[$i]['requiredAction'].'</td>
                               <td>'.$ar2[$i]['dueDate'].'</td>
                               </tr>';
                          }
                        ?>
                    </tbody>
                    <tfoot>
                      <?php echo $cabfoot; ?>
                    </tfoot>
                  </table>
                </div>

              </div>
              <!-- /.card-body -->                

            </div>
            <!-- /.card -->
            <!-- mike fin -->


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