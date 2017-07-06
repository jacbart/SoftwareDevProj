$(document).ready(function(){ //this is breaking the code and IDK why =(
    globalNavbar();
    loginButton();
    console.log(getCookie('ThatCSGuide'));
    document.getElementById("loginButton").onclick = function(){ //when the button is pressed
        if (document.cookie.indexOf("ThatCSGuide") != 0){ //go to the login screen if no user cookie
            window.location.href ="login.html";
        }
        else{
            window.location.href="logout.php"
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
        var output = 'Welcome ' + getCookie('ThatCSGuide') + ': Click to logout'; //format the string nicely
        document.getElementById("loginButton").innerHTML = output// code to display name in button
    }
}

function globalNavbar(){
    var bar = `<div class="row">
        <nav class="navbar navbar-inverse navbar-static-top"
             style="padding-top:0.5em; padding-top:0.5em;">
            <div class="container-fluid">
                <div class="btn-group" role="group">
                    <a href="index.html">
                        <button type="button" class="btn btn-primary pull-left">THAT CS GUIDE
                        </button>
                    </a>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Topics
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="topic.php?topicid=1">Python</a></li>
                            <li class="divider"></li>
                            <li><a href="topic.php?topicid=2">C++</a></li>
                            <li class="divider"></li>
                            <li><a href="topic.php?topicid=3">Cheat Sheets</a></li>
                        </ul>
                    </div>
                </div>
                    <button type="button" 
                        class="btn btn-default" 
                        id="loginButton">
                        Log In
                    </button>
            </div>
        </nav>
    </div>`;
    $('body').prepend(bar);
}

                // <div class="btn-group pull-right" role="group">
                    // <a href="createuser.html"
                    //     class="btn btn-default">
                    //     Create User
                    // </a>
                // </div>
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