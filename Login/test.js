let subBtn = document.getElementById("subBtSignUp")

let inpPrenom = document.getElementById("inpPrenom")
let PrenomError = document.getElementById("PrenomError")

let inpNom = document.getElementById("inpNom")
let NomError = document.getElementById("NomError")

let inpEmail = document.getElementById("inpEmail")
let EmailError = document.getElementById("EmailError")

let inpPassword = document.getElementById("inpPassword")
let PasswordError = document.getElementById("PasswordError")

let inpEnterPassw = document.getElementById("inpEnterPassw")
let EnterPasswordError = document.getElementById("EnterPasswordError")

let inpNumber = document.getElementById("inpNumber")
let NumberError = document.getElementById("NumberError")

let regexemail = new RegExp('^[a-zA-Z0-9.-]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{3,}$','g')
let regexpassw = new RegExp('^[a-zA-Z0-9.-]+[0-9.-_#$%]')
let regeNom = /^[a-zA-Z-\s]+$/;
let regePhone = /(05|06|07)\d{8}$/;



//  onfocus
inpPrenom.onfocus = function () {
    if(inpPrenom.value.length == 0){
        inpPrenom.style ="border-bottom: 2px solid #00C2FF"
        inpPrenom.style.color ="#00C2FF"
        PrenomError.innerHTML ="<p style='color:#7D7D7D'>Prenom is greater than 2 letters</p><p style='color:#7D7D7D'>Enter the prenom without numbers</p>"
    }
}
inpNom.onfocus = function () {
    if(inpNom.value.length == 0){
        inpNom.style ="border-bottom: 2px solid #00C2FF"
        inpNom.style.color ="#00C2FF"
        NomError.innerHTML ="<p style='color:#7D7D7D'>Nom is greater than 2 letters</p><p style='color:#7D7D7D'>Enter the nom without numbers</p>"
    }
}
inpEmail.onfocus = function () {
    if(inpEmail.value.length == 0){
        inpEmail.style ="border-bottom: 2px solid #00C2FF"
        inpEmail.style.color ="#00C2FF"
    }
}
inpPassword.onfocus = function () {
    if(inpPassword.value.length == 0){
        inpPassword.style ="border-bottom: 2px solid #00C2FF"
        PasswordError.innerHTML =  "<p style='color:#7D7D7D'>Password greater than 8 characters</p> <p style='color:#7D7D7D'>Password Pssword consisting of number and letters</p>"
        inpPassword.style.color ="#00C2FF"
    }
}
inpEnterPassw.onfocus = function () {
    if(inpEnterPassw.value.length == 0){
        inpEnterPassw.style ="border-bottom: 2px solid #00C2FF"
        EnterPasswordError.innerHTML ="<p style='color:#7D7D7D'>Retype password</p>"
        inpEnterPassw.style.color ="#00C2FF"
    }
}
inpNumber.onfocus = function () {
    if(inpNumber.value.length == 0){
        inpNumber.style ="border-bottom: 2px solid #00C2FF"
        inpNumber.style.color ="#00C2FF"
    }
}



// onblur
inpPrenom.onblur = function () {
    if(inpPrenom.value.length == 0){
        inpPrenom.style ="border-bottom: 2px solid #7D7D7D"
        PrenomError.innerHTML = ""
    }
}
inpNom.onblur = function () {
    if(inpNom.value.length == 0){
        inpNom.style ="border-bottom: 2px solid #7D7D7D"
        NomError.innerHTML = ""
    }
}
inpEmail.onblur = function () {
    if(inpEmail.value.length == 0){
        inpEmail.style ="border-bottom: 2px solid #7D7D7D"
    }
}
inpPassword.onblur = function () {
    if(inpPassword.value.length == 0){
        inpPassword.style ="border-bottom: 2px solid #7D7D7D"
        PasswordError.innerHTML=""
    }
}
inpEnterPassw.onblur = function () {
    if(inpEnterPassw.value.length == 0){
        inpEnterPassw.style ="border-bottom: 2px solid #7D7D7D"
        EnterPasswordError.innerHTML=""
    }
}
inpNumber.onblur = function () {
    if(inpNumber.value.length == 0){
        inpNumber.style ="border-bottom: 2px solid #7D7D7D"
    }
}



