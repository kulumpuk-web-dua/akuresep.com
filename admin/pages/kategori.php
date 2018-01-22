<?php 
if(!defined("web")) die();
 ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kategori</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<?php if (is_get('edit') && is_get('edit')!=''): ?>
                	<div class="panel panel-default">
                		<div class="panel-heading">
                         	Edit
                        </div>
                		<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?php echo $config['admin_url'] ?>?page=kategori&update" method="POST" role="form" enctype="multipart/form-data">
                                        
                                        <input type="hidden" name="id" value="<?php echo $edit['id'] ?>">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $edit['nama'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" id="deskripsi" class="form-control text-editor" rows="10" required="required"><?php echo $edit['deskripsi'] ?></textarea>
                                        </div>
                                        <img src="<?php echo $config['base_url'].'statics/image/'.$edit['gambar'] ?>" class="img-responsive">
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                                        </div>  
                                    
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                		</div>
                	</div>
                	<?php else: ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         	<a class="btn btn-primary" data-toggle="modal" href='#add'><i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<?php if (flash('error')): ?>
                        	<div class="alert alert-danger">
                        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        		<?php echo flash('error') ?>
                        	</div>
                        	<?php endif ?>
                        	<?php if (flash('success')): ?>
                        	<div class="alert alert-success">
                        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        		<?php echo flash('success') ?>
                        	</div>
                        	<?php endif ?>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($datas as $data): ?>
                                       	<tr>
                                            <td><?php echo $data['nama'] ?></td>
                                       		<td><?php echo substr(strip_tags($data['deskripsi']),0,100) ?></td>
                                       		<td><img src="<?php echo $config['base_url'] ?>/statics/image/<?php echo $data['gambar'] ?>" class="img-responsive" style="max-width: 100px"></td>
                                       		<td><a href="<?php echo $config['admin_url'] ?>?page=kategori&delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                       			<a href="<?php echo $config['admin_url'] ?>?page=kategori&edit=<?php echo $data['id'] ?>" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a></td>
                                       	</tr>
                                    	<?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <?php endif ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Kategori</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo $config['admin_url'] ?>?page=kategori&save" method="POST" role="form" enctype="multipart/form-data">
				
					<div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea name="deskripsi" id="inputDeskripsi" class="form-control" rows="3" required="required"></textarea>
					</div>
				
					<div class="form-group">
						<label for="gambar">Gambar</label>
						<input type="file" class="form-control" id="gambar" name="gambar" required>
					</div>	
				
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>