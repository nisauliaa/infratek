<!DOCTYPE html>
<html>
<head>
   <title><?= $title?></title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css') ?>">

   <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
   <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>">
   <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/js/jquery.dataTables.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/all.min.js') ?>"></script>
   <link rel="stylesheet" href="<?php echo base_url('assets/css/all.min.css') ?>" >
  
   <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
   <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
   <script type="text/javascript">
      $(document).ready( function () {
         $('#tabeldata').DataTable();
      } );
   </script>
</head>
<body>

   <div style="padding: 20px;">
    
      <h2 style="text-align: center;">DAFTAR DATA BARANG</h2>
      
      <br><br>

      <table id="tabeldata" class="table table-bordered " width="100%" cellspacing="0">


         <thead class="thead-dark">
            <tr>
               <th>No</th>
               <th>Serial Number</th>
               <th>Merk</th>
               <th>Type</th>
               <th>Serial Number Charger</th>
               <th>Jenis Perangkat</th>
               <th>Kapasitas Harddisk</th>
               <th>Memory</th>
               <th>OS</th>
               <th>Kondisi Perangkat</th>
               <th>Stock Perangkat</th>
               <th width="100%">Aksi</th>
            </tr>
         </thead>
        
         <tbody>
            <?php $i = 1;?>
               <tr>
               <?php foreach($databarang['entries'] as $row) { ?>
                  <td><?=$i++;?></td>
                  <td><?= $row['serialnumber'];?></td>
                  <td><?= $row['merk'];?></td>
                  <td><?= $row['type'];?></td>
                  <td><?= $row['sncharger'];?></td>
                  <td><?= $row['jenisperangkat'];?></td>
                  <td><?= $row['kapasitasharddisk'];?></td>
                  <td><?= $row['kapasitasmemory'];?></td>
                  <td><?= $row['os'];?></td>
                  <td><?= $row['stok'];?></td>
                  <td><?= $row['kondisi'];?></td>
                  
                  <!-- Button Aksi -->
                  <td style="text-align: center;">
                       
                     <button  type="button" class="btn btn-warning" data-toggle="modal" data-target=" #ubah<?= $row['serialnumber']; ?>">Ubah</button>
                     <a type="button" class="btn btn-danger"  href="<?= base_url('barang/hapusDataBarang/').$row['serialnumber']; ?>" onClick="return confirm('Apakah Anda Yakin?')">Hapus</a>

                  </td>
               </form>
               </tr>
            <?php } ?>
         </tbody>


      </table>

      <br>
      <a type="button" class="btn btn-success"  href="" >Kembali</a>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data Barang</button>

   </div>


   <!-- Modal Tambah Barang -->
   <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <center><h2>TAMBAH DATA BARANG</h2></center>
            </div>
          
            <form method="post" action="<?= base_url('barang/tambahDataBarang'); ?>">
               <div class="modal-body">
                  <div class="form-group">
                     <label for="serialnumber">Serial Number</label>
                     <input type="text" class="form-control" id="serialnumber" name="serialnumber" required >
                  </div>
               
                  <div class="form-group">
                     <label for="merk">Merk</label>
                     <input type="text" class="form-control" id="merk" name="merk" required >
                  </div>
              
                  <div class="form-group">
                     <label for="type">Type</label>
                     <input type="text" class="form-control" id="type" name="type" required >
                  </div>
              
                  <div class="form-group">
                     <label for="sncharger">Serial Number Charger</label>
                     <input type="text" class="form-control" id="sncharger" name="sncharger" required >
                  </div>
              
                  <div class="form-group">
                     <label for="formGroupExampleInput">Jenis Perangkat</label>
                     <br>
                     <select id="jenisperangkat" class="dropdown" name="jenisperangkat">
                        <option value="">----- Pilih -----</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Komputer">Komputer</option>
                        <option value="Printer">Printer</option>
                     </select>
                  </div>
              
                  <div class="form-group">
                     <label for="kapasitasharddisk">Kapasitas Harddisk</label>
                     <input type="text" class="form-control" id="kapasitasharddisk" name="kapasitasharddisk" required >
                  </div>
              
                  <div class="form-group">
                     <label for="kapasitasmemory">Memory</label>
                     <input type="text" class="form-control" id="kapasitasmemory" name="kapasitasmemory" required >
                  </div>
              
                  <div class="form-group">
                     <label for="os">OS</label>
                     <input type="text" class="form-control" id="os" name="os" required >
                  </div>
              
                  <div class="form-group">
                     <label for="formGroupExampleInput">Kondisi Perangkat</label>
                     <br>
                     <select id="kondisi" class="dropdown" name="kondisi">
                        <option>----- Pilih -----</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                     </select>
                  </div>
              
                  <div class="form-group">
                     <label for="stok">Stock Perangkat</label>
                     <br>
                     <input type="number" class="number" id="stok" name="stok"required> 
                  </div>
               </div>
               
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>




   
   <?php foreach($databarang as $row) { ?>
   <!-- Modal Ubah Barang -->
   <div class="modal fade" id="ubah<?=$row['serialnumber'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <center><h2>UBAH DATA BARANG</h2></center>
            </div>
          
            <form method="post" action="<?= base_url('barang/tambahDataBarang'); ?>">
               <div class="modal-body">
                  <div class="form-group">
                     <label for="serialnumber">Serial Number</label>
                     <input type="text" class="form-control" id="serialnumber" name="serialnumber" required >
                  </div>
               
                  <div class="form-group">
                     <label for="merk">Merk</label>
                     <input type="text" class="form-control" id="merk" name="merk" required >
                  </div>
              
                  <div class="form-group">
                     <label for="type">Type</label>
                     <input type="text" class="form-control" id="type" name="type" required >
                  </div>
              
                  <div class="form-group">
                     <label for="sncharger">Serial Number Charger</label>
                     <input type="text" class="form-control" id="sncharger" name="sncharger" required >
                  </div>
              
                  <div class="form-group">
                     <label for="formGroupExampleInput">Jenis Perangkat</label>
                     <br>
                     <select id="jenisperangkat" class="dropdown" name="jenisperangkat">
                        <option value="">----- Pilih -----</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Komputer">Komputer</option>
                        <option value="Printer">Printer</option>
                     </select>
                  </div>
              
                  <div class="form-group">
                     <label for="kapasitasharddisk">Kapasitas Harddisk</label>
                     <input type="text" class="form-control" id="kapasitasharddisk" name="kapasitasharddisk" required >
                  </div>
              
                  <div class="form-group">
                     <label for="kapasitasmemory">Memory</label>
                     <input type="text" class="form-control" id="kapasitasmemory" name="kapasitasmemory" required >
                  </div>
              
                  <div class="form-group">
                     <label for="os">OS</label>
                     <input type="text" class="form-control" id="os" name="os" required >
                  </div>
              
                  <div class="form-group">
                     <label for="formGroupExampleInput">Kondisi Perangkat</label>
                     <br>
                     <select id="kondisi" class="dropdown" name="kondisi">
                        <option>----- Pilih -----</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                     </select>
                  </div>
              
                  <div class="form-group">
                     <label for="stok">Stock Perangkat</label>
                     <br>
                     <input type="number" class="number" id="stok" name="stok"required> 
                  </div>
               </div>
               
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <?php } ?>



</body>
</html>