<?php require_once __DIR__ . '/_header.php'; ?>

<form method="GET">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <div><b>Birth Day</b></div>

                <div>
                    <div>Min: </div>
                    <input type="date" name="birthDateFrom"
                           value="<?= isset($params['birthDateFrom']) ? $params['birthDateFrom'] : '' ?>">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="birthDateTo"
                           value="<?= isset($params['birthDateTo']) ? $params['birthDateTo'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <div><b>Registration On</b></div>

                <div>
                    <div>Min:</div>
                    <input type="date" name="regDateFrom"
                           value="<?= isset($params['regDateFrom']) ? $params['regDateFrom'] : '' ?>">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="regDateTo"
                           value="<?= isset($params['regDateTo']) ? $params['regDateTo'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <div><b>Interests</b></div>
                <?php foreach ($interests as $interest) { ?>
                    <div>
                        <label>
                            <input type="checkbox" name="interests[]" value="<?= $interest->id ?>"
                                   <?= (isset($params['interests']) && in_array($interest->id, $params['interests'])) ? 'checked' : '' ?>
                            />
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