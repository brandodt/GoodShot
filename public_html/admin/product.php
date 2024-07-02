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
                            <li class="pt-2"><a href="index.php"
                                    class="has-background-grey-light has-text-white nice">Dashboard</a></li>
                            <li class="pt-2"><a href="sales-mgmt.php"
                                    class="has-background-grey-light has-text-white nice">Sales Management</a></li>
                        </ul>
                        <hr>
                        <p class="menu-label has-text-white">Storage</p>
                        <ul class="menu-list">
                            <li class="pt-2">
                                <a href="inventory.php"
                                    class="has-background-grey-light has-text-white nice">Inventory</a>
                                <ul>
                                    <li class="py-2"><a href="#"
                                            class="has-background-primary has-text-white">Product</a></li>
                                    <li class="pt-2"><a href="report.php"
                                            class="has-background-grey-light has-text-white nice">Report</a></li>
                                    <!-- <li class="py-2"><a href="category.php"
                                            class="has-background-grey-light has-text-white nice">Category</a></li> -->
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <p class="menu-label has-text-white">Account</p>
                        <ul class="menu-list">
                            <!-- <li class="pb-2"><a href="settings.php"
                                    class="has-background-grey-light has-text-white nice">Settings</a></li> -->
                            <li class="py-2"><a class="has-background-grey-light has-text-white nice"
                                    onclick="logout()">Logout</a></li>
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
                                        <input v-model="searchQuery" class="input" type="text"
                                            placeholder="Search item...">
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
                                                <tr v-for="product in products" :key="product.product_id">
                                                    <td class="has-text-weight-semibold">{{ product.product_id }}</td>
                                                    <td><img :src="product.img_path" alt="Product Image" width="50">
                                                    </td>
                                                    <td>{{ product.name }}</td>
                                                    <td>{{ product.category_name }}</td>
                                                    <td>{{ product.supplier_name }}</td>
                                                    <td>{{ product.quantity }}</td>
                                                    <td>{{ product.price }}</td>
                                                    <td>
                                                        <div class="buttons are-small">
                                                            <button
                                                                class="button is-small is-success is-light is-responsive"
                                                                @click="openUpdateModal(product)">Update</button>
                                                            <button
                                                                class="button is-small is-danger is-light is-responsive"
                                                                @click="deleteProduct(product.product_id)">Delete</button>
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

        <!-- Update Modal -->
        <div class="modal" :class="{ 'is-active': showModal }">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Product</p>
                    <button class="delete" aria-label="close" @click="closeModal"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Product Name</label>
                        <div class="control">
                            <input class="input" type="text" v-model="currentProduct.name">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Category</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select v-model="currentProduct.category_id">
                                    <option v-for="category in categories" :key="category.category_id"
                                        :value="category.category_id">{{ category.category_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Supplier</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select v-model="currentProduct.supplier_id">
                                    <option v-for="supplier in suppliers" :key="supplier.supplier_id"
                                        :value="supplier.supplier_id">{{ supplier.supplier_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Quantity</label>
                        <div class="control">
                            <input class="input" type="number" v-model="currentProduct.quantity">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Price</label>
                        <div class="control">
                            <input class="input" type="number" v-model="currentProduct.price">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" @click="updateProduct">Save changes</button>
                    <button class="button" @click="closeModal">Cancel</button>
                </footer>
            </div>
        </div>
    </div>

    <script>
        Vue.createApp({
            data() {
                return {
                    searchQuery: "",
                    products: [],
                    categories: [],
                    suppliers: [],
                    showModal: false,
                    currentProduct: {
                        product_id: '',
                        name: '',
                        category_id: '',
                        supplier_id: '',
                        quantity: 0,
                        price: 0
                    }
                };
            },
            created() {
                this.fetchProducts();
                this.fetchCategories();
                this.fetchSuppliers();
            },
            watch: {
                searchQuery() {
                    this.fetchProducts();
                }
            },
            methods: {
                fetchProducts() {
                    axios
                        .get("../includes/api/admin/searchProduct.php", {
                            params: { searchTerm: this.searchQuery }
                        })
                        .then((response) => {
                            this.products = response.data.map((product) => ({
                                ...product,
                                price: parseFloat(product.price)
                            }));
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                fetchCategories() {
                    axios
                        .get("../includes/api/admin/fetchCategories.php")
                        .then((response) => {
                            this.categories = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                fetchSuppliers() {
                    axios
                        .get("../includes/api/admin/fetchSuppliers.php")
                        .then((response) => {
                            this.suppliers = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                openUpdateModal(product) {
                    this.currentProduct = { ...product };
                    this.showModal = true;
                },
                closeModal() {
                    this.showModal = false;
                },
                updateProduct() {
                    // Logic for updating the product
                    this.closeModal();
                },
                deleteProduct(productId) {
                    // Logic for deleting the product
                }
            }
        }).mount('#app');
    </script>
</body>

</html>