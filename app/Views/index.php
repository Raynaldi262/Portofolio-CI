<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/css/indexStyle.css'); ?>">

<div class="bg">
    <div class="wrap">
        <div class="newsletter-text ml-2">
            <h1><?= $hasil['nama']; ?></h1>
            <h2 class="nama" style="color: #696969;">Hi! I'm a <span class="typed" data-typed-items="
            <?php foreach ($kata as $a) {
                echo $a['kata'] . ',';
            } ?>"></span></h2>
            <?= $this->include('/layout/navbar'); ?>
        </div>
        <span id="typed"></span>

        <div class="icon-holder">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="google-plus"><i class="icofont-skype"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.nav-item1').addClass('active');
    });
</script>

<?= $this->endSection(); ?>