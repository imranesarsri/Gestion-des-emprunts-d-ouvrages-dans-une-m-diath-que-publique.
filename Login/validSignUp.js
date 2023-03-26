let fullName = document.getElementById("fullName")
let address = document.getElementById("address")
let email = document.getElementById("email")
let phone = document.getElementById("phone")
let cin = document.getElementById("cin")
let nickname = document.getElementById("nickname")
let password = document.getElementById("password")
let passwordagain = document.getElementById("passwordagain")
let date = document.getElementById("date")
let subBtn = document.getElementById("subBtn")
let Student = document.getElementById("Student")
let Fonctionnaire = document.getElementById("Fonctionnaire")
let Employee = document.getElementById("Employee")
let Housewife = document.getElementById("Housewife")

let errorfullName = document.getElementById("errorfullName")
let errorAddress = document.getElementById("errorAddress")
let errorEmail = document.getElementById("errorEmail")
let errorPhone = document.getElementById("errorPhone")
let errorCin = document.getElementById("errorCin")
let errorNickname = document.getElementById("errorNickname")
let errorPassword = document.getElementById("errorPassword")
let errorPasswordagain = document.getElementById("errorPasswordagain")
let errorDate = document.getElementById("errorDate")

let iconNam = document.getElementById("iconFullName")
let iconAddress = document.getElementById("iconAddress")
let iconEmail = document.getElementById("iconEmail")
let iconPhone = document.getElementById("iconPhone")
let iconCin = document.getElementById("iconCin")
let iconNickname = document.getElementById("iconNickname")
let iconPassword = document.getElementById("iconPassword")
let iconPasswordagain = document.getElementById("iconPasswordagain")
let iconDate = document.getElementById("iconDate")


let regexemail = new RegExp('^[a-zA-Z0-9.-]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}(com|ma)$','g')
let regexpassw = new RegExp('^[a-zA-Z0-9.-_#$%]+[0-9.-_#$%]')
let regeNom = /^[a-zA-Z-\s]+$/;
let regePhone = /(05|06|07)\d{8}$/;
let regeCin = new RegExp('^[a-zA-Z]{1}[0-9]{4,6}$');
let regeNickname = /^[a-zA-Z0-9-\s]+$/;



//  onfocus
fullName.onfocus = function () {
    if(fullName.value.length == 0){
        fullName.style ="border-bottom: 2px solid #00C2FF" 
        fullName.style.color ="#00C2FF"
        errorfullName.style.color ="#ffffff7d"
        errorfullName.innerHTML ="entre full name consisting of at least 4 letters"
    }
}

address.onfocus = function () {
    if(address.value.length == 0){
        address.style ="border-bottom: 2px solid #00C2FF" 
        address.style.color ="#00C2FF"
    }
}

email.onfocus = function () {
    if(email.value.length == 0){
        email.style ="border-bottom: 2px solid #00C2FF" 
        email.style.color ="#00C2FF"
    }
}

phone.onfocus = function () {
    if(phone.value.length == 0){
        phone.style ="border-bottom: 2px solid #00C2FF" 
        phone.style.color ="#00C2FF"
    }
}

cin.onfocus = function () {
    if(cin.value.length == 0){
        cin.style ="border-bottom: 2px solid #00C2FF"
        cin.style.color ="#00C2FF"
    }
}

nickname.onfocus = function () {
    if(nickname.value.length == 0){
        nickname.style ="border-bottom: 2px solid purple" 
        nickname.style.color ="purple"
    }
}

password.onfocus = function () {
    if(password.value.length == 0){
        password.style ="border-bottom: 2px solid purple" 
        password.style.color ="purple"
    }
}

passwordagain.onfocus = function () {
    if(passwordagain.value.length == 0){
        passwordagain.style ="border-bottom: 2px solid purple" 
        passwordagain.style.color ="purple"
    }
}

date.onfocus = function () {
    if(date.value.length == 0){
        date.style ="border-bottom: 2px solid #00C2FF" 
        date.style.color ="#00C2FF"
    }
}



// onblur
fullName.onblur = function () {
    if(fullName.value.length == 0){
        fullName.style ="border-bottom: 1px solid white"
        errorfullName.innerHTML =""
        iconNam.classList.remove("fa-xmark")
    }else {

        if(fullName.value.length < 4 || regeNom.test(fullName.value) !== true ){
            errorfullName.innerHTML ="<p>The full name must contain at least 4 characters</p> <p> The full name should not contain numbers</p>"
        }
    }
}

