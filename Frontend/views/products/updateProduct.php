<!-- Update Product Modal-->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Update Product</h2>
        <form action="productController/updateProduct" method="post" id="updateProductForm" enctype="multipart/form-data">
            <input type="hidden" id="productId" name="productId" value="">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" maxlength="30" placeholder="Nom du produit" required>
            <br><br>

            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage" accept="image/*">
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

            <input type="submit" value="Update Product">
        </form>
    </div>
</div> <!-- End Update Product Modal -->
