
<?php


?>
<div class="row">
    <div class="col-lg-4 mx-auto">
    <h1>Register</h1>
        <?php $form = \thecore\phpmvc\form\Form::begin('', "POST"); ?>
            <?php echo $form->field($model, 'firstname'); ?>
            <?php echo $form->field($model, 'lastname'); ?>
            <?php echo $form->field($model, 'email'); ?>
            <?php echo $form->selectField($model, 'role')->selectField($model->optionValues('role')); ?>
            <?php echo $form->field($model, 'password')->passwordField(); ?>
            <?php echo $form->field($model, 'confirmPassword')->passwordField();; ?>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button type="button" id="btn" class="btn btn-primary">Sample</button>
            </div>
        <?= \thecore\phpmvc\form\Form::end(); ?>
        <!-- <form action="/register" method="POST">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form> -->
    </div>
</div>

<script>
    const btn = document.querySelector('#btn');
    btn.addEventListener('click', async e => {
        const data = {firstname : 1};
        const form = new FormData();
        for(const w in data) {
            form.append(w, data[w]);
        }
        const res = await fetch(`/register/data`, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
                // 'Content-Type': 'application/json',
                'Accept': "application/json", // expected data sent back
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: form // body data type must match "Content-Type" header
        });
        // console.log(await res.json());
    });
</script>