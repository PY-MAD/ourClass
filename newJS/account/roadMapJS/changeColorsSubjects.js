import { addSubjectsInCurrentLevel, removeSubjectsInCurrentLevel } from "../roadMapJS/cardBuildInCurrentLevel.js";
import { addToDB,RemoveFromDB } from "./SubjectsDoneDB.js";
import { addToCurrentDB,RemoveFromCurrentDB } from "./SubjectsCurrentDB.js";

function increaseHours(hour){
    let fixHour = parseInt(hour);
    let totalHourDone = document.getElementById("total-hours-done")
    return totalHourDone.innerHTML = Number(totalHourDone.textContent) + Number(fixHour)
}
function decreaseHours(hour){
    let totalHourDone = document.getElementById("total-hours-done")
    let fixHour = parseInt(hour);
    totalHourDone.innerHTML = Number(totalHourDone.textContent) - Number(fixHour)
}
function changeToOrange(item){
    item.classList.remove("active_green");
    item.classList.add("active_orange");
    RemoveFromDB(item);
}
export function changeToGreen(item){
    item.classList.remove("active_red");
    item.classList.add("active_green");
    destroyCardInCurrent(item);
    addToDB(item);
    RemoveFromCurrentDB(item);
}

function changeToRed(item){
    item.classList.remove("active_orange");
    item.classList.add("active_red");
    buildCardInCurrent(item);
    addToCurrentDB(item);
}
function setGreen(item){
    item.classList.remove("active_orange");
    item.classList.add("active_green");
    addToDB(item);
}
function setOrange(item){
    item.classList.remove("active_green");
    item.classList.add("active_orange");
    RemoveFromDB(item);
}
function buildCardInCurrent(item){
    let boxContent = item.children;
    let sub = boxContent[0].textContent;
    let code = boxContent[1].textContent;
    let hour = boxContent[2].textContent;
    addSubjectsInCurrentLevel(sub , code , hour);
}
function destroyCardInCurrent(item){
    let boxContent = item.children;
    let code = boxContent[1].textContent;
    removeSubjectsInCurrentLevel(code);
}

let lv = document.querySelectorAll(`.level div`);
lv.forEach((item) => {
    if(item.classList.contains("active_green")){
        let box = item.children
        let hour = box[2].textContent;
        increaseHours(hour);
    }
    item.addEventListener("click", () => {
        if (item.classList.contains("subjects_box")) {
            let box = item.children
            let hour = box[2].textContent;
            if (item.classList.contains("active_green")) {
                changeToOrange(item);
                decreaseHours(hour);
            }
            else if (item.classList.contains("active_red")) {
                changeToGreen(item);
                increaseHours(hour);
            }
            else if (item.classList.contains("active_orange")) {
                changeToRed(item);
            }
        }
    })

})
let levelBoxes = document.querySelectorAll(".level_box");

levelBoxes.forEach((item)=>{
    item.addEventListener("click",()=>{
        let idBox = item.id;
        let getBoxSubjects = document.querySelectorAll(`.${idBox}`);
        getBoxSubjects.forEach((itemBox)=>{
            let box = itemBox.children
            let hour = box[2].textContent;
            if(itemBox.classList.contains("active_green")){
                setOrange(itemBox);
                decreaseHours(hour);
            }else if(itemBox.classList.contains("active_orange")){
                setGreen(itemBox);
                increaseHours(hour);
            }
        })
    })
})