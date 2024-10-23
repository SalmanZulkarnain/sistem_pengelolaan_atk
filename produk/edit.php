<?php
include '../header.php';
getProduct();
$categories = getCategories();
updateProduct();
?>
<body>
    <h2>Edit Produk</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo getProduct()['id']; ?>">

        <label for="id_kategori">Kategori Produk:</label>
        <select name="id_kategori" id="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id']; ?>" <?php echo $category['id'] ? 'selected' : ''; ?>><?= $category['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>  

        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama_produk" placeholder="Masukkan nama produk" value="<?php echo getProduct()['nama_produk']; ?>">

        <label for="harga">Harga Produk:</label>
        <input type="number" name="harga" placeholder="Masukkan harga produk" value="<?php echo getProduct()['harga']; ?>">
        
        <label for="stok">Stok Produk:</label>
        <input type="number" name="stok" placeholder="Masukkan stok produk" value="<?php echo getProduct()['stok']; ?>">
        
        <button type="submit">Edit</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>