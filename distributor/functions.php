<?php

require_once '../config.php';

function connect_db()
{
    $db = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    return $db;
}

function readAllDistributor()
{
    $sql = connect_db()->query("SELECT * FROM pemasok");

    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function createDistributor(): void
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_pemasok = $_POST['nama_pemasok'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        if (!empty($nama_pemasok && !empty($alamat) && !empty($telepon))) {
            $sql = connect_db()->query("INSERT INTO pemasok (nama_pemasok, alamat, telepon) VALUES ('$nama_pemasok', '$alamat', '$telepon')");

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
function getDistributor()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];

        $pesan = '';

        if (!empty($id)) {
            $sql = connect_db()->query("SELECT * FROM pemasok WHERE id = '$id'");

            if ($sql == TRUE) {
                return $sql->fetch_assoc();
            } else {
                $pesan = "Gagal mengambil data";
            }

        }
        return $pesan;
    }
}

function updateDistributor()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nama_pemasok = $_POST['nama_pemasok'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        if (!empty($id) && !empty($nama_pemasok) && !empty($alamat) && !empty($telepon)) {
            $sql = connect_db()->query("UPDATE pemasok SET nama_pemasok = '$nama_pemasok', alamat = '$alamat', telepon = '$telepon' WHERE id = '$id'");

            if ($sql == TRUE) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: edit.php?pesan="Gagal mengupdate data pemasok"');
                exit;
            }
        }
    }
}

function deleteDistributor()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = connect_db()->query("DELETE FROM pemasok WHERE id = '$id'");

        if ($sql == TRUE) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: index.php?pesan="Gagal menghapus data"');
            exit;
        }
    }
}
