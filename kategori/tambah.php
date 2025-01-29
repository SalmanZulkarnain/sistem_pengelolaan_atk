<?php 
include '../header.php';
createCategory();
?>
<body>
    <h2>Tambah Kategori</h2>
    <form method="POST">
        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" name="nama_kategori" id="nama_kategori" placeholder="Masukkan nama kategori">
        
        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>