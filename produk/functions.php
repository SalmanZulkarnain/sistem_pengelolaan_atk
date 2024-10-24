<?php

require_once '../config.php';

function connect_db()
{
    $db = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    return $db;
}

function readAllProduct()
{
    $sql = connect_db()->query("SELECT produk.*, kategori.nama_kategori 
            FROM produk 
            LEFT JOIN kategori ON produk.id_kategori = kategori.id");

    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function createProduct(): void
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_kategori = $_POST['id_kategori'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        if (!empty($id_kategori) && !empty($nama_produk) && !empty($harga) && !empty($stok)) {
            $sql = connect_db()->query("INSERT INTO produk (id_kategori, nama_produk, harga, stok) VALUES ('$id_kategori', '$nama_produk', '$harga', '$stok')");

            if ($sql == TRUE) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: tambah.php?pesan="Gagal menambahkan data pemasok"');
                exit;
            }
        }
    }
}
function getProduct()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];

        $pesan = '';

        if (!empty($id)) {
            $sql = connect_db()->query("SELECT * FROM produk WHERE id = '$id'");

            if ($sql == TRUE) {
                return $sql->fetch_assoc();
            } else {
                $pesan = "Gagal mengambil data";
            }

        }
        return $pesan;
    }
}

function getCategories(): array
{
    $sql = connect_db()->query("SELECT id, nama_kategori FROM kategori");
    $data = [];

    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function updateProduct()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $id_kategori = $_POST['id_kategori'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        if (!empty($id) && !empty($id_kategori) && !empty($nama_produk) && !empty($harga) && !empty($stok)) {
            $sql = connect_db()->query("UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', harga = '$harga', stok = '$stok' WHERE id = '$id'");

            if ($sql == TRUE) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: edit.php?pesan="Gagal mengupdate data produk"');
                exit;
            }
        }
    }
}

function deleteProduct()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = connect_db()->query("DELETE FROM produk WHERE id = '$id'");

        if ($sql == TRUE) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: index.php?pesan="Gagal menghapus data"');
            exit;
        }
    }
}
