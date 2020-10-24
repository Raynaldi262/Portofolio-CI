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
                        <th scope="col">Skill</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 1;
                    foreach ($hasil as $i) :
                    ?>
                        <tr>
                            <th scope="row"><?= $c; ?></th>
                            <td><?= $i['skill']; ?></td>
                            <td><?= $i['nilai']; ?></td>
                            <td>
                                <form action="/AdminHome/delete" method="POST">
                                    <input type='hidden' name='model' id='model' value="skill">
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
            <form action="/AdminHome/insertSkill" method="POST">
                <label for='skill'>Skill : </label>
                <input type='text' name='skill' id='skill'>
                <br>
                <label for='nilai'>Nilai : </label>
                <input type='number' name='nilai' id='nilai' placeholder="1-100" max="100" min="1"><br>
                <button type="submit" name="submit" class="btn btn-primary"> SAVE</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.nav-item3').addClass('active');
    });
</script>
<?= $this->endSection(); ?>