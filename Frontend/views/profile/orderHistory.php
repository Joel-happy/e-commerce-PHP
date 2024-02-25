<br>
<div class="container">
  <div class="row">
    <div class="col">
      <table class="table">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Date Purchased</th>
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