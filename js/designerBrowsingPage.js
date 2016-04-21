document.addEventListener("DOMContentLoaded", function() {
   retrieveAll();


    $(".dropdown-item").on("click", function() {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });



});

function retrieveAll(){
    var getMe = 'all';
    var data = new FormData();
    data.append("getAll", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getAllContests.php", data, getAllContests);
}


//Get contests from DB
function getAllContests(data){

    document.getElementById("activerow").innerHTML = "";

    console.log(data);

    if (data.length != 0) {

        for (var i=0; i < data.length; i++){

            data[i].closing_date = data[i].closing_date.split(/[- :]/);
            data[i].closing_date = new Date(data[i].closing_date[0], data[i].closing_date[1]-1, data[i].closing_date[2], data[i].closing_date[3], data[i].closing_date[4], data[i].closing_date[5]);
            console.log(data[i].closing_date);

            var s = "";
            s += "<div onclick='retrieveOne( this.dataset );' class='col-md-6' data-contest='" + data[i].project_id +"' >" +
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
                "<span>Days Remaining</span>" + "<br>" +
                "<span class='prize'>"+ countdown(data[i].closing_date , null, countdown.DAYS) +"</span>" +
                "</div>" +
                "<div class='col-xs-4 text-xs-right'>"+
                "<span>Prize</span>" + "<br>" +
                "<span class='prize'>$"+ data[i].prize +"</span>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</a>"+
                "</div>"+
                "</div>";

            document.getElementById("activerow").innerHTML +=s;
        }
    }else {

        document.getElementById("active").innerHTML = "";
        document.getElementById("active").classList.add('cnt-center');


        var s = "";
        s +=
            "<p>There are currently no active contests.</p>";


        document.getElementById("active").innerHTML += s;


    }
}
