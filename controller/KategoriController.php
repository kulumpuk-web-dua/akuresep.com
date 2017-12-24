<?php 
  if(!defined("YO")) die();
  class KategoriController extends BaseController{
    public function index()
    {
      $data = [];
      $data['kategories'] = $this->getDataAsObject("SELECT * FROM kategori ORDER BY nama ASC");

      echo $this->view('view/kategori/list.php', $data);
      # code...
    }
    public function detail()
    {
      $data = [];
      $id_kat = $_GET['id_kategori'];
      $data['kategori'] = $this->getDataAsObject("SELECT * FROM kategori WHERE id=".$id_kat);
      $data['reseps'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang  ,
      (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
      from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE id_kategori=".$id_kat);
      echo $this->view('view/kategori/detail.php', $data);
    }

    public function batchKategori()
    {
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Makanan','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Minuman','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Sambal','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Cemilan','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Kue','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Sop','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Tumis','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Kukus','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Panggang','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Gorengan','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
      // $this->executeQuery("INSERT INTO kategori (nama,deskripsi,gambar) VALUES ('Dessert','Qui elit dolor do culpa velit ut officia fugiat.','anekakue.jpg')");
    }
  }
?>