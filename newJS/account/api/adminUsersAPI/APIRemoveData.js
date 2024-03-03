import { deleteSuccess } from '../../../alertJS/alerts.js';

function deleteUser(email) {
    let http = new XMLHttpRequest();
    let url = "http://localhost/ourClass/newJS/account/api/adminUsersAPI/removeAdmins.php";
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Methods", "POST");
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            if (http.responseText == "delete is done") {
                deleteSuccess();
            }
        }
    }

    http.send(`email=${email}`);
}

let btnDeleteAdmin = document.querySelectorAll(".btn-delete-admin");
btnDeleteAdmin.forEach((item) => {
    item.addEventListener("click", () => {
        deleteUser(item.id);
    });
});