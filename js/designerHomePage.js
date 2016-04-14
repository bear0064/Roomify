document.addEventListener("DOMContentLoaded", function() {
    retrieveDesignerProfile();



});


function retrieveDesignerProfile(){
    let getMe = 'designerProfile';
    let data = new FormData();
    data.append("designerProfile", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/userFetch.php", data, getDesignerProfile);
}

function getDesignerProfile(data){


    document.getElementById("profile").innerHTML = "";

        localStorage.setItem('ut', data.users[0].u_usertype);

        var s = "";
        s += "<br>"+
                "<p><span class='name'>"+ data.users[0].u_first + " " + data.users[0].u_last +"</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                // "<a href='#'>Edit Profile</a></p>"+
                "<p>"+
                "English, French"+
                "<br>" + data.users[0].u_usercountry + "</p>";

        document.getElementById("profile").innerHTML +=s;





    console.log(data);

}

