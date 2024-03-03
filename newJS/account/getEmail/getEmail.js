export function getEmailUser(){
    let getEmailUser= document.querySelector(".data-detail .email");
    let email = editEmail(getEmailUser.textContent);
    return email;
}
function editEmail(email){
    let find = ":"
    let search = email.search(find)
    let newEmail = email.slice(search+2)
    return newEmail;
}