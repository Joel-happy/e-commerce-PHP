<?php if (empty($products)) : ?>
    <li>No products available</li>
<?php else : ?>
    <?php foreach ($products as $product) : ?>
        <div class="swiper-slide">
            <div class="product-card position-relative">
                <div class="image-holder">
                    <img src="Frontend/assets/userImg/<?php echo $product['image']; ?>" alt="product-item" class="img-fluid">
                </div>
                <div class="cart-concern position-absolute">
                    <div class="cart-button d-flex">
                        <a href="viewProduct?productId=<?php echo $product['id']; ?>" class="btn btn-medium btn-black">Afficher les détails
                        </a>
                    </div>
                </div>
                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                    <h3 class="card-title text-uppercase">
                        <a href="viewProduct?productId=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                    </h3>
                    <span class="item-price text-primary"><?php echo $product['price']; ?> €</span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>