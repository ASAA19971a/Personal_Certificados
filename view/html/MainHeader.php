 <!-- ########## START: HEAD PANEL ########## -->
 <div class="br-header">
     <div class="br-header-left">
         <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
         </div>
         <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                     class="icon ion-navicon-round"></i></a></div>
     </div>
     <div class="br-header-right">
         <nav class="nav">
             <div class="dropdown">
                 <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                     <span
                         class="logged-name hidden-md-down"><?php echo $_SESSION["usu_nom"] . " " . $_SESSION["usu_ape"];  ?></span>
                     <img src="https://i.ibb.co/C7wyDzd/user.png" class="wd-32 rounded-circle" alt="">
                     <span class="square-10 bg-success"></span>
                 </a>

                 <!-- Almacenamos variables sesion en input::hidden -->
                 <input type="hidden" id="usu_idx" value="<?php echo $_SESSION["usu_id"]  ?>">

                 <div class="dropdown-menu dropdown-menu-header wd-200">
                     <ul class="list-unstyled user-profile-nav">
                         <li><a href="../UsuPerfil/"><i class="icon ion-ios-gear"></i> Perfil</a></li>
                         <li><a href="../html/Logout.php"><i class="icon ion-power"></i> Cerrar Sesion</a></li>
                     </ul>
                 </div>
             </div>
         </nav>
     </div>
 </div>
 <!-- ########## END: HEAD PANEL ########## -->