<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('/css/resume.css'); ?>">

<?= $this->include('/layout/navbar'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <p style="color: rgba(255, 255, 255, 0.4);">RESUME
                </p>
                <hr>
                <section id="resume" class="resume">
                    <div class="container">
                        <div class="col judul">
                            <i class="icofont-book"> Education</i>
                        </div>
                        <div class="row resumeRow per1" id="hallo">
                            <?php
                            $c = 0;
                            for ($i = 0; $i < count($edu); $i++) : ?>
                                <?php if (($c % 2) == 0) : ?>
                                    <div class="col-sm-6 barisKiri">
                                        <h3 style="text-align: center;"><?= $edu[$i]['nama']; ?></h3>
                                        <span class="tahun"><?= $edu[$i]['dari']; ?> - <?= $edu[$i]['sampai']; ?></span><br>
                                        <p class="alamat"><?= $edu[$i]['alamat']; ?></p>
                                        <p><?= $edu[$i]['konten']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                <?php endif; ?>
                                <?php if (($c % 2) != 0) : ?>
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6 barisKanan">
                                        <h3 style="text-align: center;"><?= $edu[$i]['nama']; ?></h3>
                                        <span class="tahun"><?= $edu[$i]['dari']; ?> - <?= $edu[$i]['sampai']; ?></span>
                                        <p class="alamat"><?= $edu[$i]['alamat']; ?></p>
                                        <p><?= $edu[$i]['konten']; ?></p>
                                    </div>
                                <?php endif; ?>

                            <?php $c++;
                            endfor; ?>
                        </div>
                        <div class="col mt-2 judul">
                            <i class="icofont-tasks"> Professional Experience</i>
                        </div>
                        <div class="row resumeRow per2" id="hallo1">
                            <?php
                            $c = 0;
                            for ($i = 0; $i < count($job); $i++) : ?>
                                <?php if (($c % 2) == 0) : ?>
                                    <div class="col-sm-6 barisKiri">
                                        <h3 style="text-align: center;"><?= $job[$i]['nama']; ?></h3>
                                        <span class="tahun"><?= $job[$i]['dari']; ?> - <?= $job[$i]['sampai']; ?></span><br>
                                        <p class="alamat"><?= $job[$i]['alamat']; ?></p>
                                        <p><?= $job[$i]['konten']; ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                <?php endif; ?>
                                <?php if (($c % 2) != 0) : ?>
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6 barisKanan">
                                        <h3 style="text-align: center;"><?= $job[$i]['nama']; ?></h3>
                                        <span class="tahun"><?= $job[$i]['dari']; ?> - <?= $job[$i]['sampai']; ?></span>
                                        <p class="alamat"><?= $job[$i]['alamat']; ?></p>
                                        <p><?= $job[$i]['konten']; ?></p>
                                    </div>
                                <?php endif; ?>

                            <?php $c++;
                            endfor; ?>
                        </div>
                    </div>
                </section><!-- End Resume Section -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.nav-item3').addClass('active');
    });

    $(document).ready(function() {
        var a = $('<h2></h2>').text('<?= $hasil['nama']; ?>');
        $('.nav-menu').prepend(a);
        a.addClass('namaProfile');
    });

    $(document).ready(function() {
        $('.navbar-dark').addClass('bg-custom');
    });

    //waypointtttttttttttttt
    $('#hallo').waypoint(function() {
        $('.per1').each(function() {
            $(this).css('margin-top', '-28%');
            $(this).css('opacity', '1');
        });
    }, {
        offset: '80%'
    });

    $('#hallo1').waypoint(function() {
        $('.per2').each(function() {
            $(this).css('margin-top', '-28%');
            $(this).css('opacity', '1');
        });
    }, {
        offset: '100%'
    });
    //waypointtttttttttttttt
</script>

<?= $this->endSection(); ?>