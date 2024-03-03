export function insertSubjectDone(code_subject , user_email){
    let http = new XMLHttpRequest();
    let  url = "http://localhost/ourClass/newJS/account/api/APIroadMap/addDataDone.php";
    http.open('POST',url,true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.setRequestHeader("Access-Control-Allow-Origin","*")
    http.setRequestHeader("Access-Control-Allow-Methods", "POST");
    http.onreadystatechange = function(){
        if(http.readyState == 4 && http.status == 200){
            let response = http.responseText;
            console.log(response);
        }
    }
    http.send(`code=${code_subject}&email=${user_email}`);
}
export function insertSubjectCurrent(code_subject , user_email){
    let http = new XMLHttpRequest();
    let  url = "http://localhost/ourClass/newJS/account/api/APIroadMap/addDataCurrent.php";
    http.open('POST',url,true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.setRequestHeader("Access-Control-Allow-Origin","*")
    http.setRequestHeader("Access-Control-Allow-Methods", "POST");
    http.onreadystatechange = function(){
        if(http.readyState == 4 && http.status == 200){
            let response = http.responseText;
            console.log(response);
        }
    }
    http.send(`code=${code_subject}&email=${user_email}`);
}
export function RemoveSubjectCurrent(code_subject , user_email){
    let http = new XMLHttpRequest();
    let  url = "http://localhost/ourClass/newJS/account/api/APIroadMap/RemoveDataCurrent.php";
    http.open('POST',url,true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.setRequestHeader("Access-Control-Allow-Origin","*")
    http.setRequestHeader("Access-Control-Allow-Methods", "POST");
    http.onreadystatechange = function(){
        if(http.readyState == 4 && http.status == 200){
            let response = http.responseText;
            console.log(response);
        }
    }
    http.send(`code=${code_subject}&email=${user_email}`);
}
export function RemoveSubjectDone(code_subject , user_email){
    let http = new XMLHttpRequest();
    let  url = "http://localhost/ourClass/newJS/account/api/APIroadMap/RemoveDataDone.php";
    http.open('POST',url,true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.setRequestHeader("Access-Control-Allow-Origin","*")
    http.setRequestHeader("Access-Control-Allow-Methods", "POST");
    http.onreadystatechange = function(){
        if(http.readyState == 4 && http.status == 200){
            let response = http.responseText;
            console.log(response);
        }
    }
    http.send(`code=${code_subject}&email=${user_email}`);
}