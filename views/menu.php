<?php

use app\core\Application;
use app\models\CartItem;

?>

<?php
    if(Application::isGuest()) {
        Application::$app->response->redirect('/login');
    }
?>
<script type="text/javascript">
  document.title = 'Menu';
</script> 
<div class="row menu_sp">
    <div class="menu col-xl-8 col-md-7">
        <div class="menu__search">
            <div class="form-floating mb-3">
                <input type="keyword" name="keyword" class="form-control" id="floatingInput" placeholder="Tìm kiếm theo tên sản phẩm bạn quan tâm">
                <label for="floatingInput">Tìm kiếm theo tên sản phẩm bạn quan tâm</label>
            </div>
        </div>

        <div class="menu__options">
            <a class="option" href="/menu?category_id=1">
                <div class="option-image-block">
                    <img src="/images/coffee-cup.png" alt="coffee-cup" class="option-image" />
                </div>
                <h6>
                    Cà phê
                </h6>
            </a>
            <a class="option" href="/menu?category_id=5">
                <div class="option-image-block">
                    <img src="/images/milk-tea.png" alt="coffee-cup" class="option-image" />
                </div>
                <h6>
                    Trà trái cây - Trà sữa
                </h6>
            </a>
            <a class="option" href="/menu?category_id=2">
                <div class="option-image-block">
                    <img src="/images/milkshake.png" alt="coffee-cup" class="option-image" />
                </div>
                <h6>
                    Đá xay
                </h6>
            </a>
            <a class="option" href="/menu?category_id=18">
                <div class="option-image-block">
                    <img src="/images/coffee.png" alt=" coffee-cup" class="option-image" />
                </div>
                <h6>
                    Thưởng thức tại nhà
                </h6>
            </a>
            <a class="option" href="/menu?category_id=20">
                <div class="option-image-block">
                    <img src="/images/glass.png" alt="coffee-cup" class="option-image" />
                </div>
                <h6>
                    Tumbler collection
                </h6>
            </a>
        </div>

        <div class="menu__listing">
            <div class="container">
                <div class="row g-5">
                    <?php
                    foreach ($params['products'] as $param) {
                        echo '
                        <div class="col-xl-3 col-md-6 col-xs-12 wrapper_product">
                            <a href="/product?id=' . $param->id . '">
                                <div class="item-card product">
                                    <img src="' . $param->image_url . '" alt=""
                                        class="item-image" />
                                    <div class="item-info">
                                        <p class="item-name">' . $param->name . '</p>
                                        <div class="item-footer">
                                            <p>' . $param->price . '</p>
                                            <div class="item-button">
                                                <img class="item-button-image"
                                                    src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTYuODU3MTQgNi44NTcxNFYwSDkuMTQyODZWNi44NTcxNEgxNlY5LjE0Mjg2SDkuMTQyODZWMTZINi44NTcxNFY5LjE0Mjg2SDBWNi44NTcxNEg2Ljg1NzE0WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg=="
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <div class="cart-page__content col-xl-4 col-md-5">
        <div class="cart-page__content__header">
            <div>Các món đã chọn</div>
            <a class="more-item-button" href="/menu">Thêm món</a>
        </div>
        <div class="cart-page-divider"></div>

        <div class="cart-page__content__body">
            <?php
            foreach ($params['items'] as $parameter) {
                echo '<div class="cart-page-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-2 img_sp">
                                                <img class="cart-page__item-image"
                                                    src="' . $parameter->image_url . '" />
                                            </div>
                                            <div class="col-lg-6 col-md-5 col-sm-4 col-5 name">
                                                <div class="name_sp">' . $parameter->name . '</div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-4 change_SL">
                                                <div class="product-detail-footer">
                                                    <div class="product-detail-footer-quantity">
                                                        <button id="decrease-quantity-button" disabled
                                                            class="item-button-disabled" onclick="decreaseQuantity()">
                                                            <img class="item-button-image"
                                                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMiIgdmlld0JveD0iMCAwIDE2IDIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxNiIgaGVpZ2h0PSIyIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K"
                                                                alt="" />
                                                        </button>
                                                        <span id="product-quantity" class="product-quantity">
                                                            ' . $parameter->quantity . '
                                                        </span>
                                                        <button id="increase-quantity-button"
                                                            onclick="increaseQuantity()">
                                                            <img class="item-button-image"
                                                                src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTYuODU3MTQgNi44NTcxNFYwSDkuMTQyODZWNi44NTcxNEgxNlY5LjE0Mjg2SDkuMTQyODZWMTZINi44NTcxNFY5LjE0Mjg2SDBWNi44NTcxNEg2Ljg1NzE0WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg=="
                                                                alt="" />
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-2 col-1">
                                                <button>
                                                    <img src="/images/delete.svg" class="cart-page__delete" />
                                                </button>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                ' . $parameter->price . ' đ
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-6">
                                                Size: ' . $parameter->size . '
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" id="cart-page__note" class="form-control"
                                                        placeholder="Ghi chú" aria-label="note"
                                                        aria-describedby="basic-addon1" value="' . $parameter->note . '">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
            }
            ?>
        </div>



        <div class="cart-page__content__header">
            <div>Tổng cộng</div>
        </div>
        <?php
            $cart_id = Application::$app->cart->id;
            $cartItem = CartItem::getCartItem($cart_id);
            $totalPrice = 0;
            foreach($cartItem as $item) {
                $totalPrice += $item->getTotalPrice();
            }
        ?>
        <div class="cart-page-divider"></div>
        <div class="cart-page__content__total">
            <div>Tạm tính</div>
            <?php
                if(empty($cartItem)) {
                    echo '<div>0đ</div>';
                } else echo '<div> ' . number_format($totalPrice) . 'đ' . ' </div>';
            ?> 
        </div>
        <div class="cart-page__content__footer">
            <div>
                <div>Thành tiền</div>
                <?php
                    echo '<div class="cart-page-total">' . number_format($totalPrice) . 'đ' . '</div>'
                ?>
            </div>
            <?php $form = app\core\Form\Form::begin('/cart', "") ?>    
                <button type="submit" class="checkout-button">Đặt hàng</button>
            <?php app\core\form\Form::end() ?>
        </div>
    </div>
</div>