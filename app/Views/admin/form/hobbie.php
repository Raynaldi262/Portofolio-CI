<?= $this->extend('layout/contentTemplate'); ?>

<?= $this->section('content'); ?>
<style>
    * {
        color: black;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Interest</th>
                        <th scope="col">Warna</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 1;
                    foreach ($hasil as $i) :
                    ?>
                        <tr>
                            <th scope="row"><?= $c; ?></th>
                            <td><?= $i['hobi']; ?></td>
                            <td><?= $i['warna']; ?></td>
                            <td><?= $i['sampul']; ?></td>
                            <td>
                                <form action="/AdminHome/delete" method="POST">
                                    <input type='hidden' name='model' id='model' value="hobbie">
                                    <input type='hidden' name='id' id='id' value="<?= $i['id']; ?>">
                                    <button class="btn btn-danger" type="submit" name="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php $c++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <h3> Form Tambah</h3>
            <form action="/AdminHome/insertHobbie" method="POST">
                <label for='hobi'>Hobbie : </label>
                <input type='text' name='hobi' id='hobi'>
                <br>
                <label for='warna'>Warna : </label>
                <input type='text' name='warna' id='warna' placeholder="272FE8"> <a href="https://htmlcolorcodes.com/">Cek Disini</a><br>
                <label for='sampul'>Sampul : </label>
                <input type='text' name='sampul' id='sampul' placeholder="icofont-bear-face"> <a href="https://icofont.com/icons">Cek Disini</a><br>

                <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.nav-item5').addClass('active');
    });
</script>
<?= $this->endSection(); ?>