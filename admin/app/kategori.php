<?php 
if(!defined("web")) die();


if (is_get('edit') && (intval(get('edit'))==0) || (is_get('delete') && intval(get('delete'))==0)) {
	header('Location: index.php?page=kategori');
}	

if (is_get('delete') && get('delete')!='') {
	$delete = delete("kategori",['id'=>clean(get('delete'))]);
	if ($delete) {
		flash('success','Sukses. Data telah dihapus.');
	} else {
		flash('error','Error. Data tidak dapat dihapus.');
	}
	header('Location: index.php?page=kategori');
} elseif (is_get('edit') && get('edit')!='') {	
	$edit = exec_query("SELECT * FROM kategori WHERE id=".get('edit'));
	if (count($edit)==0) {
		flash('error','Error. Data tidak dapat ditemukan.');
		header('Location: index.php?page=kategori');
	}
	$edit = $edit[0];

} elseif (is_get('update')) {
	$field = [];
	$field['nama'] = clean(post('nama'));
	$field['deskripsi'] = clean(post('deskripsi'));

	if($_FILES['gambar']['name'] != "") {
		$field['gambar'] = uploadImage('gambar');
	}

	$update = update('kategori',$field,['id'=>post('id')]);

	if ($update) {
		flash('success','Sukses. Data berhasil diubah.');
	} else {
		flash('error','Error. Data tidak dapat diubah.');
	}
	header('Location: index.php?page=kategori');

} elseif (is_get('save')) {
	$nama_file = uploadImage('gambar');
	$data = [
		'nama' => clean(post('nama')),
		'deskripsi' => clean(post('deskripsi')),
		'gambar' => $nama_file
	];
	$insert = insert('kategori',$data);
	if ($insert) {
		flash('success','Sukses. Data telah ditambahkan.');
	} else {
		flash('error','Error. Data tidak dapat ditambahkan.');
	}
	header('Location: index.php?page=kategori');
} else {
	$datas = exec_query("SELECT * FROM kategori");
}