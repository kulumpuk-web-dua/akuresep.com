<?php 
if(!defined("web")) die();

$total_resep = count_query("SELECT * FROM resep");

$total_kategori = count_query("SELECT * FROM kategori");

$total_pengguna = count_query("SELECT * FROM pengguna");
