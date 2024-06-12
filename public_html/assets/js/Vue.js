Vue.createApp({
    data() {
        return {
            searchQuery: '',
            products: [],
            cart: [],
            notification: null,
            notificationType: null,
            cartData: {},
            stockData: {},
            isClearCartModalActive: false,
            isPasswordModalActive: false,
            adminPassword: '',
            totalAmount: 0,
            cashAmount: 0,
            changeAmount: 0
        }
    },
    created() {
        axios.get('../../includes/api/product.php')
            .then(response => {
                this.products = response.data.map(product => ({
                    ...product,
                    price: parseFloat(product.price), // Ensure price is a number
                    quantityToAdd: 1 // Initialize quantityToAdd for each product
                }));
                this.products.forEach(product => {
                    this.stockData[product.product_id] = product.quantity;
                });
            })
            .catch(error => {
                console.log(error);
            });
    },
    computed: {
        formattedTotalAmount() {
            return `₱${this.totalAmount.toFixed(2)}`;
        },
        formattedCashAmount() {
            return `₱${this.cashAmount.toFixed(2)}`;
        },
        formattedChangeAmount() {
            return `₱${this.changeAmount.toFixed(2)}`;
        }
    },
    methods: {
        searchProduct() {
            axios.get('../../includes/api/product.php', {
                params: {
                    productName: this.searchQuery
                }
            })
                .then(response => {
                    this.products = response.data.map(product => ({
                        ...product,
                        price: parseFloat(product.price), // Ensure price is a number
                        quantityToAdd: 1 // Re-initialize quantityToAdd for each product
                    }));
                    this.products.forEach(product => {
                        if (this.stockData[product.product_id] !== undefined) {
                            product.quantity = this.stockData[product.product_id];
                        }
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        },
        addToCart(product) {
            let quantity = product.quantityToAdd;
            if (quantity <= 0) {
                this.notification = "Invalid quantity. Please try again.";
                this.notificationType = 'danger';
            } else if (quantity > this.stockData[product.product_id]) {
                this.notification = "You can't add more items than available in stock. " + this.stockData[product.product_id] + " item(s) left.";
                this.notificationType = 'danger';
            } else {
                const cartProduct = this.cart.find(item => item.product.product_id === product.product_id);
                if (cartProduct) {
                    cartProduct.quantity += quantity;
                } else {
                    this.cart.push({
                        product: product,
                        quantity: quantity
                    });
                }
                if (this.cartData[product.product_id]) {
                    this.cartData[product.product_id] += quantity;
                } else {
                    this.cartData[product.product_id] = quantity;
                }
                this.stockData[product.product_id] -= quantity;
                product.quantity -= quantity; // Update product quantity directly in the list
                product.quantityToAdd = 1; // Reset quantityToAdd after adding to cart
                this.notification = `Successfully added <strong>${product.name}</strong> x <strong>${quantity}</strong>`;
                this.notificationType = 'success';
                this.updateTotalAmount();
            }
        },
        updateTotalAmount() {
            this.totalAmount = this.cart.reduce((sum, item) => sum + parseFloat(item.product.price) * item.quantity, 0);
        },
        decreaseQuantity(item) {
            if (item.quantity > 1) {
                item.quantity--;
                this.stockData[item.product.product_id]++;
                this.cartData[item.product.product_id]--;
                item.product.quantity++; // Update product quantity in the list
                this.updateTotalAmount();
            }
        },
        increaseQuantity(item) {
            if (this.stockData[item.product.product_id] > 0) {
                item.quantity++;
                this.stockData[item.product.product_id]--;
                this.cartData[item.product.product_id]++;
                item.product.quantity--; // Update product quantity in the list
                this.updateTotalAmount();
            }
        },
        removeItem(index) {
            const item = this.cart[index];
            this.stockData[item.product.product_id] += item.quantity;
            item.product.quantity += item.quantity; // Update product quantity in the list
            delete this.cartData[item.product.product_id];
            this.cart.splice(index, 1);
            this.updateTotalAmount();
        },
        openClearCartModal() {
            this.isClearCartModalActive = true;
        },
        closeClearCartModal() {
            this.isClearCartModalActive = false;
        },
        openPasswordModal() {
            this.isClearCartModalActive = false; // Close the initial modal
            this.isPasswordModalActive = true;
        },
        closePasswordModal() {
            this.isPasswordModalActive = false;
            this.adminPassword = '';
        },
        confirmClearCart() {
            axios.post('../../includes/api/admin.php', { password: this.adminPassword })
                .then(response => {
                    if (response.data.success) {
                        this.clearCart();
                    } else {
                        alert(response.data.message);
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        clearCart() {
            // For each item in the cart, add its quantity back to the stock.
            for (let item of this.cart) {
                this.stockData[item.product.product_id] += item.quantity;
            }

            // Clear the cart.
            this.cart = [];
            this.cartData = {};

            // Reset the quantityToAdd for each product.
            this.products.forEach(product => {
                product.quantityToAdd = 1;
            });

            // Update the total amount and close the modals.
            this.updateTotalAmount();
            this.closeClearCartModal();
            this.closePasswordModal();
        },
        calculateChange() {
            this.changeAmount = this.cashAmount - this.totalAmount;
        },
        updateCashAmount(value) {
            this.cashAmount = parseFloat(this.cashAmount.toString() + value.toString());
            this.calculateChange();
        },
        clearCashAmount() {
            this.cashAmount = 0;
            this.calculateChange();
        }
    }
}).mount('#app');
