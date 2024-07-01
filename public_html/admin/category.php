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
                                    <li class="py-2"><a href="product.php"
                                            class="has-background-grey-light has-text-white nice">Product</a></li>
                                    <li class="py-2"><a href="#"
                                            class="has-background-primary has-text-white">Category</a></li>
                                </ul>
                            </li>
                            <li class="pt-2"><a href="report.php"
                                    class="has-background-grey-light has-text-white nice">Report</a></li>
                        </ul>
                        <hr>
                        <p class="menu-label has-text-white">Account</p>
                        <ul class="menu-list">
                            <li class="pb-2"><a href="settings.php"
                                    class="has-background-grey-light has-text-white nice">Settings</a></li>
                            <li class="py-2"><a class="has-background-grey-light has-text-white nice"
                                    onclick="logout()">Logout</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="column is-10">
                    <div class="columns">
                        <div class="column is-10">
                            <h3 class="title has-text-white">Category</h3>
                        </div>
                        <div class="column">
                            <div class="buttons is-right">
                                <button class="button is-primary" @click="openAddCategoryModal"><span class="icon"><i
                                            class="fas fa-plus"></i></span>
                                    <span>Add Category</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-12">
                            <div class="box">
                                <div class="scrollable-table">
                                    <table class="table is-fullwidth">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Total Items</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="category in categories" :key="category.category_id">
                                                <td class="has-text-weight-semibold">{{ category.category_id }}</td>
                                                <td>{{ category.category_name }}</td>
                                                <td>{{ totalItems[category.category_id] || 0 }}</td>
                                                <td>
                                                    <div class="buttons are-small">
                                                        <button
                                                            class="button is-small is-success is-light is-responsive"
                                                            @click="openUpdateCategoryModal(category)">Update</button>
                                                        <button
                                                            class="button is-small is-danger is-light is-responsive">Delete</button>
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

        <!-- Add Category Modal -->
        <div class="modal" :class="{ 'is-active': showAddCategoryModal }">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Add Category</p>
                    <button class="delete" aria-label="close" @click="closeAddCategoryModal"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Category Name</label>
                        <div class="control">
                            <input class="input" type="text" v-model="newCategoryName">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" @click="addCategory">Save</button>
                    <button class="button" @click="closeAddCategoryModal">Cancel</button>
                </footer>
            </div>
        </div>


        <!-- Update Category Modal -->
        <div class="modal" :class="{ 'is-active': showUpdateCategoryModal }">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Category</p>
                    <button class="delete" aria-label="close" @click="closeUpdateCategoryModal"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Category Name</label>
                        <div class="control">
                            <input class="input" type="text" v-model="currentCategory.category_name">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" @click="updateCategory">Save changes</button>
                    <button class="button" @click="closeUpdateCategoryModal">Cancel</button>
                </footer>
            </div>
        </div>
    </div>

    <script>
        Vue.createApp({
            data() {
                return {
                    searchQuery: "",
                    categories: [],
                    totalItems: {},
                    showAddCategoryModal: false,
                    showUpdateCategoryModal: false,
                    newCategoryName: "",
                    currentCategory: {
                        category_id: '',
                        category_name: ''
                    }
                };
            },
            created() {
                this.fetchCategories();
            },
            methods: {
                fetchCategories() {
                    axios
                        .get("../includes/api/admin/fetchCategories.php")
                        .then((response) => {
                            this.categories = response.data;
                            this.fetchTotalItems();
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                fetchTotalItems() {
                    axios
                        .get("../includes/api/admin/fetchTotalItems.php")
                        .then((response) => {
                            this.totalItems = response.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },
                openAddCategoryModal() {
                    this.showAddCategoryModal = true;
                },
                closeAddCategoryModal() {
                    this.showAddCategoryModal = false;
                    this.newCategoryName = "";
                },
                addCategory() {
                    axios
                        .post("../includes/api/admin/addCategory.php", { category_name: this.newCategoryName })
                        .then((response) => {
                            if (response.data.status === 'success') {
                                this.fetchCategories();
                                this.closeAddCategoryModal();
                            } else {
                                alert(response.data.message);
                            }
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            }
        }).mount('#app');
    </script>
</body>

</html>