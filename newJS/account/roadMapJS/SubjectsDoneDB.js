import { insertSubjectDone,RemoveSubjectDone } from "../api/APIroadMap/APICheckData.js";
import {getEmailUser} from "../getEmail/getEmail.js";
export function addToDB(item){
    let boxContent = item.children;
    let code = boxContent[1].textContent;
    code = code.trim();
    insertSubjectDone(code,getEmailUser());
}
export function RemoveFromDB(item){
    let boxContent = item.children;
    let code = boxContent[1].textContent;
    code = code.trim();
    RemoveSubjectDone(code,getEmailUser());
}