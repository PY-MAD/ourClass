import {absentApi} from "../api/absent/absentAPI.js";
import {getEmailUser} from "../getEmail/getEmail.js";
let plus_absent = document.querySelectorAll(".button-pulse");
let mins_absent = document.querySelectorAll(".button-mines");

function increaseAbsent(allowAbsent , absentTime){
    let calcAllowAbsent = parseInt(allowAbsent.textContent) - 1;
    let calcAbsentTime = parseInt(absentTime.textContent) + 1;
    if(allowAbsent.textContent != 0){
        calcAbsentTime-=1;
        calcAbsentTime+=1;
        allowAbsent.textContent = calcAllowAbsent;
        absentTime.textContent = calcAbsentTime; 
    }

}
function decreaseAbsent(allowAbsent , absentTime){
    let calcAllowAbsent = parseInt(allowAbsent.textContent) + 1;
    let calcAbsentTime = parseInt(absentTime.textContent) - 1;
    if(absentTime.textContent != 0){
        calcAbsentTime+=1;
        calcAbsentTime-=1;
        allowAbsent.textContent = calcAllowAbsent;
        absentTime.textContent = calcAbsentTime;
    }

}
let email_user = getEmailUser();
plus_absent.forEach((item)=>{
    item.addEventListener("click",()=>{
        let codeOfSubject = item.id;
        let allowAbsent = document.getElementById(`${codeOfSubject}-absent`);
        let absentTime = document.getElementById(`${codeOfSubject}-accessAbsent`);
        increaseAbsent(allowAbsent, absentTime);
        absentApi(allowAbsent.textContent , absentTime.textContent , email_user, codeOfSubject);
    })
})
mins_absent.forEach((item)=>{
    item.addEventListener("click",()=>{
        let codeOfSubject = item.id;
        let allowAbsent = document.getElementById(`${codeOfSubject}-absent`);
        let absentTime = document.getElementById(`${codeOfSubject}-accessAbsent`);
        decreaseAbsent(allowAbsent,absentTime);
        absentApi(allowAbsent.textContent , absentTime.textContent , email_user, codeOfSubject);
    })
})