 <!-- ########## START: LEFT PANEL ########## -->
 <div class="br-logo"><a href="../UsuHome/"><span>[</span>Empresa<span>]</span></a></div>
 <div class="br-sideleft overflow-y-auto">
     <label class="sidebar-label pd-x-15 mg-t-20">Menu</label>
     <div class="br-sideleft-menu">
         <a href="../UsuHome/" class="br-menu-link">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Inicio</span>
             </div>
         </a>
         <?php
            if ($_SESSION["rol_id"] == 1) {
            ?>

         <a href="../UsuCurso/" class="br-menu-link">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                 <span class="menu-item-label">Mis Cursos</span>
             </div>
         </a>

         <?php
            } else {
            ?>

         <a href="#" class="br-menu-link">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                 <span class="menu-item-label">Mantenimiento</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- br-menu-link -->
         <ul class="br-menu-sub nav flex-column">
             <li class="nav-item"><a href="../AdminMntUsuario/" class="nav-link">Usuario</a></li>
             <li class="nav-item"><a href="../AdminMntCurso/" class="nav-link">Curso</a></li>
             <li class="nav-item"><a href="../AdminMntCategoria/" class="nav-link">Categoria</a></li>
             <li class="nav-item"><a href="../AdminMntInstructor/" class="nav-link">Instructor</a></li>
             <li class="nav-item"><a href="../AdminDetalleCertificado/" class="nav-link">Detalle de Certificado</a></li>
         </ul>

         <?php
            }
            ?>
         <a href="../UsuPerfil/" class="br-menu-link">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                 <span class="menu-item-label">Perfil</span>
             </div>
         </a>
         <a href="../html/Logout.php" class="br-menu-link">
             <div class="br-menu-item">
                 <i class="menu-item-icon icon ion-power tx-24"></i>
                 <span class="menu-item-label">Cerrar Sesion</span>
             </div>
         </a>

     </div>
 </div><!-- br-sideleft -->
 <!-- ########## END: LEFT PANEL ########## -->