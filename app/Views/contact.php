<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/css/contact.css'); ?>">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
<?= $this->include('/layout/navbar'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <p class="portofolio" style="color: rgba(255, 255, 255, 0.4);">CONTACT
                </p>
                <hr>
                <h1>CONTACT ME</h1>
                <div class="containerContact">
                    <div class="header">
                        <img src="/img/<?= $kontak['pas']; ?>" alt="">
                    </div>
                    <div class="quote">
                        <blockquote class="blockquote text-center">
                            <p class="mb-0"><?= $kontak['quote']; ?></p>
                            <footer class="blockquote-footer"><?= $kontak['pembuat']; ?></footer>
                        </blockquote>
                    </div>
                    <div class="social icon-holder">
                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="icofont-skype"></i></a>
                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                    </div>
                    <div class="phone">
                        <p>Phone Number</p>
                        <p class="number">+62 <?= $hasil['phone']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.nav-item6').addClass('active');
    });

    $(document).ready(function() {
        var a = $('<h2></h2>').text('<?= $hasil['nama']; ?>');
        $('.nav-menu').prepend(a);
        a.addClass('namaProfile');
    });
    $(document).ready(function() {
        $('.navbar-dark').addClass('bg-custom');
    });
</script>

<?= $this->endSection(); ?>