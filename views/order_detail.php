<div class="cart-page">
    <div class="cart-page__header">
        <h3>Đơn hàng của bạn</h3>
    </div>
    <div class="cart-page__body">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-12 col-lg-8">
                    <div class="cart-page__content">
                        <div class="cart-page__content__header">
                            <div>Đơn hàng : </div>
                        </div>
                        <div class="cart-page-divider"></div>

                        <div class="cart-page__content__body">
                            <div class="cart-page-item">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-0">
                                            <img class="cart-page__item-image"
                                                src="https://minio.thecoffeehouse.com/image/admin/tra-den-matchiato_430281.jpg" />
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-4 col-6">
                                            <h6>Trà Đào Cam Sả - Đá</h6>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-4 col-6">
                                            <h6>Số lượng : 2</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            Giá đơn vị: 79000đ
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            Tạm tính: 158000đ
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" id="cart-page__note" class="form-control"
                                                    placeholder="Ghi chú cho sản phẩm này" aria-label="note"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="cart-page__content__header">
                            <div>Tổng cộng</div>
                        </div>
                        <div class="cart-page-divider"></div>
                        <div class="cart-page__content__total">
                            <div>Tạm tính</div>
                            <div>79.000đ</div>
                        </div>

                        <div class="cart-page__content__footer">
                            <div>
                                <div>Thành tiền</div>
                                <div class="cart-page-total">79.000đ</div>
                            </div>
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
                            <?php echo $params['user']->address ?>
                        </div>

                        <div class="cart-page__content__header">
                            <div>Thông tin người nhận</div>
                        </div>
                        <div class="cart-page-divider"></div>
                        <div class="cart-page__content__header">
                            Tên người nhận:
                            <?php echo $params['user']->firstname . ' ' . $params['user']->lastname ?>
                        </div>
                        <div class="cart-page__content__header">
                            Số điện thoại: <?php echo $params['user']->phone_number ?>
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
                            <input value="cash" class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <img class="image-payment" src="/images/payment/cash.jpeg">
                                Thanh toán khi nhận hàng (tiền mặt)
                            </label>
                        </div>
                        <div class="cart-page__content__header__checkbox">
                            <input value="momo-pay" class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                <img class="image-payment" src="/images/payment/momo.png">
                                Momo
                            </label>
                        </div>
                        <div class="cart-page__content__header__checkbox">
                            <input value="zalo-pay" class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                <img class="image-payment" src="/images/payment/zalo.png">
                                ZaloPay
                            </label>
                        </div>
                        <div class="cart-page__content__header__checkbox">
                            <input value="shopee-pay" class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                <img class="image-payment" src="/images/payment/shopee.png">
                                ShopeePay
                            </label>
                        </div>
                        <div class="cart-page__content__header__checkbox">
                            <input value="credit" class="form-check-input" type="radio" name="flexRadioDefault"
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
    </div>
</div>

<script src="/js/product_detail.js"></script>