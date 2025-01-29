<?php 
include '../header.php';
deleteDetailTransaction();
?>
<body>
    <div class="navbar">
    <ul>
        <li><a href="../kategori/index.php">Kategori</a></li>
            <li><a href="../produk/index.php">Produk</a></li>
            <li><a href="../distributor/index.php">Pemasok</a></li>
            <li><a href="../transaksi/index.php">Transaksi</a></li>
        </ul>
    </div>
        
    <a href="tambah.php">Tambah Detail Transaksi</a>
    <table border=1 cellspacing=0 cellpadding=10>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Transaksi</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count(readAllDetailTransaction()) >= 0) : ?>
                <?php $no = 1; foreach(readAllDetailTransaction() as $detail_transaction) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $detail_transaction['id_transaksi']; ?></td>
                <td><?php echo $detail_transaction['nama_produk']; ?></td>
                <td><?php echo $detail_transaction['jumlah']; ?></td>
                <td>Rp<?php echo number_format($detail_transaction['harga']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $detail_transaction['id']; ?>">Edit</a> |
                    <a href="index.php?id=<?php echo $detail_transaction['id']; ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a> 
                </td>
            </tr>
                <?php $no++; endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
<?php 
include '../footer.php';
?>