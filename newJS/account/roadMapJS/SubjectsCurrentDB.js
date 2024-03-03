import { insertSubjectCurrent,RemoveSubjectCurrent } from "../api/APIroadMap/APICheckData.js";
import {getEmailUser} from "../getEmail/getEmail.js";
export function addToCurrentDB(item){
    let boxContent = item.children;
    let code = boxContent[1].textContent;
    code = code.trim();
    insertSubjectCurrent(code,getEmailUser());
}
export function RemoveFromCurrentDB(item){
    let boxContent = item.children;
    let code = boxContent[1].textContent;
    code = code.trim();
    RemoveSubjectCurrent(code,getEmailUser());
}