<?php 
include '../header.php';
createDistributor();
?>
<body>
    <h2>Tambah Pemasok</h2>
    <form method="POST">
        <label for="nama_pemasok">Nama Pemasok:</label>
        <input type="text" name="nama_pemasok" id="nama_pemasok" placeholder="Masukkan nama pemasok">

        <label for="alamat">Alamat Pemasok:</label>
        <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat pemasok">

        <label for="telepon">Telepon Pemasok:</label>
        <input type="text" name="telepon" id="telepon" placeholder="Masukkan telepon pemasok">
        
        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>