<?= $this->extend('layout/contentTemplate'); ?>

<?= $this->section('content'); ?>
<style>
    * {
        color: black;
    }

    .card-img-top {
        width: 500px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col">

            <div class="card-group">
                <div class="card">
                    <img src="/img/<?= $hasil['nama']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-text">Deskripsi : <?= $hasil['deskripsi']; ?></h4>
                        <h5 class="card-text">Kategori : <?= $hasil['kategori']; ?></h5>
                        <h5 class="card-text">Dipost : <?= $hasil['created_at']; ?></h5>
                        <p style="text-align: center;">Data sebelumnya</p>
                    </div>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>


                <div class="card">
                    <img src="/img/<?= $hasil['nama']; ?>" class="img-tumbnail img-preview card-img-top">
                    <div class="card-body">
                        <form action="<?= base_url("AdminAlbum/edit"); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <input type="hidden" name="namaLama" id="namaLama" value="<?= $hasil['nama']; ?>">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validasi->hasError('nama')) ? 'is-invalid' : ''; ?>" id="photo" name="nama" onchange="preview()">
                                        <div class=" invalid-feedback">
                                            <?= $validasi->getError('nama'); ?>
                                        </div>
                                        <label class="custom-file-label" for="nama"><?= $hasil['nama']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="des" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= ($validasi->hasError('des')) ? 'is-invalid' : ''; ?>" name="des" id="des" rows="4"><?= $hasil['deskripsi']; ?></textarea>
                                    <div class=" invalid-feedback">
                                        <?= $validasi->getError('des'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kat" class="col-sm-3 col-form-label">Kategori </label>
                                <div class="col-sm-9">
                                    <input type="text" name="kat" id="kat" class="form-control <?= ($validasi->hasError('kat')) ? 'is-invalid' : ''; ?>" value="<?= $hasil['kategori']; ?>">
                                    <div class=" invalid-feedback">
                                        <?= $validasi->getError('kat'); ?>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="create" value="<?= date("Y/m/d"); ?>">
                            <input type="hidden" name="id" value="<?= $hasil['id']; ?>">
                            <button class="btn btn-success" name="submit" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>