<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/css/portofolio.css'); ?>">
<link href="/js/lightbox/dist/css/lightbox.min.css" rel="stylesheet" />
<script src="/js/lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
<script src="<?= base_url('/js/isotop/isotope.pkgd.min.js'); ?>"></script>
<script src="<?= base_url('/js/isotop/isotope.pkgd.js'); ?>"></script>

<?= $this->include('/layout/navbar'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <p class="portofolio" style="color: rgba(255, 255, 255, 0.4);">PORTFOLIO
                </p>
                <hr>
                <div class="button-group filter-button-group">
                    <button data-filter="*" class="active"> All </button>
                    <button data-filter=".landscape">Landscape</button>
                    <button data-filter=".portrait"> Portrait</button>
                </div>
                <div class="row barisGambar">
                    <?php for ($i = 0; $i < count($album); $i++) : ?>
                        <div class="col-4 colGambar  <?= $album[$i]['kategori']; ?>">
                            <a class="gambar" href="/img/<?= $album[$i]['nama']; ?>" data-lightbox="example-set" data-title="<?= $album[$i]['deskripsi']; ?>"><img class="example-image" src="/img/<?= $album[$i]['nama']; ?>" alt="" /><span><?= $album[$i]['kategori']; ?></span></a>
                        </div>
                        <?php $i++;
                        if ($i < count($album)) : ?>
                            <div class="col-4 colGambar  <?= $album[$i]['kategori']; ?>">
                                <a class="gambar" href="/img/<?= $album[$i]['nama']; ?>" data-lightbox="example-set" data-title="<?= $album[$i]['deskripsi']; ?>"><img class="example-image" src="/img/<?= $album[$i]['nama']; ?>" alt="" /><span><?= $album[$i]['kategori']; ?></span></a>
                            </div>
                        <?php endif; ?>
                        <?php $i++;
                        if ($i < count($album)) : ?>
                            <div class="col-4 colGambar  <?= $album[$i]['kategori']; ?>">
                                <a class="gambar" href="/img/<?= $album[$i]['nama']; ?>" data-lightbox="example-set" data-title="<?= $album[$i]['deskripsi']; ?>"><img class="example-image" src="/img/<?= $album[$i]['nama']; ?>" alt="" /><span><?= $album[$i]['kategori']; ?></span></a>
                            </div>

                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <?php /*   <?= $pager->links('album', 'album_pagination') ?> */ ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.nav-item5').addClass('active');
    });

    $(document).ready(function() {
        var a = $('<h2></h2>').text('<?= $hasil['nama']; ?>');
        $('.nav-menu').prepend(a);
        a.addClass('namaProfile');
    });

    $(document).ready(function() {
        $('.navbar-dark').addClass('bg-custom');
    });

    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'disableScrolling': true,
        'positionFromTop': 100,
        'alwaysShowNavOnTouchDevices': true
    })

    var $grid = $('.barisGambar').isotope({
        itemSelector: '.colGambar',
        layoutMode: 'fitRows'
    });

    $('.filter-button-group').on('click', 'button', function() {
        $(".filter-button-group button").removeClass('active');
        $(this).addClass('active');
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });
</script>

<?= $this->endSection(); ?>