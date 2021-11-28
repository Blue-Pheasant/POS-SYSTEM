<script type="text/javascript">
  document.title = 'Lịch sử mua hàng';
</script>
<link rel="stylesheet" href="/css/orders.css">
<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
<div class="cart-page">
    <?php
        if(!isset($params['records'])) {
            echo '<div class="cart-page__header">
                    <h3>Lịch sử mua hàng trống</h3>
                  </div><br>';
        } else {
    ?>
                    <div class="cart-page__header">
                        <h3>Lịch sử mua hàng</h3>
                    </div><br>
                    <div class="cart-page__body">
                        <table class="table-fill">
                            <thead>
                                <tr>
                                    <th class="text-left"><h5>Tên sản phẩm</h5></th>
                                    <th class="text-left"><h5>Hình ảnh</h5></th>
                                    <th class="text-left"><h5>Kích thước</h5></th>
                                    <th class="text-left"><h5>Số lượng</h5></th>
                                    <th class="text-left"><h5>Giá tiền</h5></th>
                                    <th class="text-left"><h5>Ngày mua</h5></th>
                                </tr>
                            </thead>
                            <tbody class="table-hover">
                                <?php
                                    foreach($params['records'] as $param) {
                                ?>
                                <tr>
                                    <td class="text-left"><h6><?=$param->getProductName()?></h6></td>
                                    <td>
                                        <?php
                                            echo '<img width="60" height="60"src="' . $param->getImage() . '">';
                                        ?>
                                    </td>
                                    <td class="text-left"><h6><?=$param->getSize()?></h6></td>
                                    <td class="text-left"><h6><?=$param->getQuantity()?></h6></td>
                                    <td class="text-left"><h6><?=$param->getTotalPrice()?></h6></td>
                                    <td class="text-left"><h6><?=$param->getDateTime()?></h6></td>
                                </tr>
                                <?php 
                                    } 
                                ?>
                            </tbody>
                        </table><br><br>
                                <?php
                                    if(isset($params['records'])) {
                                        $form = app\core\Form\Form::begin("", "post");
                                        echo '<button type="submit" class="delete-button"><h6>Xoá lịch sử</h6></button>';
                                        app\core\form\Form::end();
                                    }
                                ?>
                    </div>
        <?php   } ?>
</div>