// oninput
inpPrenom.oninput = function () {
    if(inpPrenom.value.length >= 2 && regeNom.test(inpPrenom.value) === true ){
        inpPrenom.style='border-bottom: 2px solid #15AAD9'
        PrenomError.innerHTML = "<p><i class='fa-solid fa-check'></i> Prenom valide</p>"
        PrenomError.style.color='#15AAD9'
        inpPrenom.style.color ="#15AAD9"
    }else if (inpPrenom.value.length >= 2) {
        PrenomError.innerHTML ="<p style='color:#15AAD9'><i class='fa-solid fa-check'></i> Prenom is greater than 2 letters</p> <p style='color: red'><i class='fa-solid fa-xmark'></i> Enter the prenom without numbers</p>"
        inpPrenom.style='border-bottom: 2px solid red'
        inpPrenom.style.color ="red"
    }else {
        PrenomError.innerHTML ="<p><i class='fa-solid fa-xmark'></i> Prenom is greater than 2 letters</p> <p><i class='fa-solid fa-xmark'></i> Enter the prenom without numbers</p>"
        inpPrenom.style='border-bottom: 2px solid red'
        PrenomError.style.color='red'
        inpPrenom.style.color ="red"
    }
}


inpNom.oninput = function () {
    if(inpNom.value.length >= 2 && regeNom.test(inpNom.value) === true ){
        inpNom.style='border-bottom: 2px solid #15AAD9'
        NomError.innerHTML = "<p><i class='fa-solid fa-check'></i> Nom valide</p>"
        NomError.style.color='#15AAD9'
        inpNom.style.color ="#15AAD9"
    }else if (inpNom.value.length >= 2) {
        NomError.innerHTML ="<p style='color:#15AAD9'><i class='fa-solid fa-check'></i> nom is greater than 2 letters</p> <p style='color: red'><i class='fa-solid fa-xmark'></i>Enter the nom without numbers</p>"
        inpNom.style='border-bottom: 2px solid red'
        inpNom.style.color ="red"
    }else {
        NomError.innerHTML ="<p><i class='fa-solid fa-xmark'></i> Nom is greater than 2 letters</p> <p><i class='fa-solid fa-xmark'></i> Enter the nom without numbers</p>"
        inpNom.style='border-bottom: 2px solid red'
        NomError.style.color='red'
        inpNom.style.color ="red"
    }
}

inpEmail.oninput = function () {
    if(regexemail.test(inpEmail.value) === true ){
        inpEmail.style='border-bottom: 2px solid #15AAD9'
        EmailError.innerHTML = "<p><i class='fa-solid fa-check'></i> Email valide</p>"
        EmailError.style.color='#15AAD9'
        inpEmail.style.color ="#15AAD9"
    }else{
        EmailError.innerHTML = "<p><i class='fa-solid fa-xmark'></i> Email no valide</p>"
        inpEmail.style='border-bottom: 2px solid red';
        EmailError.style.color='red'
        inpEmail.style.color ="red"
    }
}

inpPassword.oninput = function () {
    if(inpPassword.value.length >0){
        icon1.style.display="block"
    }else{
        icon1.style.display="none"
    }
if(inpPassword.value.length >= 8 && regexpassw.test(inpPassword.value) === true){
    inpPassword.style='border-bottom: 2px solid #15AAD9';
    PasswordError.innerHTML = "<p><i class='fa-solid fa-check'></i> Password valide</p>"
    PasswordError.style.color='#15AAD9'
    inpPassword.style.color ="#15AAD9"
}else if (inpPassword.value.length >= 8){
    inpPassword.style='border-bottom: 2px solid red';
    PasswordError.innerHTML = "<p style='color:#15AAD9'><i class='fa-solid fa-check'></i> Password greater than 8 characters</p> <p style='color:red'><i class='fa-solid fa-xmark'></i> Password Pssword consisting of number and letters</p>"
    inpPassword.style.color ="red"
}else if(regexpassw.test(inpPassword.value) === true){
    inpPassword.style='border-bottom: 2px solid red';
    PasswordError.innerHTML = "<p style='color:red'><i class='fa-solid fa-xmark'></i> Password greater than 8 characters</p> <p style='color:#15AAD9'><i class='fa-solid fa-check'></i> Password Pssword consisting of number and letters</p>"
    inpPassword.style.color ="red"
}else{
    PasswordError.innerHTML = "<p><i class='fa-solid fa-xmark'></i> Password greater than 8 characters</p> <p><i class='fa-solid fa-xmark'></i> Password Pssword consisting of number and letters</p>"
    inpPassword.style='border-bottom: 2px solid red';
    PasswordError.style.color='red'
    inpPassword.style.color ="red"
}
}

