<?php
use app\core\Application;
use app\models\User;
$isGuest = Application::$app->isGuest();
$userID = Application::$app->session->get('user');
$isCartExist = Application::$app->session->exists('cart');
$cartModel = Application::$app->session->get('cart');
$userModel = User::get($userID);
?>
<script type="text/javascript">
  document.title = 'Danh sách sản phẩm';
</script> 
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h1>Sản phẩm</h1>
        <?php if ($userModel->getRole() == 'admin') { ?>
          <a href="/admin%c=products&a=create" class="btn btn-success">Tạo ra</a>
        <?php } ?>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <thead>
            <tr>
              <th>Mã sản phẩm</th>
              <th>Mục</th>
              <th>Tên sản phẩm</th>
              <th>Mô tả sản phẩm</th>
              <th>Giá</th>
              <th class="no-sort"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($params['products'] as $productModel) { 
            ?>
              <tr>
                <td><?=$productModel->getId()?></td>
                <td><?=$productModel->getCategory()?></td>
                <td><?=$productModel->getName()?></td>
                <td><?=$productModel->getDescription()?></td>
                <td><?=$productModel->getPrice()?></td>
                <td>
                  <?php if ($userModel->getRole() == 'admin') { ?>
                    <a class="fa fa-eye btn btn-info btn-sm" href="/admin%c=products&a=details?id=<?=$productModel->getId()?>"></a>
                    <a class="fa fa-pencil btn btn-warning btn-sm" href="/admin%c=products&a=edit?id=<?=$productModel->getId()?>"></a>
                    <a class="fa fa-trash btn btn-danger btn-sm" href="/admin%c=products&a=delete?id=<?=$productModel->getId()?>"></a>
                  <?php }?>
                </td>
              </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>