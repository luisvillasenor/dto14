<?php include "libchart/libchart/classes/libchart.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Jefes de Manzana</title>   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
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

  <script>
    $(document).ready(function(){
      $(function() {
        $( "#fecha" ).datepicker({ 
          dateFormat: 'yy-mm-dd', 
          showWeek: true, 
          firstDay:1
        });
        $( ".datepicker" ).datepicker({ 
          dateFormat: 'yy-mm-dd', 
          showWeek: true, 
          firstDay:1
        });
      });
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
            } 
?>

<div class="container-fluid">
    <div id="wrapper" class="row-fluid">        
        <div class="span9">
          <!--Body content-->          
          <?php include 'include/breadcrumb.php';?> 
                               
          <table class="table table-bordered">
            <thead></thead>
            <tbody>
              <tr>                
                <th>Jefes de Manzana</th>
                <th>Voto</th>
                <th>Tabla Resumen Activismo</th>
                
              </tr>                    
                <?php foreach ($get_calif as $calif_jm ) : ?>
                  <tr>           
                    <td><?php echo $calif_jm->jefe_manzana;?></td>
                    
                    <td style="text-align:center"><?php 
                      switch ($calif_jm->voto) {
                        case '0':
                            echo ('<i class="icon-remove"></i>');
                          break;
                        case '1':
                            echo ('<i class="icon-ok"></i>');
                          break;
                        
                        default:
                          # code...
                          break;
                      }?>
                    </td>
                    <td>
                      <div class="hero-unit">
                        <table>
                          <tr>
                            
                            <th>Estructura</th>
                            <th>Votaron</th>
                            <th>Calificación</th>
                          </tr>
                          <tr>
                            
                            <td><?php echo $calif_jm->estructura;?></td>
                            <td><?php echo $calif_jm->votaron;?></td>
                            <td><?php echo $calif_jm->calificacion;?></td>
                          </tr>
                        </table>
                      </div>
                      </td>
                                           
                  </tr>                  
                <?php endforeach; ?>
            </tbody>
          </table>
          <div class="pagination">
            
          </div>          
        </div><!— /span9 —>
        <?php include 'include/nav_jefes_manzana.php';  ?>
    </div><!— /row —>
</div><!— /container —>

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