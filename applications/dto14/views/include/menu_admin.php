<header>
<div class="navbar navbar-fixed-top navbar-inverse">  
  <div class="navbar-inner">     
      <ul class="nav">  
        <li>
          <a href="<?php echo site_url();?>/captura/index">App <i class="icon-home icon-white navbar-icon-home"></i></a>
        </li>
        <li class="dropdown">          
          <a class="dropdown-toggle" data-toggle="dropdown" ><strong>Activismo</strong>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <!-- dropdown menu links -->
            <li><a data-toggle="modal" href="<?php echo site_url();?>/promotores/promotores_agregar_view">Promotores &raquo;</a></li>
          </ul>     
        </li>
      </ul> 
      <ul class="nav pull-right">  
        <li class="dropdown">  
          <a class="dropdown-toggle" data-toggle="dropdown">  
            Bienvenido <strong><?php echo $onlyusername; ?></strong>                                
                    <i class="icon-user"></i>
                    <span class="caret"></span>                
          </a>  
          <ul class="dropdown-menu"> 
            <!-- dropdown menu links -->                                              
            <li><a data-toggle="modal" href="<?php echo site_url();?>/admin/logout"><i class="icon-off"></i> Salir del Sistema &raquo;</a></li>            
          </ul>
        </li>
      </ul>
  </div>  
  <div id="subheader">Fecha:  <?php echo date('Y-m-d'); ?></div>
  
</div>
</header>
