function validate() {
    let result = true

    let password = document.getElementById('txtpass').value
    let passconfirm = document.getElementById('txtconfirm').value   

    let errpass = document.getElementById('errpass')
    let errconfirm = document.getElementById('errconfirm')

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