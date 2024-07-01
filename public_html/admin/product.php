<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bulma/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sortable.js"></script>
    <script src="https://unpkg.com/vue@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        .scrollable-table {
            height: 75vh;
            max-height: 80vh;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="section">
            <div class="columns">
                <div class="column is-2">
                    <aside class="menu">
                        <p class="lego has-text-primary is-size-1">GOODSHOT</p>
                        <p class="menu-label has-text-white">Overview</p>
                        <ul class="menu-list">
                            <li class="pt-2"><a href="index.php" class="has-background-grey-light has-text-white nice">Dashboard</a></li>
                            <li class="pt-2"><a href="sales-mgmt.php" class="has-background-grey-light has-text-white nice">Sales Management</a></li>
                        </ul>
                        <hr>
                        <p class="menu-label has-text-white">Storage</p>
                        <ul class="menu-list">
                            <li class="pt-2">
                                <a href="inventory.php" class="has-background-grey-light has-text-white nice">Inventory</a>
                                <ul>
                                    <li class="py-2"><a href="#" class="has-background-primary has-text-white">Product</a></li>
                                    <li class="py-2"><a href="category.php" class="has-background-grey-light has-text-white nice">Category</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="pt-2"><a href="report.php" class="has-background-grey-light has-text-white nice">Report</a></li>
                        </ul>
                        <hr>
                        <p class="menu-label has-text-white">Account</p>
                        <ul class="menu-list">
                            <li class="pb-2"><a href="settings.php" class="has-background-grey-light has-text-white nice">Settings</a></li>
                            <li class="py-2"><a class="has-background-grey-light has-text-white nice" onclick="logout()">Logout</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="column is-10">
                    <h1 class="title has-text-white">Product</h1>
                    <div class="columns">
                        <div class="column is-12">
                            <div class="box">
                                <div class="field">
                                    <p class="control">
                                        <input v-model="searchQuery" class="input" type="text" placeholder="Search item...">
                                    </p>
                                </div>
                                <div class="scrollable-table">
                                    <div class="table">
                                        <table class="table is-fullwidth">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Supplier</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="product in filteredProducts" :key="product.product_id">
                                                    <td class="has-text-weight-semibold">{{ product.product_id }}</td>
                                                    <td><img :src="product.img_path" alt="Product Image" width="50"></td>
                                                    <td>{{ product.name }}</td>
                                                    <td>{{ product.category_name }}</td>
                                                    <td>{{ product.supplier_name }}</td>
                                                    <td>{{ product.quantity }}</td>
                                                    <td>{{ product.price }}</td>
                                                    <td>
                                                        <div class="buttons are-small">
                                                            <button class="button is-small is-success is-light is-responsive">Update</button>
                                                            <button class="button is-small is-danger is-light is-responsive">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        Vue.createApp({
            data() {
                return {
                    searchQuery: "",
                    products: []
                };
            },
            created() {
                this.fetchProducts();
            },
            methods: {
                fetchProducts() {
                    axios
                        .get("../includes/api/admin/searchProduct.php")
                        .then((response) => {
                            this.products = response.data.map((product) => ({
                                ...product,
                                price: parseFloat(product.price) // Ensure price is a number
                            }));
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                searchProduct() {
                    axios
                        .get("../includes/api/admin/searchProduct.php", {
                            params: {
                                searchTerm: this.searchQuery,
                            },
                        })
                        .then((response) => {
                            this.products = response.data.map((product) => ({
                                ...product,
                                price: parseFloat(product.price) // Ensure price is a number
                            }));
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
            watch: {
                searchQuery() {
                    this.searchProduct();
                }
            },
            computed: {
                filteredProducts() {
                    if (this.searchQuery) {
                        return this.products.filter(product =>
                            product.product_id.toString().includes(this.searchQuery) ||
                            product.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            product.category_name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            product.supplier_name.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );
                    } else {
                        return this.products;
                    }
                }
            }
        }).mount("#app");
    </script>
</body>

</html>