<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Captura</title>   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
    <meta name="author" content="Luis G. Villaseñor">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
</head>

<body>
<?php
  switch ($_SESSION['grupo']) {
              case 'capturista':
                include 'include/menu_capturistas.php';  
                break;
              case 'gestor':
                include 'include/menu_gestor.php';  
                break;
              case 'administrador':
                include 'include/menu_admin.php'; 
                break;
              default:
                echo '<div class="alert alert-block alert-error">';
                echo '<button type="button" class="close" data-dismiss="alert">x</button>';
                echo '<h4 class="alert-heading">Ups ! Parece ser que Usted no es Miembo de este Sitio !</h4>';
                echo '<p>';
                echo 'Por favor solicite ayuda al administrador del sitio';
                echo '</p>';
                echo '<p>';
                echo '<a class="btn btn-danger" href="'.site_url().'/admin/logout">Cerrar</a>';
                echo '</p>';
                echo '</div>';
                break;
            } 
include "libchart/libchart/classes/libchart.php";

?>

<?php 
  ////////////////// TOTAL SOLICITUDES DEL DISTRITO XIV  
  $chart = new HorizontalBarChart(380,220);
  
  $dataSet = new XYDataSet();
  foreach ($total_soli_dist as $value) {
    $dataSet->addPoint(new Point($value->distrito, $value->total));   
  }

  $chart->setDataSet($dataSet);

  $chart->getPlot()->setGraphPadding(new Padding(5,30,20,140));

  $chart->setTitle("TOTAL SOLICITUDES");

  $chart->render("demoX.png");
                
  ?>

<?php 
  ////////////////// TOTAL SOLICITUDES POR SECCION DEL DISTRITO XIV  
  $chartSec = new HorizontalBarChart(380,220);
  
  $dataSetSec = new XYDataSet();
  foreach ($total_soli_sec as $value) {
    $dataSetSec->addPoint(new Point($value->seccion, $value->total));   
  }

  $chartSec->setDataSet($dataSetSec);

  $chartSec->getPlot()->setGraphPadding(new Padding(5,30,20,140));

  $chartSec->setTitle("TOTAL SOLICITUDES x SECCION");

  $chartSec->render("demoSec.png");
                
  ?>
<?php 
  ////////////////// TOTAL SOLICITUDES POR COL ó FRACC DEL DISTRITO XIV  
  $chartRef = new HorizontalBarChart(380,220);
  
  $dataSetRef = new XYDataSet();
  foreach ($total_soli_ref as $value) {
    $dataSetRef->addPoint(new Point($value->asenta, $value->total));   
  }

  $chartRef->setDataSet($dataSetRef);

  $chartRef->getPlot()->setGraphPadding(new Padding(5,30,20,140));

  $chartRef->setTitle("TOTAL SOLICITUDES x COL/FRACC");

  $chartRef->render("demoRef.png");
                
  ?>
<div class="container-fluid">
        
    <div class="row-fluid">

        <div class="span12">
          <div class="alert alert-success">
              <div class="alert">                
                  <h2><medium>ZONA DE GRÁFICAS</medium></h2>
                  <ul class="nav nav-tabs" id="myTab">
                    <li class="">
                      <a href="#sec_1" data-toggle="tab">Total solicitudes</a>
                    </li>
                    <li class="">
                      <a href="#sec_2" data-toggle="tab">Total x Sección</a>
                    </li>
                    <li class="">
                      <a href="#sec_3" data-toggle="tab">Total x Col. ó Fracc.</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="sec_1">
                      <div class="alert alert-success">
                        <h4>TOTAL DE SOLICITUDES DEL DISTRITO XIV</h4>
                      </div>                      
                      <p><img src="<?php echo base_url();?>demoX.png"></p>
                    </div>
                    <div class="tab-pane fade" id="sec_2">
                    <div class="alert alert-success">
                        <h4>TOTAL DE SOLICITUDES POR SECCION DEL DISTRITO XIV</h4>
                    </div>                      
                    <p><img src="<?php echo base_url();?>demoSec.png"></p>
                    </div>
                    <div class="tab-pane fade" id="sec_3">
                    <div class="alert alert-success">
                        <h4>TOTAL DE SOLICITUDES POR COL. ó FRACC. DEL DISTRITO XIV</h4>
                    </div>                      
                    <p><img src="<?php echo base_url();?>demoRef.png"></p>
                    </div>
                  </div>
                </div>



        </div><!— /span12 —>
    </div><!— /row —>
</div><!— /container —>


<script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.js"></script>


<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-alert.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-button.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-carousel.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-collapse.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-popover.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-scrollspy.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-tab.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-transition.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap-typeahead.js"></script>
</body>
</html>