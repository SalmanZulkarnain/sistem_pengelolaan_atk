<?php

require_once '../config.php';

function connect_db()
{
    $db = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    return $db;
}

function readAllDetailTransaction()
{
    $sql = connect_db()->query("SELECT * FROM detail_transaksi");

    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function createDetailTransaction(): void
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_transaksi = $_POST['id_transaksi'];
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];

        if (!empty($id_transaksi) && !empty($id_produk) && !empty($jumlah) && !empty($harga)) {
            $sql = connect_db()->query("INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, harga) VALUES ('$id_transaksi', '$id_produk', '$jumlah', '$harga')");

            if ($sql == TRUE) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: tambah.php?pesan="Gagal menambahkan data transaksi"');
                exit;
            }
        }
    }
}
function getDetailTransaction()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];

        $pesan = '';

        if (!empty($id)) {
            $sql = connect_db()->query("SELECT * FROM transaksi WHERE id = '$id'");

            if ($sql == TRUE) {
                return $sql->fetch_assoc();
            } else {
                $pesan = "Gagal mengambil data";
            }

        }
        return $pesan;
    }
}

function getProduct(): array
{
    $sql = connect_db()->query("SELECT id, nama_produk FROM produk");
    $data = [];

    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
function getTransaction(): array
{
    $sql = connect_db()->query("SELECT id FROM transaksi");
    $data = [];

    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function updateDetailTransaction()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $id_pemasok = $_POST['id_pemasok'];
        $tanggal = $_POST['tanggal'];
        $total = $_POST['total'];

        if (!empty($id) && !empty($id_pemasok) && !empty($tanggal) && !empty($total)) {
            $sql = connect_db()->query("UPDATE transaksi SET id_pemasok = '$id_pemasok', tanggal = '$tanggal', total = '$total' WHERE id = '$id'");

            if ($sql == TRUE) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: edit.php?pesan="Gagal mengupdate data transaksi"');
                exit;
            }
        }
    }
}

function deleteDetailTransaction()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = connect_db()->query("DELETE FROM detail_transaksi WHERE id = '$id'");

        if ($sql == TRUE) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: index.php?pesan="Gagal menghapus data"');
            exit;
        }
    }
}