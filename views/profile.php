<script type="text/javascript">
  document.title = 'Profile';
</script> 
<link rel="stylesheet" href="/css/profile.css">
<h1>Tài khoản của bạn</h1>
<?php $form = app\core\Form\Form::begin('/profile/password', "") ?>    
    <button type="back" class="password-button">Thay đổi mật khẩu</button>
<?php app\core\form\Form::end() ?>
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
<div class="row">
    <div class="col">
    <?php echo $form->field($user, 'email') ?>
    </div>
    <div class="col">
    <?php echo $form->field($user, 'phone_number') ?>
    </div>
</div>
<?php echo $form->field($user, 'address') ?>
<button type="submit" class="password-button">Cập nhật</button>
<?php app\core\form\Form::end() ?>