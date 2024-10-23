<?php
include '../header.php';
getTransaction();
$distributors = getDistributor();
updateTransaction();
?>
<body>
    <h2>Edit Detail Transaksi</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo getTransaction()['id']; ?>">

        <label for="id_pemasok">Pemasok Produk:</label>
        <select name="id_pemasok" id="id_pemasok">
            <option value="">Pilih Pemasok</option>
            <?php foreach ($distributors as $distributor): ?>
                <option value="<?= $distributor['id']; ?>" <?php echo $distributor['id'] ? 'selected' : ''; ?>><?= $distributor['nama_pemasok']; ?></option>
            <?php endforeach; ?>
        </select>  

        <label for="tanggal">Tanggal transaksi:</label>
        <input type="date" name="tanggal" value="<?php echo getTransaction()['tanggal']; ?>">

        <label for="total">Total harga:</label>
        <input type="number" name="total" placeholder="Masukkan total harga" value="<?php echo getTransaction()['total']; ?>">
        
        <button type="submit">Edit</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>