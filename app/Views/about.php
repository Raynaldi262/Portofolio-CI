<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('/css/about.css'); ?>">

<?= $this->include('/layout/navbar'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- mulai jumbotron -->
            <div class="jumbotron" id="basic-waypoint">
                <p class="about">ABOUT
                </p>
                <hr>
                <h1>LEARN MORE ABOUT ME</h1>
                <!-- card photo profile -->
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/img/<?= $hasil['photo']; ?>" class="card-img img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body aboutMe">
                                <h3 class="card-title" style="color: #18d26e;"><?= $hasil['nama']; ?></h3>
                                <p class="card-text font-italic">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul>
                                            <li><i class="icofont-rounded-right"></i>Birthday : <?php
                                                                                                $myDateTime = DateTime::createFromFormat('Y-m-d', $hasil['tgl_lahir']);
                                                                                                $bornDate = $myDateTime->format('d-F-Y');
                                                                                                echo $bornDate;
                                                                                                ?></li>
                                            <li><i class="icofont-rounded-right"></i>Phone : <?= $hasil['phone']; ?></li>
                                            <li><i class="icofont-rounded-right"></i>City : <?= $hasil['city']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 enter">
                                        <ul>
                                            <li><i class="icofont-rounded-right"></i>Age : 22</li>
                                            <li><i class="icofont-rounded-right"></i>Degree : Bachelor </li>
                                            <li><i class="icofont-rounded-right"></i>Email : ginantaraaldi1387@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of card poto  -->
                <!-- skilll card -->
                <div class="card skillCard">
                    <div class="card-header">
                        <p style="color: rgba(255, 255, 255, 0.5);">SKILLS</p>
                        <hr>
                    </div>
                    <div class="container">
                        <div class="row skill skills-content">
                            <?php for ($i = 0; $i < count($skill); $i++) : ?>
                                <div class="card-body col-sm-6">
                                    <p class="judul"><?= $skill[$i]['skill']; ?></p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skill[$i]['nilai']; ?>" aria-valuemin="0" aria-valuemax="100"><?= $skill[$i]['nilai']; ?>%</div>
                                    </div>
                                </div>
                                <?php $i++;
                                if ($i < count($skill)) :
                                ?>
                                    <div class="card-body col-sm-6">
                                        <p class="judul"><?= $skill[$i]['skill']; ?></p>
                                        <div class="progress-bar-wrap">
                                            <div class=" progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skill[$i]['nilai']; ?>" aria-valuemin="0" aria-valuemax="100"><?= $skill[$i]['nilai']; ?>%</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <!-- end skill card -->

                <!-- interest start -->
                <div class="container mt-4">

                    <p class="about mt-5" style="margin-left: -16px;">Interests</p>
                    <hr style="margin-left: -16px;">
                    <div class="row">
                        <?php for ($i = 0; $i < count($interest); $i++) : ?>
                            <div class="card interested">
                                <div class="row no-gutters interest">
                                    <div class="gambar" style="font-size: 30px;">
                                        <i class="<?= $interest[$i]['sampul']; ?> ri-fw" style="color: <?= $interest[$i]['warna']; ?>;"></i>
                                        <h5 class="card-title d-inline mt-3"><?= $interest[$i]['interest']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <!-- interest end -->
                <!-- Hobbies start -->
                <div class="container">
                    <p class="about mt-1" style="margin-left: -16px;">Hobbies</p>
                    <hr style="margin-left: -16px;">
                    <div class="row hobbiesRow">
                        <?php for ($i = 0; $i < count($hobbie); $i++) : ?>
                            <div class="icon">
                                <i class="<?= $hobbie[$i]['sampul']; ?>" style="color:  <?= $hobbie[$i]['warna']; ?>;"></i>
                                <h4 class="title"><?= $hobbie[$i]['hobi']; ?></h4>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <!-- Hobbies end -->
            <!-- akhir jumbotron  -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var a = $('<h2></h2>').text('<?= $hasil['nama']; ?>');
        $('.navbar').prepend(a);
        a.addClass('namaProfile');
    });

    $(document).ready(function() {
        $('.navbar-dark').addClass('bg-custom');
    });

    $('.skills-content').waypoint(function() {
        $('.progress .progress-bar').each(function() {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {
        offset: '80%'
    });

    $(document).ready(function() {
        $('.nav-item2').addClass('active');
    });
</script>
<?= $this->endSection(); ?>