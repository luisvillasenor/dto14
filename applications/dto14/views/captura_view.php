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
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.min.js"></script>

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

    <div class="row-fluid">

        <div class="span12">
          <!--Body content-->
          <ul class="breadcrumb">
            <li><a href="#">Home</a> <span class="divider">/</span></li>
            <li><a href="#">Library</a> <span class="divider">/</span></li>
            <li class="active">Data</li>
          </ul>
        </div><!— /span12 —>

    </div><!— /row —>

    <div class="row-fluid">

        <div class="span12">
          <!--Body content-->
          Semana de Trabajo iniciada el día Lunes 3 de Mayo del 2013
        </div><!— /span12 —>

    </div><!— /row —>
  
    <div class="row-fluid">

        <div class="span4">
          <!--Body content-->
          <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo">
            Operaciones en Almacén
          </button>
          <div id="demo" class="collapse in"> 
            <ul class="nav nav-list">
              <li class="nav-header">Menú de Operacion</li>
              <li class="active"><a href="#">Almacen</a></li>
              <li><a href="entradas">Entradas</a></li>
              <li><a href="salidas">Salidas</a></li>
              <li><a href="#">Cortes</a></li>
            </ul>
          </div>
          
          <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo2">
            Operaciones en Catálogos
          </button>

          <div id="demo2" class="collapse in"> 
            <ul class="nav nav-list">
              <li class="nav-header">Menú de Operacion</li>
              <li><a href="productos">Productos</a></li>
              <li><a href="#">Categorias</a></li>
              <li><a href="#">Proveedores</a></li>
            </ul> 
          </div>
        </div><!— /span4 —>
        
        <div class="span8">
          <!--Body content-->
          <form>
            <fieldset>
              <legend>Inventarios por Producto</legend>
              <label>Select a Product</label>
              <select>
                <option>All</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <span class="help-line"><button type="submit" class="btn">Submit</button></span>
            </fieldset>
          </form>
                      
          <table class="table table-bordered">
            <thead></thead>
            <tbody>
              <tr>                
                <th>Producto</th>
                <th>Entradas</th>
                <th>Salidas</th>
                <th>Existencias</th>
                <th>Costo</th>
              </tr>
              <tr>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
            
          
        </div><!— /span8 —>

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