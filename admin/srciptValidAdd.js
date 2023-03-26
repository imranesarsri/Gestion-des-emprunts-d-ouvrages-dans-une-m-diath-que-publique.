let btnAdd = document.getElementById('btnAdd')
let AuthorName = document.getElementById('AuthorName')
let Title = document.getElementById('Title')
let editDate = document.getElementById('editDate')
let purchaseDate = document.getElementById('purchaseDate')

let Broken = document.getElementById('Broken')
let Old = document.getElementById('Old')
let Used = document.getElementById('Used')
let New = document.getElementById('New')

let regeNom = /^[a-zA-Z-\s]+$/;




btnAdd.onclick = function(e){

    ValidAuthor = false
    ValidTitle = false
    ValideditDate = false
    ValidpurchaseDate = false
    Validrediovalid = false

    if(AuthorName.value.length >= 2 && regeNom.test(AuthorName.value) === true ){
        ValidAuthor = true;
    }

    if(Title.value.length >= 1){
    Title = true;
    }

    if(editDate.value !== undefined){
        editDate = true;
    }

    if(purchaseDate.value !== undefined){
        purchaseDate = true;
    }
    if (Broken.checked == true || Old.checked == true || Used.checked == true || New.checked == true){
        rediovalid =true;
    };

    if(
        ValidAuthor == false ||
        Title == false ||
        editDate == false ||
        purchaseDate == false ||
        rediovalid == false 
    ){
    e.preventDefault();
    }
}




// onblur
Title.onblur = function () {
    if(Title.value.length >= 1 ){
        Title.style ="border: 2px solid green"
    }else{
        Title.style ="border: 2px solid red"
    }
}

AuthorName.onblur = function () {
    if(AuthorName.value.length >= 2 && regeNom.test(AuthorName.value) === true ){
        AuthorName.style ="border: 2px solid green"
    }else{
        AuthorName.style ="border: 2px solid red"

    }
}

editDate.onblur = function () {
    if(editDate.value.length == 0){
        editDate.style ="border: 1px solid red"
    }else{
        editDate.style ="border: 1px solid green"

    }
}

purchaseDate.onblur = function () {
    if(purchaseDate.value.length == 0){
        purchaseDate.style ="border: 1px solid red"
    }else{
        purchaseDate.style ="border: 1px solid green"

    }
}



// oninput
AuthorName.oninput = function () {
    if(AuthorName.value.length >= 2 && regeNom.test(AuthorName.value) === true ){
        AuthorName.style='border: 2px solid green'
        AuthorName.style.color ="green"
    }else if (AuthorName.value.length < 2 || regeNom.test(AuthorName.value) !== true ) {
        AuthorName.style='border: 2px solid red'
        AuthorName.style.color ="red"
    }
}

Title.oninput = function () {
    if(Title.value.length >= 1  ){
        Title.style='border: 2px solid green'
        Title.style.color ="green"
    }else if (Title.value.length < 1  ) {
        Title.style='border: 2px solid red'
        Title.style.color ="red"
    }
}

editDate.oninput = function () {
    if(editDate.value !== undefined){
        editDate.style='border-bottom: 2px solid green';
        editDate.style.color ="green"
    }else{
        editDate.style='border-bottom: 2px solid red';
        editDate.style.color ="red"

    }
}

purchaseDate.oninput = function () {
    if(purchaseDate.value !== undefined){
        purchaseDate.style='border-bottom: 2px solid green';
        purchaseDate.style.color ="green"
    }else{
        purchaseDate.style='border-bottom: 2px solid red';
        purchaseDate.style.color ="red"

    }
}


