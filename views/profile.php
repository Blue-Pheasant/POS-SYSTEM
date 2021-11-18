<?php
$this->title = 'Profile';
?>

<h1>Tài khoản của bạn</h1>

<div class="profile-avatar">
    <img class="profile-avatar-image" alt="profile-avatar-image" src='/images/avatar.png'>
</div>
<?php $form = app\core\Form\Form::begin('', "post") ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($user, 'firstname') ?>
    </div>
    <div class="col">
        <?php echo $form->field($user, 'lastname') ?>
    </div>
</div>
<?php echo $form->field($user, 'email') ?>
<?php echo $form->field($user, 'phone_number') ?>
<?php echo $form->field($user, 'address') ?>
<button type="submit" class="btn btn-primary">Cập nhật</button>
<?php app\core\form\Form::end() ?>