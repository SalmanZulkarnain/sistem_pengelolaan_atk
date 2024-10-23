<?php 
include '../header.php';
createTransaction();
$distributors = getDistributor();
?>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST">  
        <label for="id_pemasok">Pemasok Produk:</label>
        <select name="id_pemasok" id="id_pemasok">
            <option value="">Pilih Pemasok</option>
            <?php foreach ($distributors as $distributor): ?>
                <option value="<?= $distributor['id']; ?>"><?= $distributor['nama_pemasok']; ?></option>
            <?php endforeach; ?>
        </select>  

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal">

        <label for="total">Total Harga:</label>
        <input type="number" name="total" id="total" placeholder="Masukkan total harga">
        
        <button type="submit">Tambah</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
<?php 
include '../footer.php';
?>