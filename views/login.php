<div class="container">
    <?php $form = app\core\Form\Form::begin('', "post") ?>
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Đăng nhập</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <?php echo $form->field($model, 'email') ?>
                <?php echo $form->field($model, 'password')->passwordField() ?>
                <!-- <div class="row align-items-center remember">
                        <input type="checkbox">Nhớ tài khoản
                    </div> -->
                <div class="form-group">
                    <button type="submit" class="btn float-right login_btn">Đăng nhập</button>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Trở thành viên Kaffee store !<a href="/register">Đăng ký</a>
                </div>
                <!-- <div class="d-flex justify-content-center">
                        <a href="#">Quên mật khẩu ?</a>
                    </div> -->
            </div>
        </div>
    </div>
    <?php app\core\form\Form::end() ?>
</div>