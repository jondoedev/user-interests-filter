<?php require_once __DIR__ . '/_header.php'; ?>

<form method="GET">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="form-group">
                <label for="birthDateMin">Birth Day Min:</label>
                <input type="date" name="birthDateFrom" value="">
                <label for="birthDateMax">Max:</label>
                <input type="date" name="birthDateTo" value="">
            </div>
            <div class="form-group">
                <label for="regDateMin">Registration On Min:</label>
                <input type="date" name="regDateFrom" value="">
                <label for="regDateMax">Max:</label>
                <input type="date" name="regDateTo" value="">
            </div>
            <div class="form-group">
                <label for="interest">Interests: </label>
                <div>
                    <ul>
                        <?php foreach ($interests as $interest) { ?>
                            <label>
                                <?= $interest->name ?><br>
                                <input type="checkbox" name="interest" value="<?= $interest->id ?>"/>
                            </label>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="form-group col-md-offset-5">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </div>
</form>