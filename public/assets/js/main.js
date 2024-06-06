// Path: public_html/public/index.php
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

// Path: public_html/public/cashier/index.php
document.addEventListener('DOMContentLoaded', (event) => {
    const modalLink = document.querySelector('#modal');
    const cancelButton = document.querySelector('.modal-card-foot .button');
    const closeButton = document.querySelector('.modal-card-head .delete');
    const modal = document.querySelector('#accModal');

    const closeModal = () => {
        modal.classList.remove('is-active');
    };

    const openModal = () => {
        modal.classList.add('is-active');

        const accountLink = document.getElementById('account');
        const notificationsLink = document.getElementById('notifications');
        const column = document.querySelector('.column.is-8');

        accountLink.addEventListener('click', function (event) {
            accountLink.classList.add('is-active', 'py-4');
            notificationsLink.classList.remove('is-active', 'py-4');
            event.preventDefault();
            column.innerHTML = `
                    <h5 class="title is-5">Account Information</h5>
                    <form method="POST">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="First Name" name="fname" value="Juan" required>
                                <input class="input mt-1" type="text" placeholder="Last Name" name="lname" value="Dela Cruz" required>
                            </div>
                        </div>
                        <div class="field is-grouped is-grouped-right">
                            <p class="control">
                                <button class="button is-primary">
                                    Save
                                </button>
                            </p>
                        </div>
                    </form>

                    <form method="POST">
                        <div class="field">
                            <label class="label">Change Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Old Password" name="oldpass" required>
                                <input class="input mt-1" type="password" placeholder="New Password" name="newpass" required>
                            </div>
                        </div>
                        <div class="field is-grouped is-grouped-right">
                            <p class="control">
                                <button class="button is-primary">
                                    Submit
                                </button>
                            </p>
                        </div>
                    </form>
                `;
        });

        notificationsLink.addEventListener('click', function (event) {
            accountLink.classList.remove('is-active', 'py-4');
            notificationsLink.classList.add('is-active', 'py-4');
            event.preventDefault();
            column.innerHTML = `
                    <div class="notification is-success">
                        New stock of <strong>product_name</strong> has arrived.
                    </div>
                    <div class="notification is-danger">
                        No stock <strong>product_name</strong>
                    </div>
                    <div class="notification is-warning">
                        Low stock <strong>product_name</strong>
                    </div>
                `;
        });
    };

    modalLink.addEventListener('click', openModal);
    cancelButton.addEventListener('click', closeModal);
    closeButton.addEventListener('click', closeModal);
});

function logout() {
    var confirmation = confirm("Are you sure you want to log out?");
    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../includes/logout.php", true);
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                window.location.href = "../?logout=success";
            }
        }
        xhr.send();
    }
}