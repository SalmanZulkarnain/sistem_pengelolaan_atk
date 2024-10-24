<?php 
include '../header.php';
deleteTransaction();
?>
<body>
<div class="navbar">
        <ul>
            <li><a href="../kategori/index.php">Kategori</a></li>
            <li><a href="../produk/index.php">Produk</a></li>
            <li><a href="../distributor/index.php">Pemasok</a></li>
            <li><a href="../detail_transaksi/index.php">Detail Transaksi</a></li>
        </ul>
    </div>
    <a href="tambah.php">Tambah Transaksi</a>
    <table border=1 cellspacing=0 cellpadding=10>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pemasok</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count(readAllTransaction()) >= 0) : ?>
                <?php $no = 1; foreach(readAllTransaction() as $transaction) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $transaction['nama_pemasok']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($transaction['tanggal'])); ?></td>
                <td>Rp<?php echo number_format($transaction['total']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $transaction['id']; ?>">Edit</a> |
                    <a href="index.php?id=<?php echo $transaction['id']; ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a> 
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