inpEnterPassw.oninput = function () {
    if(inpPassword.value.length >0){
        icon2.style.display="block"
    }else{
        icon2.style.display="none"
    }
    if(inpEnterPassw.value == inpPassword.value && inpPassword.value.length >= 8 && regexpassw.test(inpPassword.value) === true){
        inpEnterPassw.style='border-bottom: 2px solid #15AAD9';
        EnterPasswordError.innerHTML = "<p><i class='fa-solid fa-check'></i> Password valide</p>"
        EnterPasswordError.style.color='#15AAD9'
        inpEnterPassw.style.color ="#15AAD9"
    }else{
        EnterPasswordError.innerHTML = "<p><i class='fa-solid fa-xmark'></i> Password no valid</p>"
        inpEnterPassw.style='border-bottom: 2px solid red';
        EnterPasswordError.style.color='red'
        inpEnterPassw.style.color ="red"
    }
}


inpNumber.oninput = function () {
    if(regePhone.test(inpNumber.value) == true){
        inpNumber.style='border-bottom: 2px solid #15AAD9';
        NumberError.innerHTML = "<p><i class='fa-solid fa-check'></i> Numer phone valide</p>"
        NumberError.style.color='#15AAD9'
        inpNumber.style.color ="#15AAD9"
    }else {
        NumberError.innerHTML = "<p><i class='fa-solid fa-xmark'></i> Numer phone no valid</p>"
        inpNumber.style='border-bottom: 2px solid red';
        NumberError.style.color='red'
        inpNumber.style.color ="red"
    }
}

// validate information at the click a button
subBtn.onclick = function validvalue(event){
    PrenomValid = false
    NomValid = false
    EmaillValid = false
    PasswordValid = false
    EnterPasswValid = false
    NumberValid = false

    if(inpPrenom.value.length >= 2 && regeNom.test(inpPrenom.value) === true ){
        PrenomValid = true
    }
    if(inpNom.value.length >= 2 && regeNom.test(inpNom.value) === true ){
        NomValid = true
    }
    if(regexemail.test(inpEmail.value) === true ){
        EmaillValid = true
    }
    if(inpPassword.value.length >= 8 && regexpassw.test(inpPassword.value) === true){
        PasswordValid = true
    }
    if(inpEnterPassw.value == inpPassword.value){
        EnterPasswValid = true
    }
    if(regePhone.test(inpNumber.value) == true){
        NumberValid = true
    }

    if(PrenomValid == false || NomValid == false || EmaillValid == false || PasswordValid == false || EnterPasswValid == false || NumberValid == false){
        event.preventDefault()
    }

}

// ******************************************
let icon1 = document.getElementById("icon1");
let icon2 = document.getElementById("icon2");


if(icon1.classList.contains("fa-eye-slash") == true){
    icon1.classList.remove("fa-eye-slash")
    icon1.classList.add("fa-eye")

}else{
}

icon1.onclick = function(){

    if(icon1.classList.contains("fa-eye-slash") == true){
        icon1.classList.remove("fa-eye-slash")
        icon1.classList.add("fa-eye")
        inpPassword.setAttribute('type','text')     
    }else{
        icon1.classList.add("fa-eye-slash")
        icon1.classList.remove("fa-eye")
        inpPassword.setAttribute('type','password')     
    }
}




icon2.onclick = function(){
console.log("ddd")
    if(icon2.classList.contains("fa-eye-slash") == true){
        icon2.classList.remove("fa-eye-slash")
        icon2.classList.add("fa-eye")
        inpEnterPassw.setAttribute('type','text')     
    }else{
        icon2.classList.add("fa-eye-slash")
        icon2.classList.remove("fa-eye")
        inpEnterPassw.setAttribute('type','password')     
    }
}
