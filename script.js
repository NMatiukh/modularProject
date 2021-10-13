
let containerSignUp = document.getElementById("containerSignUp");
let containerSignIn = document.getElementById("containerSignIn");
let signs = document.getElementById("signs");
let profile = document.getElementById("profile");
let addCompany = document.getElementById("addCompany");
let myCompanies = document.getElementById("myCompanies");
let company = document.getElementById("company");
let activeCompany;

function showSignUp() {
    containerSignIn.classList.add("display-none")
    containerSignUp.classList.remove("display-none")
    showWindow(signs, containerSignUp);
}

function showSignIn() {
    containerSignUp.classList.add("display-none")
    containerSignIn.classList.remove("display-none")
    showWindow(signs, containerSignIn);
}


function displayNone() {
    signs.classList.add("display-none");
}


function showWindow(mainWindow, containerSign) {
    mainWindow.style.display = "block";
    if (mainWindow.style.display === "block") {
        document.body.style.cssText = "overflow: hidden"
        if (containerSign !== undefined){
            containerSign.getElementsByTagName("input")[0].focus();
        }

    }
    mainWindow.onkeydown = function (event) {
        if (event.key === "Escape") {
            document.body.style.cssText = "overflow: visible"
            mainWindow.style.display = "none";
        }
    }
}

function exiting(mainWindow) {
    document.body.style.cssText = "overflow: visible"
    mainWindow.style.display = "none";
}

let changeProfileStatus = false;
function changeProfile() {
    let formChangeProfile = document.getElementById("changeProfile");
    for (let i = 0; i < formChangeProfile.getElementsByTagName('input').length; i++) {
        formChangeProfile.getElementsByTagName('input')[i].removeAttribute("readonly");
    }
    for (let i = 0; i <  formChangeProfile.getElementsByTagName('textarea').length; i++) {
        formChangeProfile.getElementsByTagName('textarea')[i].removeAttribute("readonly");
    }
    changeProfileStatus = true;
    if (changeProfileStatus === true){
        formChangeProfile.children.namedItem("submit").classList.remove("display-none");
        document.getElementById('editProfile').classList.add("display-none");
    }
}
function cancelChangeProfile() {
    let formChangeProfile = document.getElementById("changeProfile");
    for (let i = 0; i < formChangeProfile.getElementsByTagName('input').length; i++) {
        formChangeProfile.getElementsByTagName('input')[i].setAttribute("readonly", true)
    }
    for (let i = 0; i <  formChangeProfile.getElementsByTagName('textarea').length; i++) {
        formChangeProfile.getElementsByTagName('textarea')[i].setAttribute("readonly", true);
    }
    changeProfileStatus = false;
    if (changeProfileStatus === false){
        formChangeProfile.children.namedItem("submit").classList.add("display-none");
        document.getElementById('editProfile').classList.remove("display-none");
    }
}

function show(id) {
    activeCompany = id;
    for (let i = 0; i < company.getElementsByClassName("container").length; i++) {
        if (company.getElementsByClassName("container")[i].id===id){
            company.getElementsByClassName("container")[i].classList.remove("display-none")
        }
        if (company.getElementsByClassName("container")[i].id !== id){
            company.getElementsByClassName("container")[i].classList.add("display-none")
        }
    }

}
let changeCompanyStatus = false;
function changeCompany() {
    let formChangeCompany = document.getElementById("changeCompany"+parseInt(activeCompany.replace(/\D+/g,"")));
    for (let i = 0; i < formChangeCompany.getElementsByTagName('input').length; i++) {
        formChangeCompany.getElementsByTagName('input')[i].removeAttribute("readonly");
    }
    for (let i = 0; i <  formChangeCompany.getElementsByTagName('textarea').length; i++) {
        formChangeCompany.getElementsByTagName('textarea')[i].removeAttribute("readonly");
    }
    changeCompanyStatus = true;
    if (changeCompanyStatus === true){
        formChangeCompany.children.namedItem("submit").classList.remove("display-none");
        document.getElementById('editCompany'+parseInt(activeCompany.replace(/\D+/g,""))).classList.add("display-none");
    }
}
