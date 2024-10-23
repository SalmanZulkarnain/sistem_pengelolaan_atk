<?php 
include '../header.php';
deleteProduct();
?>
<body>
    <a href="tambah.php">Tambah Produk</a>
    <table border=1 cellspacing=0 cellpadding=10>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Kategori</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count(readAllProduct()) >= 0) : ?>
                <?php $no = 1; foreach(readAllProduct() as $product) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $product['id_kategori']; ?></td>
                <td><?php echo $product['nama_produk']; ?></td>
                <td><?php echo $product['harga']; ?></td>
                <td><?php echo $product['stok']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a> |
                    <a href="index.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a> 
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