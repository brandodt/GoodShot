Vue.createApp({
    data() {
        return {
            searched: '',
            searchQuery: '',
            products: [],
            cart: [],
            notification: null
        }
    },
    methods: {
        searchProduct() {
            axios.get('../../../includes/product.php', {
                params: {
                    productName: this.searchQuery
                }
            })
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        addToCart(product) {
            let quantity = prompt("Enter quantity:");
            if (quantity > product.quantity) {
                this.notification = "You can't add more items than available in stock.";
            } else {
                this.cart.push({
                    product: product,
                    quantity: quantity
                });
                this.notification = null;
            }
        }
    },
    watch: {
        searchQuery: function (newSearchQuery, oldSearchQuery) {
            this.searchProduct();
        }
    }
}).mount('#app');