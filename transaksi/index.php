<?php 
include '../header.php';
deleteTransaction();
?>
<body>
    <a href="tambah.php">Tambah Transaksi</a>
    <table border=1 cellspacing=0 cellpadding=10>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Pemasok</th>
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
                <td><?php echo $transaction['id_pemasok']; ?></td>
                <td><?php echo $transaction['tanggal']; ?></td>
                <td><?php echo $transaction['total']; ?></td>
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