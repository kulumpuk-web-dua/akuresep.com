<?php 
if(!defined("web")) die();
 ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Managemen User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
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
                                            <th>Pekerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($datas as $data): ?>
                                       	<tr>
                                            <td><?php echo $data['nama_depan'].' '.$data['nama_belakang'] ?></td>
                                       		<td><?php echo $data['pekerjaan'] ?></td>
                                       		<td>
                                       			<a href="<?php echo $config['base_url'] ?>?c=user&profile=<?php echo $data['id'] ?>" class="btn btn-default btn-sm" target="blank"><i class="fa fa-user"></i> Lihat</a></td>
                                       	</tr>
                                    	<?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>