<?php require_once __DIR__ . '/_header.php'; ?>

<form method="GET">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <div><b>Birth Day</b></div>

                <div>
                    <div>Min: </div>
                    <input type="date" name="birth-date[from]"
                           value="<?= isset($params['birth-date']['from']) ? $params['birth-date']['from'] : '' ?>">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="birth-date[to]"
                           value="<?= isset($params['birth-date']['to']) ? $params['birth-date']['to'] : '' ?>">
                </div>
            </div>
            <div class="form-group">
                <div><b>Registration On</b></div>

                <div>
                    <div>Min:</div>
                    <input type="date" name="created-at[from]"
                           value="<?= isset($params['created-at']['from']) ? $params['created-at']['from'] : '' ?>">
                </div>

                <div>
                    <div>Max:</div>
                    <input type="date" name="created-at[to]"
                           value="<?= isset($params['created-at']['to']) ? $params['created-at']['to'] : '' ?>">
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
            <?php foreach ($users as $user) { ?>
                <div>
                    <b>First name</b>
                    <?= $user->first_name; ?>
                </div>
                <div>
                    <b>Last name</b>
                    <?= $user->last_name; ?>
                </div>
                <div>
                    <b>Email</b>
                    <?= $user->email; ?>
                </div>
                <div>
                    <b>Birth date</b>
                    <?= $user->birth_date; ?>
                </div>
                <div>
                    <b>Registration date</b>
                    <?= $user->created_at; ?>
                </div>

                <hr>
            <?php } ?>
        </div>
    </div>
</form>
