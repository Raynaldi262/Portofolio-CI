<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    * {
        color: black;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 70%;">
                <h2>Form Tambah Album</h2>
                <div class="card-body">
                    <form action="<?= base_url('AdminAlbum/add'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <img src="/img/default.jpg" class="img-tumbnail img-preview" width="100px">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validasi->hasError('nama')) ? 'is-invalid' : ''; ?>" id="photo" name="nama" onchange="preview()">
                                    <div class=" invalid-feedback">
                                        <?= $validasi->getError('nama'); ?>
                                    </div>
                                    <label class="custom-file-label" for="nama">Pilih Gambar</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="des" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control <?= ($validasi->hasError('des')) ? 'is-invalid' : ''; ?>" name="des" id="des" rows="4"><?= old('des'); ?></textarea>
                                <div class=" invalid-feedback">
                                    <?= $validasi->getError('des'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kat" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input class="form-control <?= ($validasi->hasError('kat')) ? 'is-invalid' : ''; ?>" type="text" name="kat" id="kat" value="<?= old('kat'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('kat'); ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="create" value="<?= date("Y/m/d"); ?>">
                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<?= $this->endSection(); ?>