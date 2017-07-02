$(document).ready(function(){ //this is breaking the code and IDK why =(
    loginButton();
    document.getElementById("loginButton").onclick = function(){ //when the button is pressed
        if (document.cookie.indexOf("ThatCSGuide") != 0){ //go to the login screen if no user cookie
            window.location.href ="login.html";
        }
        else{
            //logout.php
        }
    };
});

//magic code pulled from https://www.w3schools.com/js/js_cookies.asp
function getCookie(cname){ 
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function loginButton(){
    if (document.cookie.indexOf("ThatCSGuide") == 0){ //check if a cookie has been set
        var output = 'Welcome ' + getCookie('ThatCSGuide'); //format the string nicely
        document.getElementById("loginButton").innerHTML = output// code to display name in button
    }
}

// function checkCookie(name) { //https://www.w3schools.com/js/js_cookies.asp
//     var username = getCookie(name);
//     if (username != "") {
//         alert("Welcome again " + username);
//     } 
// }

// function test(){
//     checkCookie();
//     if (getCookie('ThatCSGuide')){
//         var thing = getCookie('ThatCSGuide');
//         console.log(typeof(thing));
//         document.getElementById("sampleButton").value = thing;
//     }
//     else{
//         document.getElementById("sampleButton").value = 'Login';
//     }
// }