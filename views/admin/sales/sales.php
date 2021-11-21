<script type="text/javascript">
  document.title = 'Lịch sử bán hàng';
</script> 
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h1>Lịch sử bán hàng</h1>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <thead>
            <tr>
              <th>Mã giao dịch</th>
              <th>Tên khách hàng</th>
              <th>Tên sản phẩm</th>
              <th>Kích thước</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th class="no-sort"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($params['records'] as $recordtModel) { 
            ?>
              <tr>
                <td><?=$recordtModel->getId()?></td>
                <td><?=$recordtModel->getUserName()?></td>
                <td><?=$recordtModel->getProductName()?></td>
                <td><?=$recordtModel->getSize()?></td>
                <td><?=$recordtModel->getQuantity()?></td>
                <td><?=$recordtModel->getTotalPrice()?></td>
                <td>
                  <a class="fa fa-eye btn btn-info btn-sm" href="/admin/sales/details?id=<?=$recordtModel->getId()?>"></a>
                  <a class="fa fa-trash btn btn-danger btn-sm" href="/admin/sales/delete?id=<?=$recordtModel->getId()?>"></a>
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