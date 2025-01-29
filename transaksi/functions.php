<?php

require_once '../config.php';

function connect_db()
{
    $db = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    return $db;
}

function readAllTransaction()
{
    $sql = connect_db()->query("SELECT transaksi.*, pemasok.nama_pemasok 
            FROM transaksi 
            LEFT JOIN pemasok ON transaksi.id_pemasok = pemasok.id");

    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function createTransaction(): void
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_pemasok = $_POST['id_pemasok'];
        $tanggal = $_POST['tanggal'];
        $total = $_POST['total'];

        if (!empty($id_pemasok) && !empty($tanggal) && !empty($total)) {
            $sql = connect_db()->query("INSERT INTO transaksi (id_pemasok, tanggal, total) VALUES ('$id_pemasok', '$tanggal', '$total')");

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
function getTransaction()
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

function getDistributor(): array
{
    $sql = connect_db()->query("SELECT id, nama_pemasok FROM pemasok");
    $data = [];

    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function updateTransaction()
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

function deleteTransaction()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = connect_db()->query("DELETE FROM transaksi WHERE id = '$id'");

        if ($sql == TRUE) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: index.php?pesan="Gagal menghapus data"');
            exit;
        }
    }
}
