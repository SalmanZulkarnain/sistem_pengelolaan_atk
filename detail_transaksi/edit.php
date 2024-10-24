<?php
include '../header.php';
$transactions = getTransaction();
$products = getProduct();
getDetailTransaction();
updateDetailTransaction();
?>
<body>
    <h2>Edit Detail Transaksi</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo getDetailTransaction()['id']; ?>">

        <label for="id_transaksi">ID Transaksi:</label>
        <select name="id_transaksi" id="id_transaksi">
            <option value="">Pilih ID Transaksi</option>
            <?php foreach ($transactions as $transaction): ?>
                <option value="<?= $transaction['id']; ?>" <?php echo $transaction['id'] ? 'selected' : ''; ?>><?= $transaction['id']; ?></option>
            <?php endforeach; ?>
        </select>  

        <label for="id_produk">ID Produk:</label>
        <select name="id_produk" id="id_produk">
            <option value="">Pilih Nama Produk</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id']; ?>" <?php echo $product['id'] ? 'selected' : ''; ?>><?= $product['nama_produk']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="jumlah">Jumlah Transaksi:</label>
        <input type="number" name="jumlah" value="<?php echo getDetailTransaction()['jumlah']; ?>">

        <label for="harga">Harga:</label>
        <input type="number" name="harga" placeholder="Masukkan harga harga" value="<?php echo getDetailTransaction()['harga']; ?>">
        
        <button type="submit">Edit</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>