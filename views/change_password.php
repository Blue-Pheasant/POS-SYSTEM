<script type="text/javascript">
  document.title = 'Thay đổi mật khẩu';
</script> 

<div class="card-regester">
    <div class="card-header">
        <h1>Thay đổi mật khẩu</h1>
    </div>
    <div class="card-body">
        <?php $form = app\core\Form\Form::begin('', "post") ?>
            <div class="row">
                <div class="col">
                    <?php echo $form->field($userModel, 'password')->passwordField() ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo $form->field($userModel, 'passwordConfirm')->passwordField() ?>
                </div>  
            </div>
            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #000000">I accept Terms of Service</span>
            </div>
            <div class="btn">
                <button type="submit" class="button">Thay đổi mật khẩu</button>
            </div>
        <?php app\core\form\Form::end() ?>
    </div>
    <div class="card-footer">
        <div class="login">
            <a href="/profile" class="back"><button id="login-link">Quay lại</button></a>
        </div>
    </div>
</div>