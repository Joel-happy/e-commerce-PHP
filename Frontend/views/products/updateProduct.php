<!-- Update Product Modal-->
<div id="updateModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="productController/updateProduct" method="post" id="updateProductForm" enctype="multipart/form-data">
                    <input type="hidden" id="productId" name="productId" value="">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name:</label>
                        <input type="text" id="productName" name="productName" maxlength="30" placeholder="Nom du produit" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image:</label>
                        <input type="file" id="productImage" name="productImage" accept="image/*" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description:</label>
                        <textarea id="productDescription" name="productDescription" rows="4" maxlength="100" placeholder="Description du produit" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productCategory" class="form-label">Category:</label>
                        <select id="productCategory" name="productCategory" class="form-select" required>
                            <option value="" disabled selected>Selectionnez une catégorie</option>
                            <option value="Téléphone">Téléphone</option>
                            <option value="Casque">Casque</option>
                            <option value="Ordinateur">Ordinateur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Product Price:</label>
                        <input type="text" id="productPrice" name="productPrice" min="0" oninput="validatePrice(this)" placeholder="Entrez un prix (ex: 10.99)" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- End Update Product Modal -->

<!-- Custom script -->
<script src="Frontend/js/product.js"></script>