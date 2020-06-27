

   <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

         <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg" style="margin-top: 150px;">
               <div class="card-body p-0">
               <!-- Nested Row within Card Body -->
                  <div class="row">
                     <div class="col-lg-5 d-none d-lg-block my-auto px-5">
                        <img class="mybg-login" src="<?= base_url('assets/'); ?>img/logo.jpg" width='350'>
                     </div>
                     
                     <div class="col-lg-7">
                        <div class="p-5">
                           <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                           </div>
                           <?= $this->session->flashdata('message'); ?>

                           <form class="user" method="post" action="<?= base_url('auth'); ?>">
                              <div class="form-group">
                                 <input type="text" class="form-control form-control-" id="nippos" name="nippos" placeholder="Masukkan NIP Pos" value="<?= set_value('nippos'); ?>">
                                 <?= form_error('nippos', '<small class="text-danger pl-3">','</small>'); ?>
                              </div>
                    
                              <div class="form-group">
                                 <input type="password" class="form-control form-control-" id="password" name="password" placeholder="Masukkan Kata Sandi">
                                 <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                              </div>
                    
                              <button type="submit" class="btn btn- btn-block" style="background-color: #E57016; color: #FFF;">
                                 Login
                              </button>
                           </form>
                           
                           <hr>
                  
                           <div class="text-center">
                              <a class="small" href="<?= base_url('auth/registrasi'); ?>">Belum Memiliki Akun? Buat Akun!</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>

      </div>

   </div>


