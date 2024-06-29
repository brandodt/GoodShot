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
            changeAmount: 0,
            transactionNum: null
        };
    },
    created() {
        axios.get('../includes/api/product.php')
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
        },
        formattedTransactionNum() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-based
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            this.transactionNum = `${year}${month}${day}${hours}${minutes}${seconds}`;
            return `${this.transactionNum}`;
        }
    },
    methods: {
        searchProduct() {
            axios.get('../includes/api/product.php', {
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
            axios.post('../includes/api/admin.php', { password: this.adminPassword })
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
                item.product.quantity += item.quantity; // Restore product quantity
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
        },
        generateInvoice() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Header
            doc.setFontSize(12);
            doc.setFont('Helvetica', 'bold');
            doc.text('GOODSHOT STORE', 105, 10, null, null, 'center');
            doc.setFont('Helvetica', 'normal');
            doc.text('Brgy. Etopaz, Roocab, Etivac', 105, 16, null, null, 'center');
            doc.text('two-e@goodshot.xyz | goodshot.xyz | 09694201337', 105, 22, null, null, 'center');

            // Details
            doc.setFontSize(10);
            doc.text('Sold To: Walk-In', 10, 30);
            const now = new Date();
            const dateStr = `${now.getMonth() + 1}/${now.getDate()}/${now.getFullYear()} ${now.toLocaleTimeString()}`;
            doc.text(`Date: ${dateStr}`, 10, 36);
            doc.text('Cashier: CODE ADMIN', 10, 42);
            // doc.text(`T-ID: ${this.transactionNum}`, 140, 42);

            doc.setLineWidth(0.5);
            doc.line(10, 50, 200, 50);

            // Item details
            let y = 58;
            this.cart.forEach(item => {
                doc.text(`${item.product.name}`, 10, y);
                y += 6;
                doc.text(`${item.quantity} x ${item.product.price.toFixed(2)}`, 10, y);
                doc.text((item.quantity * item.product.price).toFixed(2), 190, y, null, null, 'right');
                y += 6;
            });

            doc.setLineWidth(0.5);
            doc.line(10, y + 2, 200, y + 2);
            y += 10;

            // Summary
            doc.text('No. of item(s):', 10, y);
            doc.text(`${this.cart.length}`, 190, y, null, null, 'right');
            y += 6;

            doc.text('SUB TOTAL:', 10, y);
            doc.text(this.totalAmount.toFixed(2), 190, y, null, null, 'right');
            y += 6;

            // doc.text('Discounts:', 10, y);
            // doc.text('0.00', 190, y, null, null, 'right');
            // y += 6;

            doc.setLineWidth(0.5);
            doc.line(10, y + 2, 200, y + 2);
            y += 10;

            doc.setFont('Helvetica', 'bold');
            doc.text('AMOUNT DUE:', 10, y);
            doc.text(this.totalAmount.toFixed(2), 190, y, null, null, 'right');
            y += 6;

            doc.setFont('Helvetica', 'normal');
            doc.text('Cash Tendered:', 10, y);
            doc.text(this.cashAmount.toFixed(2), 190, y, null, null, 'right');
            y += 6;

            doc.text('CHANGE:', 10, y);
            doc.text(this.changeAmount.toFixed(2), 190, y, null, null, 'right');
            y += 6;

            doc.setLineWidth(0.5);
            doc.line(10, y + 2, 200, y + 2);
            y += 10;

            doc.setFont('Helvetica', 'normal');
            doc.text(`Transaction # ${this.transactionNum}`, 105, y, null, null, 'center');
            y += 10;

            doc.setFont('Helvetica', 'bold');
            doc.text('THANK YOU', 105, y, null, null, 'center');

            // Save the PDF locally for demonstration purposes
            // doc.save("receipt.pdf");

            // Get the PDF as a base64 string
            const pdfString = doc.output('datauristring');

            // Open the PDF in a new tab
            const newTab = window.open();
            newTab.document.write(`<iframe width='100%' height='100%' src='${pdfString}'></iframe>`);
        },
        confirmPayment() {
            if (this.cashAmount >= this.totalAmount) {
                this.generateInvoice();
                // Prepare data for stock update
                const productsToUpdate = this.cart.map(item => ({
                    productId: item.product.product_id, // Assuming each cart item has an 'id' and 'quantity'
                    quantitySold: item.quantity
                }));

                // Axios POST request to update stock
                axios.post('../includes/api/sales.php', { products: productsToUpdate })
                    .then(response => {
                        // Handle success
                        console.log('Stock updated successfully', response);
                        this.notification = "Payment successful!";
                        this.notificationType = 'success';
                        this.clearCart();
                    })
                    .catch(error => {
                        // Handle error
                        console.error('Error updating stock', error);
                        this.notification = "Payment successful but error updating stock.";
                        this.notificationType = 'danger';
                    });
            } else {
                this.notification = "Insufficient cash.";
                this.notificationType = 'danger';
            }
        }
    },
    watch: {
        searchQuery() {
            this.searchProduct();
        }
    }
}).mount('#app');
