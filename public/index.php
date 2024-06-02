<?php
session_start();
include ("./includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header('location: /admin');
            } else if ($user['role'] == 'cashier') {
                header('location: /cashier');
            }

        } else {
            $error = "Invalid username or password.";
        }

    } else {
        $error = "Please fill in both fields.";
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoodShot - POS</title>
    <link rel="stylesheet" href="assets/css/bulma.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="columns is-centered centerall">
            <div class="column is-4 mx-6">
                <form class="box" method="POST" action="">
                    <div class="field">
                        <label class="label">Login</label>
                        <div class="control">
                            <input class="input" placeholder="Username" name="username" required />
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <input class="input" type="password" placeholder="Password" name="password" required />
                        </div>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="notification is-danger is-light">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-primary is-rounded">Login</button>
                        </div>
                        <p id="forgetPassword" class="help has-text-centered"><u>Forgot Password?</u></p>
                        <div id="passwordModal" class="modal">
                            <div class="modal-background"></div>
                            <div class="modal-card">
                                <header class="modal-card-head  mx-6">
                                    <p class="modal-card-title">Forgot Password</p>
                                </header>
                                <section class="modal-card-body  mx-6">
                                    <p class="has-text-centered">Contact your system administrator.</p>
                                </section>
                                <footer class="modal-card-foot has-text-centered  mx-6">
                                    <button class="button is-primary is-centered">Cancel</button>
                                </footer>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const forgetPasswordLink = document.querySelector('#forgetPassword');
            const cancelButton = document.querySelector('.modal-card-foot .button');
            const closeButton = document.querySelector('.modal-card-head .delete');
            const modal = document.querySelector('#passwordModal');

            const closeModal = () => {
                modal.classList.remove('is-active');
            };

            const openModal = () => {
                modal.classList.add('is-active');
            };

            forgetPasswordLink.addEventListener('click', openModal);
            cancelButton.addEventListener('click', closeModal);
            closeButton.addEventListener('click', closeModal);
        });
    </script>
</body>

</html>