function updateTransactionDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
    var month = monthNames[now.getMonth()];
    var year = now.getFullYear();
    var hours = ("0" + now.getHours()).slice(-2);
    var minutes = ("0" + now.getMinutes()).slice(-2);
    var seconds = ("0" + now.getSeconds()).slice(-2);
    document.getElementById('transaction-date').textContent = month + " " + day + ", " + year + " " + hours + ":" + minutes;
}

updateTransactionDate();
setInterval(updateTransactionDate, 1000); // update every second