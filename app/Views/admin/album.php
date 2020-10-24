<?= $this->extend('layout/contentTemplate'); ?>

<?= $this->section('content'); ?>
<style>
    * {
        color: black;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $title; ?></h1>
            <a href="AdminAlbum/addDisplay" class="btn btn-success my-3">Tambah Gambar</a>
            <table class="table" id="pagging">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">kategori</th>
                        <th scope="col">Post pada</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($hasil as $a) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><img src="<?= base_url('/img') . '/' . $a['nama']; ?>" alt="" class="gambar"></td>
                            <td><?= $a['deskripsi']; ?></td>
                            <td><?= $a['kategori']; ?></td>
                            <td><?= $a['created_at']; ?></td>
                            <td>
                                <a href="/album/<?= $a['id']; ?>" class=" btn btn-primary">Edit</a>
                                <a href="/album/<?= $a['id']; ?>/delete" class=" btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert" style="text-align: center;">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#pagging').DataTable();
    });


    $(document).ready(function() {
        $('.nav-item6').addClass('active');
    });
</script>

<?= $this->endSection(); ?>