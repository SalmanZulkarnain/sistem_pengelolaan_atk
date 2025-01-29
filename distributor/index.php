<?php 
include '../header.php';
deleteDistributor();
?>
<body>
<div class="navbar">
    <ul>
        <li><a href="../kategori/index.php">Kategori</a></li>
        <li><a href="../produk/index.php">Produk</a></li>
        <li><a href="../transaksi/index.php">Transaksi</a></li>
        <li><a href="../detail_transaksi/index.php">Detail Transaksi</a></li>
        </ul>
    </div>
    <a href="tambah.php">Tambah Pemasok</a>
    <table border=1 cellspacing=0 cellpadding=10>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pemasok</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count(readAllDistributor()) >= 0) : ?>
                <?php $no = 1; foreach(readAllDistributor() as $distributor) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $distributor['nama_pemasok']; ?></td>
                <td><?php echo $distributor['alamat']; ?></td>
                <td><?php echo $distributor['telepon']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $distributor['id']; ?>">Edit</a> |
                    <a href="index.php?id=<?php echo $distributor['id']; ?>" onclick="return confirm('Yakin ingin menghapus pemasok ini?')">Hapus</a> 
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