address.onblur = function () {
    if(address.value.length == 0){
        address.style ="border-bottom: 1px solid white"
        iconAddress.classList.remove("fa-xmark")
    }
}

email.onblur = function () {
    if(email.value.length == 0){
        email.style ="border-bottom: 1px solid white"
        iconEmail.classList.remove("fa-xmark")
    }
}

phone.onblur = function () {
    if(phone.value.length == 0){
        phone.style ="border-bottom: 1px solid white"
        iconPhone.classList.remove("fa-xmark")
        errorPhone.innerHTML =""

    }else if(phone.value.length > 0 && regePhone.test(phone.value) !== true){
        errorPhone.innerHTML = "<p>The field must contain 10 numbers starting with 05 or 06 or 07</p>"
    }
}

cin.onblur = function () {
    if(cin.value.length == 0){
        cin.style ="border-bottom: 1px solid white"
        iconCin.classList.remove("fa-xmark")

    }
}

nickname.onblur = function () {
    if(nickname.value.length == 0){
        nickname.style ="border-bottom: 1px solid white"
        iconNickname.classList.remove("fa-xmark")
    }
}

password.onblur = function () {
    if(password.value.length == 0){
        password.style ="border-bottom: 1px solid white"
        iconPassword.classList.remove("fa-xmark")
    }
}

passwordagain.onblur = function () {
    if(passwordagain.value.length == 0){
        passwordagain.style ="border-bottom: 1px solid white"
        iconPasswordagain.classList.remove("fa-xmark")
    }
}

date.onblur = function () {
    if(date.value.length == 0){
        date.style ="border-bottom: 1px solid white"
        errorDate.classList.remove("fa-xmark")

    }
}



// oninput
fullName.oninput = function () {
    errorfullName.innerHTML =""

    if(fullName.value.length >= 4 && regeNom.test(fullName.value) === true ){
        fullName.style='border-bottom: 2px solid #00C2FF'
        fullName.style.color ="#00C2FF"
        iconNam.style.color ="#00C2FF"
        iconNam.classList.remove("fa-xmark")
        iconNam.classList.add("fa-check")

    }else if (fullName.value.length < 4 || regeNom.test(fullName.value) !== true ) {
        fullName.style='border-bottom: 2px solid red'
        fullName.style.color ="red"
        iconNam.style.color ="red"
        iconNam.classList.remove("fa-check")
        iconNam.classList.add("fa-xmark")
    }
}

address.oninput = function () {
    if(address.value.length >= 8 ){
        address.style='border-bottom: 2px solid #00C2FF'
        address.style.color ="#00C2FF"
        iconAddress.style.color ="#00C2FF"
        iconAddress.classList.remove("fa-xmark")
        iconAddress.classList.add("fa-check")
    }else if (address.value.length < 8 ) {
        address.style='border-bottom: 2px solid red'
        address.style.color ="red"
        iconAddress.style.color ="red"
        iconAddress.classList.remove("fa-check")
        iconAddress.classList.add("fa-xmark")
    }
}


email.oninput = function () {
    if(regexemail.test(email.value) === true ){
        email.style='border-bottom: 2px solid #00C2FF'
        email.style.color ="#00C2FF"
        iconEmail.style.color ="#00C2FF"
        iconEmail.classList.remove("fa-xmark")
        iconEmail.classList.add("fa-check")
    }else{
        email.style='border-bottom: 2px solid red'
        email.style.color ="red"
        iconEmail.style.color ="red"
        iconEmail.classList.remove("fa-check")
        iconEmail.classList.add("fa-xmark")
    }
}


phone.oninput = function () {
    if(regePhone.test(phone.value) == true){
        phone.style='border-bottom: 2px solid #15AAD9';
        phone.style.color ="#15AAD9"
        iconPhone.style.color ="#00C2FF"
        iconPhone.classList.remove("fa-xmark")
        iconPhone.classList.add("fa-check")
    }else {
        phone.style='border-bottom: 2px solid red';
        phone.style.color ="red"
        iconPhone.style.color ="red"
        iconPhone.classList.remove("fa-check")
        iconPhone.classList.add("fa-xmark")
    }
}

cin.oninput = function () {
    if(regeCin.test(cin.value) === true ){
        cin.style='border-bottom: 2px solid #15AAD9'
        cin.style.color ="#15AAD9"
        iconCin.style.color ="#15AAD9"
        iconCin.classList.remove("fa-xmark")
        iconCin.classList.add("fa-check")
    }else{
        cin.style='border-bottom: 2px solid red'
        cin.style.color ="red"
        iconCin.style.color ="red"
        iconCin.classList.remove("fa-check")
        iconCin.classList.add("fa-xmark")
    }
}


