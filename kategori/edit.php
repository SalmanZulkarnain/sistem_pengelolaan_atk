<?php
include '../header.php';
getCategory();
updateCategory();
?>
<body>
    <h2>Edit Kategori</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo getCategory()['id']; ?>">

        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" name="nama_kategori" placeholder="Masukkan Nama Kategori kamu" value="<?php echo getCategory()['nama_kategori']; ?>">
        
        <button type="submit">Edit</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>