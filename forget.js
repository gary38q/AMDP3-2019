function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  
function Valid() {
    
    let result = true

    let email = document.getElementById('txtemail').value

    let erremail = document.getElementById('erremail')

    if (validateEmail(email)) {
        erremail.innerHTML = ""
      }
     else {
        erremail.innerHTML = "Invalid e-mail format"
        result = false;
      }

    if (email.length == 0){
        erremail.innerHTML = "Invalid e-mail format"
        result = false;
    }
    
    else {erremail.innerHTML = ""}
    
      return result

}