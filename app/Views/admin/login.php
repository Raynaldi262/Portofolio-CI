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
                <h1 style="text-align: center;">Form Login</h1>
                <div class="card-body">
                    <form action="<?= base_url('login/check'); ?>" method="POST">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" id="username" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pwd" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="pwd" id="pwd" required class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Login</button>
                    </form>
                </div>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert" style="text-align: center;">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>