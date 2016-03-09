<!DOCTYPE html><html lang="en">
<head>
  <title>Dto 14</title>   
	<meta charset="utf-8">	
	<meta name="description" content="Sistema sobre Bootstrap 2.0 y Jquery UI Lightness 1.10.2">
  <meta name="author" content="Luis G. Villaseñor">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">    
  <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" />
  <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.min.js"></script>
  <style type="text/css">
    #subheader {
      background-color: #CCC;
      margin: auto;
      height: 20px;
      width: 100%;
      text-align: center;
      word-spacing: normal;
      letter-spacing: normal;
      vertical-align: middle;
      white-space: normal;
      display: inline-block;      
    }
    #wrapper {
      background-color: transparent;
      margin-top: 70px;
      padding-top: 10px;
      padding-left: 10px;
      padding-right: 10px;
      
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
        console.log('el documento está preparado');
    });
  </script>
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
            } ?>
<div class="container-fluid">

<div class="hero-unit span12"></div>    
  <!-- row-fluid -->
  <div class="hero-unit span6">

    <table class="table table-bordered table-hover">
      <tr><td><a href="<?php echo site_url();?>/coordinadores/index"><i class="icon-home"></i>DETALLES</a></td></tr>
      <tr>
        <th>Activista</th>
        <th>Estructura</th>
        <th>Votaron</th>
        <th>Calificación</th>
      </tr>
      
      <?php foreach ($get_calif_rz as $calif_rz ) : ?>
        <tr>           
          <td>Responsables de Zona</td>
          <td><?php echo $calif_rz->estructura; $est_co = $calif_rz->estructura; ?></td>
          <td><?php echo $calif_rz->votaron; $vot_co = $calif_rz->votaron; ?></td>
          <td><?php echo round($calif_rz->calificacion,2); $calif_co = $calif_rz->calificacion; ?></td>
        </tr>                  
      <?php endforeach; ?>
      <?php foreach ($get_calif_rs as $calif_rs ) : ?>
        <tr>           
          <td>Responsables de Sección</td>
          <td><?php echo $calif_rs->estructura; $est_rz = $calif_rs->estructura; ?></td>
          <td><?php echo $calif_rs->votaron; $vot_rz = $calif_rs->votaron; ?></td>
          <td><?php echo round($calif_rs->calificacion,2); $calif_rz = $calif_rs->calificacion; ?></td>
        </tr>                  
      <?php endforeach; ?>
      <?php foreach ($get_calif_jm as $calif_jm ) : ?>
      <tr>           
        <td>Jefes de Manzana</td>
        <td><?php echo $calif_jm->estructura; $est_rs = $calif_jm->estructura; ?></td>
        <td><?php echo $calif_jm->votaron; $vot_rs = $calif_jm->votaron; ?></td>
        <td><?php echo round($calif_jm->calificacion,2); $calif_rs = $calif_jm->calificacion; ?></td>
      </tr>
      <?php endforeach; ?>
      <?php foreach ($get_calif_pr as $calif_pr ) : ?>
        <tr>           
          <td>Promotores</td>
          <td><?php echo $calif_pr->estructura; $est_jm = $calif_pr->estructura; ?></td>
          <td><?php echo $calif_pr->votaron; $vot_jm = $calif_pr->votaron; ?></td>
          <td><?php echo round($calif_pr->calificacion,2); $calif_jm = $calif_pr->calificacion; ?></td>
        </tr>                  
      <?php endforeach; ?>
      <?php foreach ($get_calif_pro as $calif_pro ) : ?>
        <tr>           
          <td>Promovidos</td>
          <td><?php echo $calif_pro->estructura; $est_pr = $calif_pro->estructura; ?></td>
          <td><?php echo $calif_pro->votaron; $vot_pr = $calif_pro->votaron; ?></td>
          <td><?php echo round($calif_pro->calificacion,2); $calif_prom = $calif_pro->calificacion; ?></td>
        </tr>                  
      <?php endforeach; ?>
    </table>

    <?php include "libchart/libchart/classes/libchart.php";

$chart = new PieChart(500,300);

  $dataSet = new XYDataSet();
  $dataSet->addPoint(new Point("Coordinadores", $calif_co));
  $dataSet->addPoint(new Point("Responsable de Zona", $calif_rz));
  $dataSet->addPoint(new Point("Responsable de Seccion", $calif_rs));
  $dataSet->addPoint(new Point("Jefes de Manzana", $calif_jm));
  $dataSet->addPoint(new Point("Promotores", $calif_prom));
  
  
  $chart->setDataSet($dataSet);

  $chart->setTitle("Distrito XIV");
  $chart->render("posada/DEMOOOOO.png");


$chart = new VerticalBarChart(500,250);

  $serie1 = new XYDataSet();
  $serie1->addPoint(new Point("Resp Zona", $est_co));
  $serie1->addPoint(new Point("Resp Secc", $est_rz));
  $serie1->addPoint(new Point("Jefes Manz", $est_rs));
  $serie1->addPoint(new Point("Promotores", $est_jm));
  $serie1->addPoint(new Point("Promovidos", $est_pr));
  
  
  $serie2 = new XYDataSet();
  $serie2->addPoint(new Point("Coordinador", $vot_co));
  $serie2->addPoint(new Point("Resp Zona", $vot_rz));
  $serie2->addPoint(new Point("Resp Secc", $vot_rs));
  $serie2->addPoint(new Point("Jefes Manz", $vot_jm));
  $serie2->addPoint(new Point("Promovidos", $vot_pr));
  
  
  $dataSet = new XYSeriesDataSet();
  $dataSet->addSerie("Estructura", $serie1);
  $dataSet->addSerie("Votaron", $serie2);
  $chart->setDataSet($dataSet);
  $chart->getPlot()->setGraphCaptionRatio(0.65);

  $chart->setTitle("Estructura VS Votantes");
  $chart->render("posada/DEMOOOO2.png");


?>


    <div>
      <img src="<?php echo base_url(); ?>posada/DEMOOOO2.png" class="img-rounded border-radius" width="500px" >
    </div> 
  </div>
   
</div><!-- container --> 




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