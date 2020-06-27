<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #E57016;" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
   
      <div class="sidebar-brand-icon">
         
         <i class="fas fa-desktop"></i>

      </div>
      
      <div class="sidebar-brand-text mx-3">INFRATEK</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Query Menu -->
   <?php 
      $role_id = $this->session->userdata('role_id');
      $queryMenu ="  SELECT `user_menu`.`id`,`menu`
                     FROM `user_menu` JOIN `user_access_menu` 
                     ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                     WHERE `user_access_menu`.`role_id` = $role_id
                     ORDER BY `user_access_menu`.`menu_id` ASC
                  ";
      $menu = $this->db->query($queryMenu)->result_array();
      
    ?>

   <!-- Looping Menu -->
   <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading">
         <?= $m['menu'];  ?>
      </div>

      <!-- Siapkan Sub Menu -->
      <?php 
         $menuId =$m['id'];
         $querySubMenu ="  SELECT *
                           FROM `user_sub_menu` JOIN `user_menu` 
                           ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                           WHERE `user_sub_menu`.`menu_id` = $menuId
                           AND `user_sub_menu`.`is_active` = 1
                        ";
         $subMenu = $this->db->query($querySubMenu)->result_array();
      ?>
   
      <?php foreach ($subMenu as $sm) : ?>

         <!-- Nav Item - Dashboard -->
         <?php if ($title == $sm['judul']) : ?>
            <li class="nav-item active">
         <?php else : ?>
            <li class="nav-item">
         <?php endif; ?>
               <a class="nav-link" href="<?= base_url($sm['url']); ?>">
               <i class="<?= $sm['icon']; ?>"></i>
               <span><?= $sm['judul']; ?></span></a>
            </li>

      <?php endforeach; ?>

         <!-- Divider -->
         <hr class="sidebar-divider">

   <?php endforeach; ?>

      <!-- <a class="nav-link" href="index.html"> -->
   <!-- Nav Item - Dashboard -->
   <!-- <li class="nav-item">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
   </li> -->

   <!-- Divider -->
   <!-- <hr class="sidebar-divider"> -->

   <!-- Heading -->
   <!-- <div class="sidebar-heading"/> -->
      <!-- User -->
   <!-- </div> -->

   <!-- Nav Item - Profil Saya -->
   <!-- <li class="nav-item">
      <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-user-alt"></i>
      <span>Profil Saya</span></a>
   </li> -->

   <!-- Nav Item - Keluar -->
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Keluar</span></a>
   </li>

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         <i class="fas fa-fw fa-cog"></i>
         <span>Components</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
         </div>
      </div>
   </li> -->

</ul>
<!-- End of Sidebar --> 