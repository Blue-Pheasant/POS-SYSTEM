<?php

function extraPrice($size, $price)
{
    $extraPrice = $price;
    switch ($size) {
        case 'Small':
            $extraPrice += 0;
            break;
        case 'Medium':
            $extraPrice += 3000;
            break;
        case 'Large':
            $extraPrice += 6000;
            break;
        default:
            break;
    }
    return $extraPrice;
}

function sizeContent($size)
{
    $str = '';
    switch ($size) {
        case 'Small':
            $str = 'Small';
            break;
        case 'Medium':
            $str = 'Meidum (+3.000đ)';
            break;
        case 'Large':
            $str = 'Large (+6.000đ)';
            break;
        default:
            break;
    }
    return $str;
}

function total($params)
{
    $total = 0;
    foreach ($params as $param) {
        $total += extraPrice($param->size, $param->price) * $param->quantity;
    }
    return $total;
}

?>

<div class="cart-page">
    <form accept-charset="utf-8" action="" method="post">
        <div class="cart-page__header">
            <h3>Giỏ hàng của bạn</h3>
        </div>
        <div class="cart-page__body">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-md-12 col-lg-8">
                        <div class="cart-page__content">
                            <div class="cart-page__content__header">
                                <div>Các món đã chọn</div>
                                <a class="more-item-button" href="/menu">Thêm món</a>
                            </div>
                            <div class="cart-page-divider"></div>

                            <div class="cart-page__content__body">
                                <?php

                                if (count($params['items']) == 0) {
                                    echo
                                    '<div class="cart-page-item">
                                        <div class="container">
                                            <h4>Giỏ hàng đang trống !</h4>
                                        </div>
                                    </div>';
                                } else {
                                    foreach ($params['items'] as $param) {

                                        echo '<div class="cart-page-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-0">
                                                <img class="cart-page__item-image"
                                                    src="' . $param->image_url . '" />
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-4 col-5">
                                                <h6>' . $param->name . '</h6>
                                                <div>Giá đơn vị: ' . $param->price . ' đ</div>
                                                <div>Size: ' . sizeContent($param->size) . '</div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-5">
                                                <div class="product-detail-footer">
                                                    <div class="product-detail-footer-quantity">
                                                        <button type="button" id="decrease-quantity-button" disabled
                                                            class="item-button-disabled" onclick="decreaseQuantity()">
                                                            <img class="item-button-image"
                                                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMiIgdmlld0JveD0iMCAwIDE2IDIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxNiIgaGVpZ2h0PSIyIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K"
                                                                alt="" />
                                                        </button>
                                                        <input type="text" name="quantity" class="form-control quantity-input" id="product-quantity"  value="' . $param->quantity . '">
                                                        <button type="button" id="increase-quantity-button" onclick="increaseQuantity()">
                                                            <img class="item-button-image"
                                                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTYuODU3MTQgNi44NTcxNFYwSDkuMTQyODZWNi44NTcxNEgxNlY5LjE0Mjg2SDkuMTQyODZWMTZINi44NTcxNFY5LjE0Mjg2SDBWNi44NTcxNEg2Ljg1NzE0WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg=="
                                                                alt="" />
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-2 col-1">
                                                <a href="/cart?action=delete&id=' . $param->order_detail_id . '">
                                                    <img src="/images/delete.svg" class="cart-page__delete" />
                                                </a>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="cart-page__note" class="form-control"
                                                        placeholder="Ghi chú cho sản phẩm này" aria-label="note"
                                                        aria-describedby="basic-addon1" value="' . ($param->note) . '">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                    }
                                }
                                ?>
                            </div>



                            <div class="cart-page__content__header">
                                <div>Tổng cộng</div>
                            </div>
                            <div class="cart-page-divider"></div>
                            <div class="cart-page__content__total">
                                <div>Tạm tính</div>
                                <div><?php echo total($params['items']) ?>đ</div>
                            </div>

                            <div class="cart-page__content__footer">
                                <div>
                                    <div>Thành tiền</div>
                                    <div class="cart-page-total"><?php echo total($params['items']) ?>đ</div>
                                </div>
                                <?php echo (count($params['items']) == 0 ? '' : '<button type="submit" class="checkout-button">Đặt hàng</button>') ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="cart-page__info">
                            <div class="cart-page__content__header">
                                <div>Địa chỉ giao hàng</div>
                            </div>
                            <div class="cart-page-divider"></div>
                            <div class="cart-page__content__header">
                                <input name="address" type="text" class="form-control" id="delivery-address"
                                    placeholder="Nhập đỉa chỉ nhận hàng" value="<?php echo $params['user']->address ?>">
                            </div>

                            <div class="cart-page__content__header">
                                <div>Thông tin người nhận</div>
                            </div>
                            <div class="cart-page-divider"></div>
                            <div class="cart-page__content__header">
                                <input name="name" type=" text" class="form-control" id="delivery-address"
                                    placeholder="Tên người nhận"
                                    value="<?php echo $params['user']->firstname . ' ' . $params['user']->lastname ?>">
                            </div>
                            <div class="cart-page__content__header">
                                <input name="phone_number" type="text" class="form-control" id="delivery-address"
                                    placeholder="Số điện thoại" value="<?php echo $params['user']->phone_number ?>">
                            </div>
                            <!-- <div class="cart-page__content__header">
                            <input type="text" class="form-control" id="delivery-note"
                                placeholder="Ghi chú cho đơn hàng này">
                        </div> -->
                            <div class="cart-page__content__header">
                                <div>Phương thức thanh toán</div>
                            </div>
                            <div class="cart-page-divider"></div>

                            <div class="cart-page__content__header__checkbox">
                                <input value="cash" class="form-check-input" type="radio" name="payment_method"
                                    id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <img class="image-payment" src="/images/payment/cash.jpeg">
                                    Thanh toán khi nhận hàng (tiền mặt)
                                </label>
                            </div>
                            <div class="cart-page__content__header__checkbox">
                                <input value="momo-pay" class="form-check-input" type="radio" name="payment_method"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <img class="image-payment" src="/images/payment/momo.png">
                                    Momo
                                </label>
                            </div>
                            <div class="cart-page__content__header__checkbox">
                                <input value="zalo-pay" class="form-check-input" type="radio" name="payment_method"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <img class="image-payment" src="/images/payment/zalo.png">
                                    ZaloPay
                                </label>
                            </div>
                            <div class="cart-page__content__header__checkbox">
                                <input value="shopee-pay" class="form-check-input" type="radio" name="payment_method"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <img class="image-payment" src="/images/payment/shopee.png">
                                    ShopeePay
                                </label>
                            </div>
                            <div class="cart-page__content__header__checkbox">
                                <input value="credit" class="form-check-input" type="radio" name="payment_method"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <img class="image-payment" src="/images/payment/card.png">
                                    Thẻ ngân hàng
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/images/logo/logo-2.png" width="30px" class="rounded me-2" alt="logo-2">
                        <strong class="me-auto">Kaffee store</strong>
                        <small>Bây giờ</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Xóa sản phẩm thành công
                    </div>
                </div>
            </div>
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="placeOrderToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/images/logo/logo-2.png" width="30px" class="rounded me-2" alt="logo-2">
                        <strong class="me-auto">Kaffee store</strong>
                        <small>Bây giờ</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Đặt đơn hàng thành công.
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>

<script src="/js/product_detail.js"></script>
<script>
<?php
    if ($params['deletedItem']) {
        echo "var toastTrigger = document.getElementById('liveToastBtn')
            var toastLiveExample = document.getElementById('liveToast')
            var toast = new bootstrap.Toast(toastLiveExample)
            toast.show()";
    }
    ?>
<?php
    if ($params['placedOrder']) {
        echo "var toastLiveExample = document.getElementById('placeOrderToast')
            var toast = new bootstrap.Toast(toastLiveExample)
            toast.show()";
    }
    ?>
</script>