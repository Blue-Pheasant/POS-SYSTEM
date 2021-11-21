<script type="text/javascript">
  document.title = 'Danh sách cửa hàng';
</script> 
<h1>Thăm Kaffee store chúng mình</h1>
<div class="store__listing">
    <div class="container">
        <div class="row g-5">
            <?php
            foreach ($params['store'] as $param) {
                echo '
                    <div class="col-xl-4 col-md-6 col-sm-6 col-xs-6">
                        <div class="item-card">
                            <img src="' . $param->image_url . '" alt=""
                                class="item-image" />
                            <div class="item-info">
                                <p class="item-status">' . $param->status . '</p>
                                <p class="item-open_time">' . $param->open_time . '</p>
                                <p class="item-phone">' . $param->phone . '</p>
                                <div class="item-footer">
                                    <p>' . $param->address . '</p>
                                </div>
                            </div>
                        </div>
                    </div><br><br><br>';
                }
            ?>
        </div>
    </div>
</div><br><br><br>




