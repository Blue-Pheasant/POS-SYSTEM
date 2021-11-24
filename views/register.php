<h1>Đăng ký</h1><br>
<div class="card-body">
    <?php $form = app\core\Form\Form::begin('', "post") ?>
        <div class="row">
            <div class="col">
                <?php echo $form->field($model, 'firstname') ?>
            </div>
            <div class="col">
                <?php echo $form->field($model, 'lastname') ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php echo $form->field($model, 'email') ?>
            </div>    
            <div class="col">
                <?php echo $form->field($model, 'phone_number') ?>
            </div>
        </div> 
        <div class="row">
            <div class="col">
                <?php echo $form->field($model, 'address') ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php echo $form->field($model, 'password')->passwordField() ?>
            </div>   
            <div class="col">
                <?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
            </div>  
        </div>
        <div class="remember-me">
            <input type="checkbox">
            <span style="color: #000000">I accept Terms of Service</span>
        </div>
        <button type="submit" class="button">Đăng ký</button>
    <?php app\core\form\Form::end() ?>
    <div class="login">
        <p>Bạn đã có tài khoản chưa ?</p>
        <a href="/login"><button id="login-link">Đăng nhập</button></a>
    </div>
</div>