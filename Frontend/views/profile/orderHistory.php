<br>
<div class="container">
  <div class="row">
    <div class="col">
      <table class="table">
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Date Purchased</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orderHistoryData as $element) { ?>
            <tr>
              <td><?php echo $element['product_id']; ?></td>
              <td><a href="viewProduct?productId=<?php echo $element['product_id']; ?>"><?php echo $element['name']; ?></a></td>
              <td><?php echo $element['date']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>