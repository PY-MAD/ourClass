
let liCheck = document.querySelectorAll("aside div")
liCheck.forEach((item) => {
    item.addEventListener("click", () => {
        let id = item.id;
        let sectionId = document.getElementById(`section${id}`);
        liCheck.forEach((check) => {
            let holdId = check.id;
            let sectionId = document.getElementById(`section${check.id}`);

            if (holdId == id) {
                check.classList.add("active-li", "active");
                sectionId = document.getElementById(`section${check.id}`);
                sectionId.classList.add("active-Section");
                sectionId.classList.remove("unactive-Section");
            } else {
                check.classList.remove("active-li", "active");
                sectionId.classList.add("unactive-Section");
                sectionId.classList.remove("active-Section");
            }
        })

    })
});