document.addEventListener("DOMContentLoaded", function() {
   retrieveAll();


    $(".dropdown-item").on("click", function() {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });



});

function retrieveAll(){
    let getMe = 'all';
    let data = new FormData();
    data.append("getAll", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getAllContests.php", data, getAllContests);
}


//Get contests from DB
function getAllContests(data){

    document.getElementById("row").innerHTML = "";
    console.log( data.contests);


    for (let i=0; i < data.contests.length; i++){





        data.contests[i].c_closing_date = data.contests[i].c_closing_date.split(/[- :]/);
        data.contests[i].c_closing_date = new Date(data.contests[i].c_closing_date[0], data.contests[i].c_closing_date[1]-1, data.contests[i].c_closing_date[2], data.contests[i].c_closing_date[3], data.contests[i].c_closing_date[4], data.contests[i].c_closing_date[5]);
        console.log(data.contests[i].c_closing_date);

        var s = "";
        s += "<div onclick='retrieveOne( this.dataset.contest );' class='col-md-6' data-contest='" + data.contests[i].c_project_id +"' >" +
                "<div class='card'>" +

                    //TODO get the link to work
            "<a >" +
                    "<div class='image-wrapper overlay-fade-in'>" +
                                        //TODO Get the image

                        "<img class='card-img-top' src='images/slider/1.png' width='100%' alt='Card image cap'>" +
                                "<div class='image-overlay-content'>" +
                                    "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                                    "<div class='specs pull-xs-right'>" +

                                        // "<p class=''>2 designs</p>"+
                                        "<p class=''>"+ countdown(data.contests[i].c_closing_date , null, countdown.DAYS) +"</p>" +
                                    "</div>" +
                                    "<h6 class='pull-xs-left'>" +

                                        //TODO Get the room names in a for loop
                                        "<span class='label'>Bedroom</span>" +
                                        "<span class='label'>Bathroom</span>" +
                                    "</h6>" +
                                    "</div>" +
                                "</div>" +
                                "<div class='card-block'>" +
                                    "<h6 class='card-title pull-xs-right prize'>$"+ data.contests[i].c_prize +"</h6>" +
                                    "<h5 class='card-title pull-xs-left'>" + data.contests[i].c_project_title +"</h5>" +
                                "</div>" +
                                "<div class='card-block'>" +
                                    "<p class='card-text'>"+ data.contests[i].c_project_desc +"</p>" +
                                    "<div class='card-fade'></div>" +
                                "</div>"+
                    "</a>"+
                "</div>"+
            "</div>";


        
        document.getElementById("row").innerHTML +=s;
    }
}



