<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reporte de Productos</title>   
	<meta name="description" content="Sistema sobre Bootstrap 2.0">
  <meta name="author" content="Luis G. Villaseñor">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">    
  <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="print">
  <link rel="stylesheet" href="<?php echo base_url(); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" media="screen"/>
  <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-1.9.1.js"></script>
  <script src="<?php echo base_url(); ?>jquery-ui/js/jquery-ui-1.10.2.custom.min.js"></script>

</head>

<body>

<div class="container-fluid">
  
    <div class="row-fluid">
  <!--Body content-->    
          <header><h1>Reporte de Productos</h1></header>      
          <article class="hero-unit">


          <table class="table table-bordered">
            <thead></thead>
            <tbody  style="border: 1px solid;">
              <tr>                
                <th>Código</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Medida</th>
                <th>Costo</th>
                <th>Precio</th>
              </tr>
              <?php foreach ($get_all_productos as $key => $value) { ?>
                <tr>                
                  <td><?php echo $value->codigo;?></td>
                  <td><?php echo $value->nombre;?></td>
                  <td><?php echo $value->descripcion;?></td>
                  <td><?php echo $value->medida;?></td>
                  <td><?php echo $value->costo;?></td>
                  <td><?php echo $value->precio;?></td>
                </tr>
              <?php } ?>
              
            </tbody>
          </table>
            
          </article>
          <footer>&copy 2013</footer>
        
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

<!— /Ventana Modal AGREGAR PRODUCTO —>
<div id="nvo_prod" class="modal hide fade in" style="display: none; ">  
  
  <div class="modal-header">  
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>  
    <h3>Agregar Nuevo Producto</h3>  
  </div>  

  <div class="modal-body">  
    <?php echo form_open(site_url().'/captura/agregar_prod'); ?>
    <p>
    <div class="row-fluid">
        <div class="span6">
          <div class="alert">                
              <h2><small></small></h2>
          </div>
          <div class="alert alert-success">
            <?php
              echo form_label('Código: ',  'codigo' ) ; 
              echo form_input('codigo', set_value('codigo'), 'id="codigo"');
            ?> 
            <?php
              echo form_label('Nombre: ',  'nombre' ) ; 
              echo form_input('nombre', set_value('nombre'), 'id="nombre"');
            ?>
            <?php
              echo form_label('Descripción: ',  'descripcion' ) ; 
              echo form_input('descripcion', set_value('descripcion'), 'id="descripcion"');
            ?>
            <?php
              echo form_label('Medida: ',  'medida' ) ; 
              echo form_input('medida', set_value('medida'), 'id="medida"');
            ?>
            
          </div>
        </div>
        <div class="span6">
          <div class="alert">                
              <h2><small></small></h2>
          </div>
          <div class="alert alert-success">
            <?php
              echo form_label('Costo: ',  'costo' ) ; 
              echo form_input('costo', set_value('costo'), 'id="costo"');
            ?>
            <?php
              echo form_label('Precio: ',  'precio' ) ; 
              echo form_input('precio', set_value('precio'), 'id="precio"');
            ?>
            
          </div>  
        </div>
    </div>      
  </div>

  <div class="modal-footer">
      <button type="submit" class="btn btn-inverse">Agregar &raquo;</button>  
      <a href="#" class="btn" data-dismiss="modal">Cancelar &raquo;</a>  
  </div>
    <?php echo form_close(); ?>                  
</div><!— /Ventana Modal AGREGAR PRODUCTO —>


</body>
</html>