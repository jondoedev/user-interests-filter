<?php require_once __DIR__ . '/_header.php'; ?>

<form method="GET">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <div><b>Birth Day</b></div>

                <div>
                    <div>Min: </div>
                    <input type="date" name="birth-date[from]"
                           value="<?= isset($params['birth-date[from]']) ? $params['birth-date[from]'] : '' ?>">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="birth-date[to]"
                           value="<?= isset($params['birth-date[to]']) ? $params['birth-date[to]'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <div><b>Registration On</b></div>

                <div>
                    <div>Min:</div>
                    <input type="date" name="reg-date[from]"
                           value="<?= isset($params['reg-date[from]']) ? $params['reg-date[from]'] : '' ?>">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="reg-date[to]"
                           value="<?= isset($params['reg-date[to]']) ? $params['reg-date[to]'] : '' ?>">
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