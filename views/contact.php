<?php
/** @var $this - is an instance of \thecore\phpmvc\View */

use thecore\phpmvc\form\TextareaField;

/** @var $mdoel - is an instance of \app\models\ContactForm */

$this->title = 'Contact';
?>


<div class="row">
    <div class="col-xl-4 mx-auto">
    <h1>Contact</h1>
    <?php $form = \thecore\phpmvc\form\Form::begin('', "POST"); ?>
    <?php echo $form->field($model, 'subject'); ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo new TextareaField($model, 'body'); ?>
    <button class="btn btn-primary" type="submit">Submit</button>
<?= \thecore\phpmvc\form\Form::end(); ?>
    </div>
</div>