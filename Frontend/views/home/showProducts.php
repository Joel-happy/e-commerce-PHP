<h3>Product List</h3>
<ul>
    <?php if (empty($products)) : ?>
        <li>No products available</li>
    <?php else : ?>
        <?php foreach ($products as $product) : ?>
            <li><a href="viewProduct?productId=<?= $product['id']; ?>"><?php echo $product['name']; ?> - <?php echo $product['price']; ?></a></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>