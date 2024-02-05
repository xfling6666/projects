/*
    Student name: Feiling Xie ; Lanchen Zhou; Mingzi Xu
    File name: script.js
    Section: CST 8285 sec 312 group 9
    date created: nov.25th
    Descriptiom: this is the java script file for assignment02.This file is to provide the client-side validation function.
*/

//define variables to get the correct objects 
let emailInput=document.getElementById("email");
let loginInput=document.getElementById("login");
let passInput=document.getElementById("passwrd");
let pass2Input=document.getElementById("pass2");
let termsInput=document.getElementById("terms");

let debugtype = false; // set to true to debug type errors


// creat the error message elements when validate find error
let emailError=document.createElement('p');
emailError.setAttribute("class","warning");
document.querySelectorAll(".emailfield")[0].append(emailError);

let loginError=document.createElement('p');
loginError.setAttribute("class","warning");
document.querySelectorAll(".loginfield")[0].append(loginError);

let passError=document.createElement('p');
passError.setAttribute("class","warning");
document.querySelectorAll(".passfield")[0].append(passError);

let pass2Error=document.createElement('p');
pass2Error.setAttribute("class","warning");
document.querySelectorAll(".pass2field")[0].append(pass2Error);

let termsError=document.createElement('p');
termsError.setAttribute("class","warning");
document.querySelectorAll(".termscheck")[0].append(termsError);

//define variables of error massages 
var emailErrorMsg="Email address should be non-empty and with the format xyz@xyz.xyz";
var loginErrorMsg="Login name should be non-empty and less than 30 characters";
var passErrorMsg="Password should be at least 8 characters long, 1 uppercase, 1 lowercase";
var pass2ErrorMsg="Please re-type password to be identical with the first one";
var termsErrorMsg="Please accept the terms and conditions";
var defaultMSg="";

//method to validate email
function vaildateEmail()
{
    let email = emailInput.value; // access the value of the email

    let emailErrorMsg="Email address should be non-empty and with the format xyz@xyz.xyz";


    let regexp=/\S+@\S+\.\S+/; //reg. expression     
    if(regexp.test(email)) { 
    error = defaultMSg;
    emailInput.classList.remove('error'); }
    else {
    error = emailErrorMsg;
    emailInput.classList.add('error'); }
    return error;      
}
//method to validate login
function vaildateLogin()
{
    let login = loginInput.value;       
    if (login.trim() === "" || login.length >= 30) { 
    error = loginErrorMsg; 
    loginInput.classList.add('error');}
    else {
    error = defaultMSg; 
    loginInput.classList.remove('error'); }
    return error;      
}

//method to validate password
function validatePassword()
{ 
    let password =passInput.value;
    let passRegxp=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/;
    if(passRegxp.test(password)) { 
        error = defaultMSg;
        passInput.classList.remove('error');  }
        else {
        error = passErrorMsg;
        passInput.classList.add('error');  }
        return error;  
        
}
//method to validate password2
function validatePass2()
{
    let password =passInput.value;
    let pass2=pass2Input.value;
    if(password==pass2) { 
        error = defaultMSg;
        pass2Input.classList.remove('error'); }
        else {
        error = pass2ErrorMsg; 
        pass2Input.classList.add('error'); }
        return error;     
}

//method to validate terms checking
function validatTerms(){
    let termsErrorMsg="Please accept the terms and conditions";
    if(termsInput.checked){
    return defaultMSg;}
    else{
    return termsErrorMsg;
    }
}
//event handler for submit event
function validate()
{
    let valid = true;//global validation 
    
    let emailValidation=vaildateEmail();
    if(emailValidation !==defaultMSg){
        emailError.textContent = emailValidation;
        valid = false;
    }
    let termsValidation=validatTerms();    
    if(termsValidation!==defaultMSg){
        termsError.textContent=termsValidation;
        valid = false;
    }

    //username validation
    let loginValidation=vaildateLogin();
    debugtype ? console.log(loginValidation) : null;
    if(loginValidation !==defaultMSg){
        loginError.textContent = loginValidation;
        valid = false;
    }
    let passValidation=validatePassword();
    if(passValidation !==defaultMSg){
        passError.textContent = passValidation;
        valid = false;
    }

    let pass2Validation=validatePass2();
    if(pass2Validation !==defaultMSg){
        pass2Error.textContent = pass2Validation;
        valid = false;
    }

    debugtype ? alert(valid) : null;
    return valid;   

};

// define the reset function 
function resetFormError() {
    emailError.textContent=defaultMSg;
    termsError.textContent=defaultMSg;
    loginError.textContent=defaultMSg;
    passError.textContent=defaultMSg;
    pass2Error.textContent=defaultMSg;
}
document.form.addEventListener("reset",resetFormError);

//  add event listner to the email if you entered correct email,the error paragraph with be empty

emailInput.addEventListener("blur",()=>{
    let x=vaildateEmail();
    if(x == defaultMSg){
        emailError.textContent = defaultMSg;
    }
    else{
        emailError.textContent = emailErrorMsg;
    }
    }
    );

loginInput.addEventListener("blur",()=>{
        let x=vaildateLogin();
        if(x == defaultMSg){
            loginError.textContent = defaultMSg;
        }
        else{
            loginError.textContent = loginErrorMsg;
        }
        }
        );

passInput.addEventListener("blur",()=>{
            let x=validatePassword();
            if(x == defaultMSg){
                passError.textContent = defaultMSg;
            }
            else{
                passError.textContent = passErrorMsg;
            }
            }
            );
pass2Input.addEventListener("blur",()=>{
            let x=validatePass2();
            if(x == defaultMSg){
                pass2Error.textContent = defaultMSg;
            }
            else{
                pass2Error.textContent = pass2ErrorMsg;
            }
            }
            );

// add event listner to the checkbox if you check the terms box,the error paragraph with be empty
termsInput.addEventListener("change", function(){
        if(this.checked){
            termsError.textContent= defaultMSg;
        }
        });

function convertToLowerCase(element){
    element.value=element.value.toLowerCase();
}

