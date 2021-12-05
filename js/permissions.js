function setPerms(level){
    if (level == 'admin'){

    }
    else{
        document.getElementById("loginpage").style.visibility = "hidden";
        alert("Reachers")
        document.getElementsByClassName("nav-questions").style.visibility = "hidden";
        
        for(let i = 0; i < document.getElementsByClassName('loginpage').length; i++){
            document.getElementsByClassName('loginpage')[i].style.visibility = 'hidden';
            document.getElementsByClassName('loginpage').style[i] = 'visibility: hidden;'
        }
    }
}

document.getElementById("logout").addEventListener("click", signout);

function signout(){

    const form = document.createElement('form');
    form.method = 'post';
    form.action = 'login.php';

    const hiddenField = document.createElement('input');
    hiddenField.type = 'hidden';
    hiddenField.name = 'logout';
    hiddenField.value = 'logout';

    form.appendChild(hiddenField);

    document.body.appendChild(form);
    form.submit();
    
    /*if(confirm("Would you like to sign out?")){
        document.getElementById("logout").style.display = "none";
        document.getElementById("signuppage").style.display = "initial"
        document.getElementById("loginpage").style.display = "initial"
    }*/
}