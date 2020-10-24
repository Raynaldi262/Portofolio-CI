<?= $this->extend('layout/contentTemplate'); ?>

<?= $this->section('content'); ?>
<style>
    * {
        color: black;
    }

    .pas {
        box-shadow: 0px 0px 10px 2px rgb(61, 61, 61);
        border-radius: 50%;
        padding: 5px;
        width: 200px;
        height: 200px;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <img src="/img/<?= $kontak['pas']; ?>" alt="" class="pas">
                <div class="card-body">
                    <p>Email : <?= $profile['email']; ?></p>
                    <p>Phone : <?= $profile['phone']; ?></p>
                    <p>Twitter: <?= $kontak['twitter']; ?></p>
                    <p>Facebok : <?= $kontak['facebook']; ?></p>
                    <p>IG : <?= $kontak['ig']; ?></p>
                    <p>Linked In : <?= $kontak['linked']; ?></p>
                    <blockquote class="blockquote text-center">
                        <p class="mb-0"><?= $kontak['quote']; ?></p>
                        <footer class="blockquote-footer"><?= $kontak['pembuat']; ?></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <form action="/AdminHome/editKontak" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="idd" value="<?= $kontak['id']; ?>">
                    <input type="hidden" name="pasLama" value="<?= $kontak['pas']; ?>">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <img src="/img/<?= $kontak['pas']; ?>" class="img-tumbnail img-preview" width="100px">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validasi->hasError('pas')) ? 'is-invalid' : ''; ?>" id="photo" name="pas" onchange="preview()">
                                <div class=" invalid-feedback">
                                    <?= $validasi->getError('pas'); ?>
                                </div>
                                <label class="custom-file-label" for="pas"><?= $kontak['pas']; ?></label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="twitter" id="twitter" value="<?= $kontak['twitter']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="facebook" id="facebook" value="<?= $kontak['facebook']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ig" class="col-sm-3 col-form-label">IG</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="ig" id="ig" value="<?= $kontak['ig']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="linked" class="col-sm-3 col-form-label">Linked in</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="linked" id="linked" value="<?= $kontak['linked']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quote" class="col-sm-3 col-form-label">Quote</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="quote" id="quote" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pembuat" class="col-sm-3 col-form-label">Pembuat</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="pembuat" id="pembuat" value="<?= $kontak['pembuat']; ?>">
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" name="submit">Save</button>
                    </div>
            </div>
            </form>
            <form action="/AdminHome/editEmail" method="POST">
                <input type="hidden" name="id" value="<?= $profile['id']; ?>">
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="email" id="email" value="<?= $profile['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="phone" id="phone" value="<?= $profile['phone']; ?>">
                    </div>
                </div>
                <div class="card-body">
                    <button type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('.nav-item7').addClass('active');
    });
</script>
<?= $this->endSection(); ?>