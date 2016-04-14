document.addEventListener("DOMContentLoaded", function() {
    retrieveHomeownerProfile();

});


function retrieveHomeownerProfile(){
    let getMe = 'homeownerProfile';
    let data = new FormData();
    data.append("homeownerProfile", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/userFetch.php", data, getHomeownerProfile);
}

function getHomeownerProfile(data){


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



document.addEventListener("DOMContentLoaded", function() {
    retrieveHoweownerActive();

});




function retrieveHoweownerActive(){
    let getMe = 'homeownersActive';
    let data = new FormData();
    data.append("homeownersActive", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getHomeownerDashboard.php", null, showAllHomeownerContests);
}


//Get contests from DB
function showAllHomeownerContests(data){

    console.log(data);

    let activeDiv = document.getElementById("activerow");
    let completedDiv = document.getElementById("completedrow");

    activeDiv.innerHTML = "";
    completedDiv.innerHTML = "";

    for (let i=0; i < data.length; i++){

        data[i].closing_date = data[i].closing_date.split(/[- :]/);
        data[i].closing_date = new Date(data[i].closing_date[0], data[i].closing_date[1]-1, data[i].closing_date[2], data[i].closing_date[3], data[i].closing_date[4], data[i].closing_date[5]);
        console.log(data[i].closing_date);

        let state = data[i].state;

        console.log(data[i].rooms[0].files[0].filename);

        var s = "";
        s += "<div onclick='retrieveOneHoCont( this.dataset );' class='col-md-6' data-contest='" + data[i].project_id + "' >" +
            "<div class='card'>" +

            //TODO get the link to work
            "<a >" +
            "<div class='card-block'>" +
            "<h5 class='card-title'>" + data[i].project_title +"</h5>" +
            "<h6 class='card-subtitle text-muted'>"+ data[i].rooms[0].room_type +"</h6>" +
            "</div>" +

            "<div class='submittedBadge hidden'>" +
            "<span>Submitted</span>" +
            "</div>" +

            "<img class='card-img' src='upload/" + data[i].rooms[0].files[0].filename.slice(0, -2) + "."+ data[i].rooms[0].files[0].filetype.substring(6) + " ' alt='Card image'>" +

            "<div class='card-block card-block-footer'>" +
            "<div class='row'>" +
            "<div class='col-xs-8'>"+
            "<span>Days Remaining</span>" + "<br>";

        if (state == "qualifying"){
            s += "<span class='prize'>" + countdown(data[i].closing_date, null, countdown.DAYS) + "</span>";
        }else{
            s += "<p>Closed</p>";
        }

        s += "</div>" +
            "<div class='col-xs-4 text-xs-right'>"+
            "<span>Prize</span>" + "<br>" +
            "<span class='prize'>$"+ data[i].prize +"</span>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "</a>" +
            "</div>" +
            "</div>";

        //add the project card to either the active or completed div
        if (data[i].state == "qualifying"){

            activeDiv.innerHTML += s;
        }else if (data[i].state == "completed"){

            completedDiv.innerHTML += s;
        }

    }

    if (completedDiv.childElementCount == 0){

        completedDiv.innerHTML = "<p>You have no completed contests.</p><p>Click <strong>New Contest</strong> above to get started!</p>";
    }
}
