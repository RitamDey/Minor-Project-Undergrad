function val()
{
    var username=document.forms["login"]["username"];
    var password=document.forms["login"]["password"];

    if(username.value=="")
    {
        window.alert("Please enter your username");
        username.focus();
        return false;
    }
    if(password.value=="")
    {
        window.alert(" please enter your password");
        password.focus();
        return false;
    }
}