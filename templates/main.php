<?php require_once __DIR__ . '/_header.php'; ?>

<form method="GET">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <div><b>Birth Day</b></div>

                <div>
                    <div>Min: </div>
                    <input type="date" name="birthDateFrom" value="">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="birthDateTo" value="">
                </div>
            </div>
            <div class="form-group">
                <div><b>Registration On</b></div>

                <div>
                    <div>Min:</div>
                    <input type="date" name="regDateFrom" value="">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="regDateTo" value="">
                </div>
            </div>
            <div class="form-group">
                <div><b>Interests</b></div>
                <?php foreach ($interests as $interest) { ?>
                    <div>
                        <label>
                            <input type="checkbox" name="interest" value="<?= $interest->id ?>"/>
                            <?= $interest->name ?><br>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Filter</button>
            </div>
        </div>
        <div class="col-sm-9">

        </div>
    </div>
</form>