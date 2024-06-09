Vue.createApp({
    data() {
        return {
            searchQuery: '',
            products: [],
            cart: [],
            notification: null,
            notificationType: null,
            cartData: {},
            stockData: {}
        }
    },
    created() {
        axios.get('../../includes/product.php')
            .then(response => {
                this.products = response.data;
                this.products.forEach(product => {
                    this.stockData[product.id] = product.quantity;
                });
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        searchProduct() {
            axios.get('../../includes/product.php', {
                params: {
                    productName: this.searchQuery
                }
            })
                .then(response => {
                    this.products = response.data;
                    this.products.forEach(product => {
                        if (this.stockData[product.id]) {
                            product.quantity = this.stockData[product.id];
                            if (this.cartData[product.id]) {
                                product.quantity -= this.cartData[product.id];
                            }
                        }
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        },
        addToCart(product) {
            let quantity = prompt("Enter quantity:");
            if (quantity !== null) {
                if (quantity > product.quantity) {
                    this.notification = "You can't add more items than available in stock.";
                    this.notificationType = 'danger';
                } else {
                    product.quantity -= quantity;
                    this.cart.push({
                        product: product,
                        quantity: quantity
                    });
                    if (this.cartData[product.id]) {
                        this.cartData[product.id] += quantity;
                    } else {
                        this.cartData[product.id] = quantity;
                    }
                    this.stockData[product.id] -= quantity;
                    this.notification = `Successfully added <strong>${product.name}</strong> x <strong>${quantity}</strong>`;
                    this.notificationType = 'success';
                }
            }
        }
    },
    watch: {
        searchQuery: function (newSearchQuery, oldSearchQuery) {
            this.searchProduct();
        }
    }
}).mount('#app');