<div id="removeProduct-modal-content" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Remove Product</p>
            <button id="close-modal-removeProduct" class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <form action="forms/remove-product.php" method="POST" enctype="multipart/form-data">
                <div class="field-body">
                    <div class="field">
                        <label class="label">Product ID</label>
                        <div class="control">
                            <input class="input" type="number" name="product_id" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Quantity</label>
                        <div class="control">
                            <input id="quantityInput" class="input" type="number" name="quantity" required>
                        </div>
                    </div>

                </div>
                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="remove_all">
                            All product?
                        </label>
                    </div>
                </div>
                <br>
                <div class="control">
                    <button class="button is-primary" name="submit" type="submit">Remove Product</button>
                </div>
            </form>
        </section>
        </section>
        <footer class="modal-card-foot">
        </footer>
    </div>
</div>