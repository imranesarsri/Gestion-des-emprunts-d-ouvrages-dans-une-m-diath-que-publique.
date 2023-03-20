let btnupPagProfil = document.getElementById('btnupPagProfil');
let Nickname = document.getElementById('Nickname');
let fullName = document.getElementById('fullName');
let Address = document.getElementById('Address');
let Phone = document.getElementById('Phone');
let CIN = document.getElementById('CIN');
let BirthDate = document.getElementById('BirthDate');

let email = document.getElementById('email');
let currPass = document.getElementById('currPass');
let newPass = document.getElementById('newPass');
let rnewPass = document.getElementById('rnewPass');
let btnUpPasswAndEmail = document.getElementById('btnUpPasswAndEmail');


let regeNom = /^[a-zA-Z-\s]+$/;
let regePhone = /(05|06|07)\d{8}$/;
let regeCin = new RegExp('^[a-zA-Z]{1}[0-9]{4,6}$');
let regeNickname = /^[a-zA-Z0-9-\s]+$/;
let regexemail = new RegExp('^[a-zA-Z0-9.-]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}(com|ma)$','g')
let regexpassw = new RegExp('^[a-zA-Z0-9.-_#$%]+[0-9.-_#$%]')




btnupPagProfil.onclick = function validvalue(e){
    
    fullanameVallid  =  false
    addressValid     =  false
    phoneValid       =  false
    cinValid         =  false
    dateValid        =  false
    nicknameValid    =  false

    if(fullName.value.length >= 4 && regeNom.test(fullName.value) === true ){
        fullanameVallid = true
    }

    if(Address.value.length >= 8 ){
        addressValid = true
    }

    if(regePhone.test(Phone.value) == true){
        phoneValid = true
    }

    if(regeCin.test(CIN.value) === true ){
        cinValid = true
    }

    if(Nickname.value.length >= 2 && regeNickname.test(Nickname.value) === true){
        nicknameValid = true
    }


    if(BirthDate.value !== undefined){
        dateValid = true
    }


    if(
        fullanameVallid  ==  false ||
        addressValid     ==  false ||
        phoneValid       ==  false ||
        cinValid         ==  false ||
        dateValid        ==  false ||
        nicknameValid    ==  false 

    ){
        e.preventDefault()
    }
}


// onblur
email.onblur = function () {

    if(regexemail.test(email.value) === true ){
        email.style='border: 2px solid #15AAD9'
        email.style.color ="#15AAD9"
        iconEmail.style.color ="#15AAD9"
    }else{
        email.style='border: 2px solid red'
        email.style.color ="red"
        iconEmail.style.color ="red"

    }

}


currPass.onblur = function () {
    if(currPass.value.length >= 8 && regexpassw.test(currPass.value) === true){
        currPass.style='border: 2px solid #15AAD9 ';
        currPass.style.color ="#15AAD9"
    }else{
        currPass.style='border: 2px solid red';
        currPass.style.color ="red"
    }
}
newPass.onblur = function () {
    if(newPass.value.length >= 8 && regexpassw.test(newPass.value) === true){
        newPass.style='border: 2px solid #15AAD9 ';
        newPass.style.color ="#15AAD9"
    }else{
        newPass.style='border: 2px solid red';
        newPass.style.color ="red"
    }
}
rnewPass.onblur = function () {
    if(rnewPass.value == newPass.value  && rnewPass.value.length >= 8 && regexpassw.test(rnewPass.value) === true){
        rnewPass.style='border: 2px solid #15AAD9 ';
        rnewPass.style.color ="#15AAD9"
    }else{
        rnewPass.style='border: 2px solid red';
        rnewPass.style.color ="red"
    }
}



btnUpPasswAndEmail.onclick = function validvalue(e){

    if(currPass.value.length > 0){
        console.log('hallo')
    }else{
        validEmail = false 
        if(regexemail.test(email.value) === true ){
            validEmail = true 
        }
        if(validEmail == false ){
            e.preventDefault();
        }
    }
}




