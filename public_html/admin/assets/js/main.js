function logout() {
  var confirmation = confirm("Are you sure you want to log out?");
  if (confirmation) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/auth/logout.php", true);
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        window.location.href = "../?logout=success";
      }
    };
    xhr.send();
  }
}
