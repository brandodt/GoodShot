<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    $_SESSION["error"] = "Unauthorized access. Please login first.";
    header("location: ../index.php");
    exit;
}
?>
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
                                <button class="button is-primary" onclick="openAddCategoryModal()"><span class="icon"><i
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
                                        <tbody id="category-table-body">
                                            <!-- Category rows will be inserted here dynamically -->
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
        <div class="modal" id="addCategoryModal">
            <div class="modal-background" onclick="closeAddCategoryModal()"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Add Category</p>
                    <button class="delete" aria-label="close" onclick="closeAddCategoryModal()"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Category Name</label>
                        <div class="control">
                            <input class="input" type="text" id="newCategoryName">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" onclick="addCategory()">Save</button>
                    <button class="button" onclick="closeAddCategoryModal()">Cancel</button>
                </footer>
            </div>
        </div>

        <!-- Update Category Modal -->
        <div class="modal" id="updateCategoryModal">
            <div class="modal-background" onclick="closeUpdateCategoryModal()"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Category</p>
                    <button class="delete" aria-label="close" onclick="closeUpdateCategoryModal()"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Category Name</label>
                        <div class="control">
                            <input class="input" type="text" id="currentCategoryName">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" onclick="updateCategory()">Save changes</button>
                    <button class="button" onclick="closeUpdateCategoryModal()">Cancel</button>
                </footer>
            </div>
        </div>
    </div>

    <script>
        let categories = [];
        let totalItems = {};
        let currentCategory = {};

        document.addEventListener('DOMContentLoaded', function () {
            fetchCategories();
        });

        function fetchCategories() {
            fetch('../includes/api/admin/fetchCategories.php')
                .then(response => response.json())
                .then(data => {
                    categories = data;
                    fetchTotalItems();
                })
                .catch(error => console.error('Error fetching categories:', error));
        }

        function fetchTotalItems() {
            fetch('../includes/api/admin/fetchTotalItems.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        totalItems = data.data;
                        renderCategories();
                    } else {
                        console.error('Error fetching total items:', data.message);
                    }
                })
                .catch(error => console.error('Error fetching total items:', error));
        }

        function renderCategories() {
            const tbody = document.getElementById('category-table-body');
            tbody.innerHTML = '';
            categories.forEach(category => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="has-text-weight-semibold">${category.category_id}</td>
                    <td>${category.category_name}</td>
                    <td>${totalItems[category.category_id] || 0}</td>
                    <td>
                        <div class="buttons are-small">
                            <button class="button is-small is-success is-light is-responsive" onclick="openUpdateCategoryModal(${category.category_id})">Update</button>
                            <button class="button is-small is-danger is-light is-responsive" onclick="deleteCategory(${category.category_id})">Delete</button>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        function openAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.add('is-active');
        }

        function closeAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.remove('is-active');
            document.getElementById('newCategoryName').value = '';
        }

        function addCategory() {
            const newCategoryName = document.getElementById('newCategoryName').value;
            fetch('../includes/api/admin/addCategory.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ category_name: newCategoryName })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        fetchCategories();
                        closeAddCategoryModal();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error adding category:', error));
        }

        function openUpdateCategoryModal(category_id) {
            currentCategory = categories.find(category => category.category_id === category_id);
            document.getElementById('currentCategoryName').value = currentCategory.category_name;
            document.getElementById('updateCategoryModal').classList.add('is-active');
        }

        function closeUpdateCategoryModal() {
            document.getElementById('updateCategoryModal').classList.remove('is-active');
            document.getElementById('currentCategoryName').value = '';
            currentCategory = {};
        }

        function updateCategory() {
            currentCategory.category_name = document.getElementById('currentCategoryName').value;
            fetch('../includes/api/admin/updateCategory.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(currentCategory)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        fetchCategories();
                        closeUpdateCategoryModal();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error updating category:', error));
        }

        function deleteCategory(category_id) {
            if (confirm('Are you sure you want to delete this category?')) {
                fetch('../includes/api/admin/deleteCategory.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ category_id })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            fetchCategories();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error deleting category:', error));
            }
        }
    </script>
</body>

</html>