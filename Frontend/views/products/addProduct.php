<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
</head>
<body>
  <?php 
        include('Frontend/views/_notLoggedIn.php'); 
        include('Frontend/views/_queryMessageHandler.php');
    ?>

    <h2>Add Product</h2>
    <form action="productController/addProduct" method="post" id="addProductForm">
      <label for="productName">Product Name:</label>
      <input type="text" id="productName" name="productName" maxlength="30" placeholder="Nom du produit" required>
      <br><br>
      
      <label for="productDescription">Description:</label>
      <textarea id="productDescription" name="productDescription" rows="4" maxlength="100" placeholder="Description du produit" required></textarea>
      <br><br>
      
      <label for="productCategory">Category:</label>
      <select id="productCategory" name="productCategory" required>
        <option value="" disabled selected>Selectionnez une catégorie</option>
        <option value="telephone">Téléphone</option>
        <option value="casque">Casque</option>
        <option value="ordinateur">Ordinateur</option>
      </select>
      <br><br>
      
      <label for="productPrice">Product Price:</label>
      <input type="text" id="productPrice" name="productPrice" min="0" oninput="validatePrice(this)" placeholder="Entrez un prix (ex: 10.99)">
      <br><br>
      
      <input type="submit" value="Add Product">
    </form>

    <!-- Scripts -->
    <script src="Frontend/js/product.js"></script>
</body>
</html>
