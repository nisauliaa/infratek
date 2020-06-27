   <!-- Begin Page Content -->
   <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


   <div class="row">
   	<div class="col-lg">
   		<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>

   		<?= $this->session->flashdata('message'); ?>

   		<a class="btn btn-primary mb-3" href="" data-toggle="modal" data-target="#tambahSubMenu">Tambah Sub Menu</a>

   		<table class="table table-hover">
			  	<thead>
			    	<tr>
			      	<th scope="col">No</th>
			      	<th scope="col">Judul</th>
			      	<th scope="col">Menu</th>
			      	<th scope="col">URL</th>
			      	<th scope="col">Icon</th>
			      	<th scope="col">Is Active</th>
			      	<th scope="col">Action</th>
			    	</tr>
			  	</thead>
			  	<tbody>
			  		<?php $i = 1; ?>
			  		<?php foreach ($submenu as $rowSubMenu) : ?>
			    	<tr>
			      	<th scope="row"><?= $i;  ?></th>
			      	<td><?= $rowSubMenu['judul']; ?></td>
			      	<td><?= $rowSubMenu['menu']; ?></td>
			      	<td><?= $rowSubMenu['url']; ?></td>
			      	<td><?= $rowSubMenu['icon']; ?></td>
			      	<td><?= $rowSubMenu['is_active']; ?></td>
			      	<td>
			      		<a class="badge badge-success" href="">Ubah</a>
			      		<a class="badge badge-danger" href="">Hapus</a>
			      	</td>
			    	</tr>
			    	<?php $i++; ?>
				   <?php endforeach; ?>
			  	</tbody>
			</table>
   	</div>
   </div>

   </div>
   <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="tambahSubMenu" tabindex="-1" role="dialog" aria-labelledby="tambahSubMenu" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header">
        		<h5 class="modal-title" id="tambahSubMenu">Tambah Sub Menu</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      	</div>
      
      	<form action="<?= base_url('menu/submenu'); ?>" method="post">
	      	<div class="modal-body">
	        		<div class="form-group">
				    	<input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Sub Menu">
				  	</div>

				  	<div class="form-group">
				  		<select name="menu_id" id="menu_id" class="form-control">
				  			<option value="">Pilih Menu</option>
				  			<?php foreach ($menu as $rowMenu) : ?>
				  			<option value="<?= $rowMenu['id'] ?>"><?= $rowMenu['menu'] ?></option>
				  			<?php endforeach; ?>
				  		</select>
				  	</div>

				  	<div class="form-group">
				    	<input type="text" class="form-control" id="url" name="url" placeholder="URL Submenu">
				  	</div>

				  	<div class="form-group">
				    	<input type="text" class="form-control" id="icon" name="icon" placeholder="icon Submenu">
				  	</div>

				  	<div class="form-group">
					  	<div class="form-check">
					  		<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
					  		<label class="form-check-label" for="is_active">Is Active ?</label>
					  	</div>
				  	</div>
	      	</div>
	      
	      	<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        		<button type="submit" class="btn btn-primary">Tambah</button>
	      	</div>
      	</form>
    	</div>
  	</div>
</div>