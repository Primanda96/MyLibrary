const email = document.getElementById('email');
const password = document.getElementById('password');
const regpassword = document.getElementById('regpassword');
const cpassword = document.getElementById('cpassword');
let regbutton = document.getElementById('regbtn');
let button = document.getElementById('btn');

regbutton.onclick= function checkFormRegister(){
    if(regpassword.value.length > 0 && regpassword.value.length < 8 ) {
        document.getElementById('regerror').style.position = "relative"
        document.getElementById('regerror').style.visibility = "visible"
        return false;
    }  
}
button.onclick= function checkForm(){
    if(email.value === '' || email.value === null || password.value === '' || password.value === null) {
        document.getElementById('error').style.position = "relative"
        document.getElementById('error').style.visibility = "visible"
        return false;
    }  
}



