<?php

require_once '../config.php';

function connect_db()
{
    $db = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    return $db;
}

function readAllCategory()
{
    $sql = connect_db()->query("SELECT * FROM kategori");

    $data = array();
    while ($row = $sql->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function createCategory(): void
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_kategori = $_POST['nama_kategori'];

        if (!empty($nama_kategori)) {
            $sql = connect_db()->query("INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");

            if ($sql == TRUE) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: tambah_user.php?pesan="Gagal menambahkan data user"');
                exit;
            }
        }
    }
}
function getCategory()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];

        $pesan = '';

        if (!empty($id)) {
            $sql = connect_db()->query("SELECT * FROM kategori WHERE id = '$id'");

            if ($sql == TRUE) {
                return $sql->fetch_assoc();
            } else {
                $pesan = "Gagal mengambil data";
            }

        }
        return $pesan;
    }
}

function updateCategory()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nama_kategori = $_POST['nama_kategori'];

        if (!empty($nama_kategori) && !empty($id)) {
            $sql = connect_db()->query("UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id = '$id'");

            if ($sql == TRUE) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: edit_user.php?pesan="Gagal mengupdate data user"');
                exit;
            }
        }
    }
}

function deleteCategory()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = connect_db()->query("DELETE FROM kategori WHERE id = '$id'");

        if ($sql == TRUE) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: index.php?pesan="Gagal menghapus data"');
            exit;
        }
    }
}