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
            doc.setFontSize(36);
            doc.setFont('bold');
            doc.text('GoodShot', 105, 20, null, null, 'center');
            doc.setFontSize(12); doc.setFont('normal'); doc.text('For all Feedback & Comments:', 105, 30, null, null, 'center');
            doc.text('brando@goodshot.xyz', 105, 36, null, null, 'center');
            doc.text('or call/text 997-634-1828', 105, 42, null, null, 'center');
            doc.text('BUY ONE GET ONE MEDIUM FRAPPE', 105, 48, null, null, 'center');
            doc.text('Go to www.mcdvoice.com within 7 days', 105, 54, null, null, 'center');
            doc.text('and tell us about your visit.', 105, 60, null, null, 'center');
            doc.setFont('bold');
            doc.text('Validation Code:', 105, 66, null, null, 'center');
            doc.setFont('normal');
            doc.text('Expires 30 days after receipt date.', 105, 72, null, null, 'center');
            doc.text('Valid at participating US McDonald\'s.', 105, 78, null, null, 'center');
            doc.setFont('bold');
            doc.text('Survey Code:', 105, 84, null, null, 'center');
            doc.setFont('normal');
            doc.text('13334-06661-21619-18579-00010-8', 105, 90, null, null, 'center');

            doc.setLineWidth(0.5);
            doc.line(10, 100, 200, 100);

            // Restaurant Info
            doc.setFontSize(12);
            doc.setFont('bold');
            doc.text('McDonald\'s Restaurant #13334', 105, 110, null, null, 'center');
            doc.setFont('normal');
            doc.text('6333 FALLS OF NEUSE', 105, 116, null, null, 'center');
            doc.text('RALEIGH, NC 27609', 105, 122, null, null, 'center');
            doc.text('TEL# 919-878-0085', 105, 128, null, null, 'center');

            doc.line(10, 138, 200, 138);

            // Date and Order Number
            const now = new Date();
            const dateStr = `${now.getMonth() + 1}/${now.getDate()}/${now.getFullYear()} ${now.toLocaleTimeString()}`;
            doc.setFontSize(10);
            doc.text(dateStr, 105, 148, null, null, 'center');
            doc.text('Order 66', 105, 154, null, null, 'center');

            // Order Details
            doc.setFontSize(12);
            doc.setFont('normal');
            let y = 160;
            this.cart.forEach(item => {
                doc.text(`${item.product.name} x ${item.quantity}`, 20, y);
                doc.text(item.product.price.toFixed(2), 190, y, null, null, 'right');
                y += 6;
            });

            // Subtotal and Total
            y += 6;
            doc.text('Subtotal', 20, y);
            doc.text(this.totalAmount.toFixed(2), 190, y, null, null, 'right'); // Use this.totalAmount instead of this.formattedTotalAmount
            y += 6;
            doc.setFont('bold');
            doc.text('Take-Out Total', 20, y);
            doc.text(this.totalAmount.toFixed(2), 190, y, null, null, 'right'); // Use this.totalAmount instead of this.formattedTotalAmount
            doc.setFont('normal');

            doc.line(10, y + 10, 200, y + 10);
            y += 16;

            // Payment Details
            doc.text('Cash', 20, y);
            doc.text(this.cashAmount.toFixed(2), 190, y, null, null, 'right');
            y += 6;
            doc.text('Change', 20, y);
            doc.text(this.changeAmount.toFixed(2), 190, y, null, null, 'right');

            // Footer
            doc.setFont('bold');
            doc.text('PAID', 105, y + 16, null, null, 'center');

            // Save the PDF locally for demonstration purposes
            doc.save("invoice.pdf");

            // Get the PDF as a base64 string
            const pdfString = doc.output('datauristring');

            return pdfString;
        },
        confirmPayment() {
            if (this.cashAmount >= this.totalAmount) {
                const pdfString = this.generateInvoice();

                // Prepare invoice data
                const invoiceData = {
                    cart: this.cart,
                    totalAmount: this.totalAmount,
                    cashierName: "Current Cashier", // Replace with actual cashier name
                    pdf: pdfString
                };

                axios.post('../includes/api/sales.php', invoiceData)
                    .then(response => {
                        if (response.data.success) {
                            this.notification = "Payment settled and invoice saved successfully.";
                            this.notificationType = 'success';
                            this.clearCart();
                        } else {
                            this.notification = "Error saving invoice: " + response.data.message;
                            this.notificationType = 'danger';
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        this.notification = "Error saving invoice.";
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
