<br>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          Order History
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Date Purchased</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orderHistoryData as $product) { ?>
                  <tr>
                    <td><a href="viewProduct?productId=<?php echo $product['product_id']; ?>"><?php echo $product['name']; ?></a></td>
                    <td><?php echo $product['date']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>