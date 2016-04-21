var submitResponse = function(url) {
    var form = document.getElementById('userCreate');
    form.action = url;
    form.submit();
};

function guestLogin(){

    
    
    var account = "guest";
    console.log(account);
    var data = new FormData();
    data.append("guestLogin", account);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/login-guest.php", data, guestLoginCallback);

}

function guestLoginCallback(data) {

    if(data == 'homeowner'){

        location.assign("https://ten23mb.edumedia.ca/homeowner-profile.php");

    } else {

        location.assign("https://ten23mb.edumedia.ca/designer-profile.php");

    }


}

