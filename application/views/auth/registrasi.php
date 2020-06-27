
   <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5 col-lg-9 mx-auto">
         <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
               <div class="col-lg-5 d-none d-lg-block my-auto px-auto">
                  <img class="mybg-register" src="<?= base_url(); ?>assets/img/logo.jpg" width="350px">
               </div>
               <div class="col-lg-7">
                  <div class="p-5">
                     
                     <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title;?></h1>
                     </div>
           
                     <form class="user" method="post" action="<?= base_url('auth/registrasi');  ?>">
                        <div class="form-group row">
                           <div class="col-sm mb-3 mb-sm-0">
                              <input type="text" class="form-control form-control-" id="nama" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>">
                              <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                           </div>
               
                        </div>
             
                        <div class="form-group row">
                           <div class="col-sm mb-3 mb-sm-0">
                              <input type="text" class="form-control form-control-" id="nippos" placeholder="NIP Pos" name="nippos" value="<?= set_value('nippos'); ?>">
                              <?= form_error('nippos','<small class="text-danger pl-3">','</small>'); ?>
                           </div>
               
                        </div>

                        <div class="form-group">
                           <input type="text" class="form-control form-control-" id="email" placeholder="Alamat Email" name="email" value="<?= set_value('email'); ?>">
                           <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
             
                        <div class="form-group row">
                           <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="password" class="form-control form-control-" id="password" name="password" placeholder="Kata Sandi">
                           </div>
               
                           <div class="col-sm-6">
                              <input type="password" class="form-control form-control-" id="repeat_password" name="repeat_password" placeholder="Ulangi Kata Sandi">
                           </div>
                        </div>
                        <div class="form-group row" style="margin-top: -12px; margin-left: 3px;">
                           <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
              
                        </div>
             
                        <button type="submit" class="btn btn- btn-block" style="background-color: #E57016; color: #FFF;">
                        <!-- <button type="submit" class="btn btn-primary btn- btn-block" > -->
                           Daftar
                        </button>
                     </form>
                     
                     <hr>
                     
                     <div class="text-center">
                        <a class="small" href="<?= base_url('auth') ?>">Sudah Memiliki Akun? Login!</a>
                     </div>
                  
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>