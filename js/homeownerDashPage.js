document.addEventListener("DOMContentLoaded", function() {
    retrieveHoweownerActive();


    $(".dropdown-item").on("click", function() {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });

});




function retrieveHoweownerActive(){
    let getMe = 'homeownersActive';
    let data = new FormData();
    data.append("homeownersActive", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getHomeownerDashboard.php", null, showAllHomeownerContests);
}

function setSortActiveDesigner(event){

    let sortBy = event.target.innerHTML;
    let data = new FormData();
    data.append("sortActive", sortBy);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerActive.php", data, showAllHomeownerContests);
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

                        "<img class='card-img' src='upload/" + data[i].rooms[0].files[0].filename + " ' alt='Card image'>" +

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

        document.getElementById("completed").classList.add("empty");
        document.getElementById("completed").classList.add("cnt-center");


     completedDiv.innerHTML = "<p>You have no completed contests yet.</p>";
    }
    if (data.length == 0){

        document.getElementById("activerow").classList.add("empty");
        document.getElementById("activerow").classList.add("cnt-center");


        activeDiv.innerHTML = "<p>You have no active contests.</p>"+
            "<p>Start by clicking New Contest to begin your home makeover!.</p>"
        ;
    }
}
