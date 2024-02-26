<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="C:\xampp\htdocs\e-commerce-PHP\Frontend\css\post.css">
</head>

<body>
    <div>

        <form method="get" action="">
            <div class="w3-container w3-padding">
                <form action="" class="search-bar">
                    <h8>Search : </h8>
                <input type="search" name="search">
                <button class="search-btn" type="submit">User</button>
                <button class="search-btn" type="submit">Product</button>
                      <?php if (empty($_GET["search"])) : ?>
                        <h1> <?php echo $_GET["search"] ?>  </h1>
                        <?php endif; ?>
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
                    
               {{.Titre}}</button>
               
                </form>
                <label for="chk" aria-hidden="true">{{.Contenu}}</label>
                <label for="chk" aria-hidden="true">{{.Tag}}</label>
                <label for="chk" aria-hidden="true">{{.Date_Heure}}</label><button name="like" value={{.ID}}>J'aime</button> {{end}}

                </h1>
                

            </div>
</body>


</html>