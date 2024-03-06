<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-pencil"></i> <span>SVPR</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido(a)</span>
                <h2><?php echo ucfirst($_SESSION['nombre']); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Barra de navegación</h3>
                <ul class="nav side-menu">
                  <li><a href="inicio.php"><i class="fa fa-home"></i> Inicio </a>
                    
                  </li>
                  <li><a><i class="fa fa-usd"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="nueva_venta.php">Añadir Venta</a></li>
                      <li><a href="ventas.php">Administrar Ventas</a></li>
                    </ul>
                  </li>
                  <?php if ($_SESSION['privilegio']=="admin") {
                          echo "

                  <li><a><i class='fa fa-pencil-square-o'></i> Inventario <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='nuevo_inventario.php'>Añadir Inventario</a></li>
                      <li><a href='inventario.php'>Administrar Inventario</a></li>
                    </ul>
                  </li>
                  <li><a><i class='fa fa-pencil-square-o'></i> Categorias <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='nueva_categoria.php'>Añadir Categoría</a></li>
                      <li><a href='categorias.php'>Administrar Categorias</a></li>
                    </ul>
                  </li>
                  <li><a><i class='fa fa-user'></i> Usuarios <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='nuevo_usuario.php'>Añadir Usuario</a></li>
                      <li><a href='usuarios.php'>Administrar Usuarios</a></li>
                    </ul>
                  </li>
                  <li><a><i class='fa fa-cog'></i> Opciones <span class='fa fa-chevron-down'></span></a>
                    <ul class='nav child_menu'>
                      <li><a href='ajustes.php'>Respaldo de información</a></li>
            
                    </ul>
                  </li>

                          ";
                        } 
                        else{echo "";}
                  ?>

                </ul>
              </div>
             

            </div>
            <!-- /sidebar menu -->

    
            <!-- /menu footer buttons -->
          </div>
        </div>