<?php 
include '../header.php';
deleteCategory();
?>
<body>
    <div class="navbar">
        <ul>
            <li><a href="../produk/index.php">Produk</a></li>
            <li><a href="../distributor/index.php">Pemasok</a></li>
            <li><a href="../transaksi/index.php">Transaksi</a></li>
            <li><a href="../detail_transaksi/index.php">Detail Transaksi</a></li>
        </ul>
    </div>
    <a href="tambah.php">Tambah Kategori</a>
    <table border=1 cellspacing=0 cellpadding=10>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count(readAllCategory()) >= 0) : ?>
                <?php $no = 1; foreach(readAllCategory() as $category) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $category['nama_kategori']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $category['id']; ?>">Edit</a> |
                    <a href="index.php?id=<?php echo $category['id']; ?>" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a> 
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