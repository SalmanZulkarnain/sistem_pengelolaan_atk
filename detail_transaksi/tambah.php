<?php 
include '../header.php';
createDetailTransaction();
$transactions = getTransaction();
$products = getProduct();
?>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST">  
        <label for="id_transaksi">ID Transaksi:</label>
        <select name="id_transaksi" id="id_transaksi">
            <option value="">Pilih ID Transaksi</option>
            <?php foreach ($transactions as $transaction): ?>
                <option value="<?= $transaction['id']; ?>"><?= $transaction['id']; ?></option>
            <?php endforeach; ?>
        </select>  

        <label for="id_produk">ID Produk:</label>
        <select name="id_produk" id="id_produk">
            <option value="">Pilih Nama Produk</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id']; ?>"><?= $product['nama_produk']; ?></option>
            <?php endforeach; ?>
        </select>  

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan jumlah">

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" placeholder="Masukkan harga">
        
        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>