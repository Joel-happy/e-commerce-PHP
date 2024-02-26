<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <?php 
        include('Frontend/views/_notLoggedIn.php'); 
        include('Frontend/views/_queryMessageHandler.php');
    ?>

    <div class="container">
        <h2 class="mb-4">Add Product</h2>
        <!-- Add product form -->
        <form action="productController/addProduct" method="post" id="addProductForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" name="productName" maxlength="30" placeholder="Nom du produit" required>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image:</label>
                <input type="file" class="form-control-file" id="productImage" name="productImage" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Description:</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="4" maxlength="100" placeholder="Description du produit" required></textarea>
            </div>
            <div class="form-group">
                <label for="productCategory">Category:</label>
                <select class="form-control" id="productCategory" name="productCategory" required>
                    <option value="" disabled selected>Selectionnez une catégorie</option>
                    <option value="Téléphone">Téléphone</option>
                    <option value="Casque">Casque</option>
                    <option value="Ordinateur">Ordinateur</option>
                </select> 
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price:</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice" min="1" oninput="validatePrice(this)" placeholder="Entrez un prix (ex: 10.99)" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form> <!-- End add product form -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Custom script -->
    <script src="Frontend/js/product.js"></script>
</body>
</html>
