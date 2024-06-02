<?php
session_start();
include ("../src/includes/db.php");

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
            <div class="column is-4">
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
                        <p class="help has-text-centered"><u>Forget Password?</u></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>