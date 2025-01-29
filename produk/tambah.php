<?php 
include '../header.php';
createProduct();
$categories = getCategories();
?>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST">  
        <label for="id_kategori">Kategori Produk:</label>
        <select name="id_kategori" id="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id']; ?>"><?= $category['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>  

        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama_produk" id="nama_produk" placeholder="Masukkan nama produk">

        <label for="harga">Harga Produk:</label>
        <input type="text" name="harga" id="harga" placeholder="Masukkan harga pemasok">

        <label for="stok">Stok Produk:</label>
        <input type="text" name="stok" id="stok" placeholder="Masukkan stok pemasok">
        
        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>