<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="assets/css/bulma.css">
    <style>
        html,
        body,
        .full-height {
            height: 100%;
        }

        body {
            background-color: #383736;
        }
    </style>
</head>

<body>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-4">
                    <form class="box">
                        <div class="field">
                            <label class="label">Login</label>
                            <div class="control">
                                <input class="input" type="email" placeholder="Username" />
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input" type="password" placeholder="Password" />
                            </div>
                        </div>

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
    </section>
</body>

</html>