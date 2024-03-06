        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png" alt=""><?php echo ucfirst($_SESSION['privilegio']); ?>. <?php echo ucfirst($_SESSION['nombre']);?><!--Imagen y nombre que aparecen en la esquina superior derecha de la página-->
                  
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="index.php?salir"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>