nickname.oninput = function () {
    if(nickname.value.length >= 2 && regeNickname.test(nickname.value) === true){
        nickname.style='border-bottom: 2px solid #15AAD9'
        nickname.style.color ="#15AAD9"
        iconNickname.style.color ="#15AAD9"
        iconNickname.classList.remove("fa-xmark")
        iconNickname.classList.add("fa-check")
    }else{
        nickname.style='border-bottom: 2px solid red'
        nickname.style.color ="red"
        iconNickname.style.color ="red"
        iconNickname.classList.remove("fa-check")
        iconNickname.classList.add("fa-xmark")
    }
}



password.oninput = function () {
    if(password.value.length >= 8 && regexpassw.test(password.value) === true){
        password.style='border-bottom: 2px solid #15AAD9 ';
        password.style.color ="#15AAD9"
        iconPassword.style.color ="#15AAD9"
        iconPassword.classList.remove("fa-xmark")
        iconPassword.classList.add("fa-check")
    }else{
        password.style='border-bottom: 2px solid red';
        password.style.color ="red"
        iconPassword.style.color ="red"
        iconPassword.classList.remove("fa-check")
        iconPassword.classList.add("fa-xmark")
    }

    if(password.value.length >0){
        icon1.style.display="block"
    }else{
        icon1.style.display="none"
    }
    
}

passwordagain.oninput = function () {

    if(passwordagain.value == password.value && password.value.length >= 8 && regexpassw.test(password.value) === true){
        passwordagain.style='border-bottom: 2px solid #15AAD9';
        passwordagain.style.color ="#15AAD9"
        iconPasswordagain.style.color ="#15AAD9"
        iconPasswordagain.classList.remove("fa-xmark")
        iconPasswordagain.classList.add("fa-check")
    }else{
        passwordagain.style='border-bottom: 2px solid red';
        passwordagain.style.color ="red"
        iconPasswordagain.style.color ="red"
        iconPasswordagain.classList.remove("fa-check")
        iconPasswordagain.classList.add("fa-xmark")
    }
}


date.oninput = function () {
    if(date.value !== undefined){
        date.style='border-bottom: 2px solid #15AAD9';
        date.style.color ="#15AAD9"
        iconDate.style.color ="#15AAD9"
        iconDate.classList.remove("fa-xmark")
        iconDate.classList.add("fa-check")
    }else{
        date.style='border-bottom: 2px solid red';
        date.style.color ="red"
        iconDate.style.color ="red"
        iconDate.classList.remove("fa-check")
        iconDate.classList.add("fa-xmark")
    }
}


subBtn.onclick = function validvalue(event){
    
    fullanameVallid = false
    addressValid = false
    emailValid = false
    phoneValid = false
    cinValid = false
    nicknameValid = false
    passwordValid = false
    paswordaValid = false
    dateValid = false
    rediovalid =false

    if(fullName.value.length >= 4 && regeNom.test(fullName.value) === true ){
        fullanameVallid = true
    }

    if(address.value.length >= 8 ){
        addressValid = true
    }

    if(regexemail.test(email.value) === true ){
        emailValid = true
    }

    if(regePhone.test(phone.value) == true){
        phoneValid = true

    }

    if(regeCin.test(cin.value) === true ){
        cinValid = true
    }

    if(nickname.value.length >= 2 && regeNickname.test(nickname.value) === true){
        nicknameValid = true
    }

    if(password.value.length >= 8 && regexpassw.test(password.value) === true){
        passwordValid = true
    }

    if(passwordagain.value == password.value && passwordagain.value.length >= 8 && regexpassw.test(passwordagain.value) === true){
        paswordaValid = true
    }

    if(date.value !== undefined){
        dateValid = true
    }

    if (Student.checked == true || Fonctionnaire.checked == true || Employee.checked == true || Housewife.checked == true){
        rediovalid =true
    }



    if(
        fullanameVallid == false ||
        addressValid == false ||
        emailValid == false ||
        phoneValid == false ||
        cinValid == false ||
        nicknameValid == false ||
        passwordValid == false ||
        paswordaValid == false ||
        dateValid == false ||
        rediovalid == false

    ){
        event.preventDefault()
    }
}