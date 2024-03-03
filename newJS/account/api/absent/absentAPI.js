export function absentApi(allowAbsent,TimesAbsent,user_email,code_subject) {
    let http = new XMLHttpRequest();
    let url = "http://localhost/ourClass/newJS/account/api/absent/absent.php";
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Methods", "POST");
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            console.log(http.responseText);
        }
    }

    http.send(`user_email=${user_email}&code_subject=${code_subject}&allowAbsent=${allowAbsent}&timeAbsent=${TimesAbsent}`);
}

