<?php
include '../header.php';
getDistributor();
updateDistributor();
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
?>
<body>
    <h2>Edit Pemasok</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo getDistributor()['id']; ?>">

        <label for="nama_pemasok">Nama Pemasok:</label>
        <input type="text" name="nama_pemasok" placeholder="Masukkan nama pemasok" value="<?php echo getDistributor()['nama_pemasok']; ?>">

        <label for="alamat">Nama pemasok:</label>
        <input type="text" name="alamat" placeholder="Masukkan alamat pemasok" value="<?php echo getDistributor()['alamat']; ?>">
        
        <label for="telepon">Nama pemasok:</label>
        <input type="text" name="telepon" placeholder="Masukkan Nama pemasok" value="<?php echo getDistributor()['telepon']; ?>">
        
        <button type="submit">Edit</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>