export function addSubjectsInCurrentLevel(subjects, code, hours) {
    code = code.trim();
    let currentLevelSection = document.getElementById("current_level");
    let cardBuild = `
    <div class="position-relative" id="current-${code}">
        <div class="subjects_box d-flex flex-column active_orange 2">
            <span class="pd-top-bottom">
                ${subjects}
            </span>
            <span>
                ${code}
            </span>
            <span class="pd-bottom">
                ${hours}
            </span>
        </div>
    </div>
    `;
    return currentLevelSection.innerHTML += cardBuild;
}
export function removeSubjectsInCurrentLevel(code) {
    code = code.trim();
    let removeBox = document.getElementById(`current-${code}`);
    console.log(removeBox);
    let currentLevelSection = document.getElementById("current_level");
    console.log(currentLevelSection);
    currentLevelSection.removeChild(removeBox);
}