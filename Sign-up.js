function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  
function validate() {
    let result = true
    let a=0 

    let email = document.getElementById('txtemail').value
    let Username = document.getElementById('txtuser').value
    let password = document.getElementById('txtpass').value
    let passconfirm = document.getElementById('txtconfirm').value   

    let erremail = document.getElementById('erremail')
    let erruser = document.getElementById('erruser')
    let errpass = document.getElementById('errpass')
    let errconfirm = document.getElementById('errconfirm')


    if (email.length == 0){
        erremail.innerHTML = "Invalid e-mail format"
        result = false
    }
    else {erremail.innerHTML = ""}
    
    if (validateEmail(email)) {
        erremail.innerHTML = ""
      } else {
        erremail.innerHTML = "Invalid e-mail format"
        result = false;
      }
    
    if (Username.length <= 6 || Username.length >=20){
        erruser.innerHTML = "Username must be between 6 and 20 characters long"
        result = false
    }
    else {erruser.innerHTML = ""}

    for(var i=0; i<Username.length; i++)
      {
        var char1 = Username.charAt(i);
        var cc = char1.charCodeAt(0);
    if ((cc>47 && cc<58) || (cc>64 && cc<91) || (cc>96 && cc<123)){
       
    }
    else { a++;}
}
    if (a>0){
    erruser.innerHTML = "Username must only contain alphanumeric characters"
    result = false}
    else {erruser.innerHTML = ""}
    


    if (password.length < 8){
        errpass.innerHTML = "Password must be at least 8 characters long"
        result = false
    }
    else {errpass.innerHTML = ""}

    if (passconfirm.length == 0){
        errconfirm.innerHTML = "Password must be at least 8 characters long"
        result = false
    }
    else if (passconfirm != password){
        errconfirm.innerHTML = "Please correctly confirm the password"
        result = false
    }
    else {errconfirm.innerHTML = ""}
        return result

}