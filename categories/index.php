<?php 
include '../header.php';
deleteCategory();
?>
<body>
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