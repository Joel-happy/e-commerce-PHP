<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <title>Y'Store-cart</title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet">
  <link href="Frontend/assets/icones/favicons/apple-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
  <link href="Frontend/assets/icones/favicons/apple-icon-60x60.png" rel="apple-touch-icon" sizes="60x60">
  <link href="Frontend/assets/icones/favicons/apple-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
  <link href="Frontend/assets/icones/favicons/apple-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
  <link href="Frontend/assets/icones/favicons/apple-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
  <link href="Frontend/assets/icones/favicons/apple-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
  <link href="Frontend/assets/icones/favicons/apple-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
  <link href="Frontend/assets/icones/favicons/apple-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
  <link href="Frontend/assets/icones/favicons/apple-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
  <link href="Frontend/assets/icones/favicons/android-icon-192x192.png" rel="icon" sizes="192x192" type="image/png">
  <link href="Frontend/assets/icones/favicons/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
  <link href="Frontend/assets/icones/favicons/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png">
  <link href="Frontend/assets/icones/favicons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
  <link href="/manifest.json" rel="manifest">
  <meta content="#ffffff" name="msapplication-TileColor">
  <meta content="/ms-icon-144x144.png" name="msapplication-TileImage">
  <meta content="#ffffff" name="theme-color">
  <link rel="stylesheet" href="Frontend/css/cart.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
  <section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Panier</h1>
                    </div>

                    <?php $totalAmount = 0;
                    foreach ($products as $product) :
                      $productName = $product['name'];
                      $productImage = $product['image'];
                      $productCategory = $product['category'];
                      $productQuantity = $product['quantity'];
                      $productTotalPrice = $product['total_price'];

                      // Increment total amount by the total price of each product
                      $totalAmount += $productTotalPrice;
                    ?>
                      <?php
                      echo '<hr class="my-4">';
                      echo '<div class="row mb-4 d-flex justify-content-between align-items-center">';
                      echo '<div class="col-md-2 col-lg-2 col-xl-2">';
                      echo '<img src="Frontend/assets/userImg/' . $productImage . '" class="img-fluid rounded-3" alt="' . $productName . '">';
                      echo '</div>';
                      echo '<div class="col-md-3 col-lg-3 col-xl-3">';
                      echo '<h6 class="text-muted">' . $productCategory . '</h6>';
                      echo '<h6 class="text-black mb-0">' . $productName . '</h6>';
                      echo '</div>';
                      echo '<div class="col-md-3 col-lg-3 col-xl-2 d-flex">';
                      echo '<button class="btn btn-link px-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown()">';
                      echo '<i class="fas fa-minus"></i>';
                      echo '</button>';
                      echo '<input id="form1" min="0" name="quantity" value="' . $productQuantity . '" type="number" class="form-control form-control-sm" />';
                      echo '<button class="btn btn-link px-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp()">';
                      echo '<i class="fas fa-plus"></i>';
                      echo '</button>';
                      echo '</div>';
                      echo '<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">';
                      echo '<h6 class="mb-0">€ ' . $productTotalPrice . '</h6>';
                      echo '</div>';
                      echo '<div class="col-md-1 col-lg-1 col-xl-1 text-end">';
                      echo '<a href="cartController/removeProductFromCart?productId=' . $product['id'] . '" class="text-muted"><i class="fas fa-times"></i></a>';
                      echo '</div>';
                      echo '</div>';
                      ?>
                    <?php endforeach; ?>
                    <hr class="my-4">

                    <div class="pt-5">
                      <h6 class="mb-0"><a href="home" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">items</h5>
                      <h5>€ <?php echo number_format($totalAmount, 2); ?></h5>
                    </div>

                    <h5 class="text-uppercase mb-3">Shipping</h5>

                    <div class="mb-4 pb-2">
                      <select class="select">
                        <option value="1">Standard-Delivery- €5.00</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                      </select>
                    </div>

                    <h5 class="text-uppercase mb-3">Give code</h5>

                    <div class="mb-5">
                      <div class="form-outline">
                        <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea2">Enter your code</label>
                      </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5>€ 137.00</h5>
                    </div>

                    <a href="cartController/checkout" class="btn btn-dark btn-block btn-lg" role="button" data-mdb-ripple-color="dark">Checkout</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>