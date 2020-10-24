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

    .card {
        text-align: center;
    }

    #sejajar {
        style: "d-inline";
    }
</style>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-group">
                <div class="card">
                    <h1>Profile</h1>
                    <img src="/img/<?= $hasil['photo']; ?>" class="card-img-top mt-4">
                    <div class="card-body">
                        <h3 class="card-title"><?= $hasil['nama']; ?></h3>
                        <h4 class="card-text">Tgl Lahir : <?= $hasil['tgl_lahir']; ?></h4>
                        <h5 class="card-text">Username : <?= $hasil['username']; ?></h5>
                        <h5 class="card-text">Password :
                            <?php
                            $c =  strlen($hasil['password']);
                            for ($i = 0; $i < $c; $i++) {
                                echo '*';
                            } ?>

                        </h5>
                        <!-- <button class="btn btn-danger" onclick="show()">Edit</button> -->
                    </div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card" id=hide>
                    <h1>Edit Profile</h1>
                    <img src="/img/<?= $hasil['photo']; ?>" class="card-img-top mt-4 img-tumbnail img-preview">
                    <div class="card-body">
                        <form action="<?= base_url("AdminHome/edit"); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type='hidden' name='poto' id='poto' value="<?= $hasil['photo']; ?>">
                            <input type="hidden" id="idd" name="idd" value="<?= $hasil['id']; ?>">
                            <div class="form-group row">
                                <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validasi->hasError('photo')) ? 'is-invalid' : ''; ?>" id="photo" name="photo" onchange="preview()">
                                        <div class=" invalid-feedback">
                                            <?= $validasi->getError('photo'); ?>
                                        </div>
                                        <label class="custom-file-label" for="photo"><?= $hasil['photo']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" id="nama" class="form-control <?= ($validasi->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= $hasil['nama']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl" class="col-sm-3 col-form-label">Tgl Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl" id="tgl" class="form-control <?= ($validasi->hasError('tgl')) ? 'is-invalid' : ''; ?>" value="<?= $hasil['tgl_lahir']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" id="username" class="form-control <?= ($validasi->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= $hasil['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pwd" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="pwd" id="pwd" class="form-control <?= ($validasi->hasError('pwd')) ? 'is-invalid' : ''; ?>" value="<?= $hasil['password']; ?>">
                                </div>
                            </div>
                            <button class="btn btn-success" name="submit" type="submit">Save</button>
                            <!-- <button id="sejajar" class="btn btn-danger" onclick="hide()">Cancel</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.nav-item1').addClass('active');
    });
</script>
<?= $this->endSection(); ?>