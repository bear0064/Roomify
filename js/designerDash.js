document.addEventListener("DOMContentLoaded", function () {


    $(".dropdown-item").on("click", function() {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });

    retrieveDesignerActive();
    
});


function setActive() {
    console.log(true);
    retrieveDesignerActive();
}

function setCompleted() {
    console.log(true);
    //fire off a get to the server return the results, else nothing
    //document.getElementById("active").innerHTML = "";
    //document.getElementById("dashOutput").innerHTML = "";
    document.getElementById("completed").innerHTML = "";

    var s = "";
    s += "<p>You have no completed contests.</p>"+
        "<p>Browse contests <a href='designer-browse.php'>here</a></p>";



    document.getElementById("completed").innerHTML += s;


}


function retrieveDesignerActive() {
    let getMe = 'designersActive';
    let data = new FormData();
    data.append("designersActive", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerActive.php", data, getAllDesignerActiveprojects);
}


//Get projects from DB
function getAllDesignerActiveprojects(data) {

    console.log(data);



    //let output = document.querySelector("[class='dropdown-category cnt-right']");

    document.getElementById("row").innerHTML = "";
    console.log(data.projects);
    console.log(data.projects.length);

    if (data.projects.length != 0) {

        for (let i = 0; i < data.projects.length; i++) {


            data.projects[i].u_closing_date = data.projects[i].u_closing_date.split(/[- :]/);
            data.projects[i].u_closing_date = new Date(data.projects[i].u_closing_date[0], data.projects[i].u_closing_date[1] - 1, data.projects[i].u_closing_date[2], data.projects[i].u_closing_date[3], data.projects[i].u_closing_date[4], data.projects[i].u_closing_date[5]);
            console.log(data.projects[i].u_closing_date);

            var s = "";
            s += "<div onclick='retrieveOne( this.dataset.contest );' class='col-md-6' data-contest='" + data.projects[i].u_project_id + "' >" +
                "<div class='card'>" +

                //TODO get the link to work
                "<a >" +
                "<div class='image-wrapper overlay-fade-in'>" +
                //TODO Get the image

                "<img class='card-img-top' src='images/slider/1.png' width='100%' alt='Card image cap'>" +
                "<div class='image-overlay-content'>" +
                "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                "<div class='specs pull-xs-right'>" +
                //TODO Get the number of designs in a project

                "<p class=''>2 designs</p>" +
                "<p class=''>" + countdown(data.projects[i].u_closing_date, null, countdown.DAYS) + "</p>" +
                "</div>" +
                "<h6 class='pull-xs-left'>" +

                //TODO Get the room names in a for loop
                "<span class='label'>Bedroom</span>" +
                "<span class='label'>Bathroom</span>" +
                "</h6>" +
                "</div>" +
                "</div>" +
                "<div class='card-block'>" +
                "<h6 class='card-title pull-xs-right prize'>$" + data.projects[i].u_prize + "</h6>" +
                "<h5 class='card-title pull-xs-left'>" + data.projects[i].u_project_title + "</h5>" +
                "</div>" +
                "<div class='card-block'>" +
                "<p class='card-text'>" + data.projects[i].u_project_desc + "</p>" +
                "<div class='card-fade'></div>" +
                "</div>" +
                "</a>" +
                "</div>" +
                "</div>";


            document.getElementById("row").innerHTML += s;
        }
    }else {


        document.getElementById("active").innerHTML = "";
        document.getElementById("dashOutput").innerHTML = "";


        var s = "";
        s += "<div id='active' class='tab-pane fade in active cnt-center'>"+
        "<p>You have no active contests.</p>"+
        "<p>Browse contests <a href='designer-browse.php'>here</a></p>"+
        "</div>";



        document.getElementById("dashOutput").innerHTML += s;

    }

}



//this function is called when the selection box sort value is changed
function setSortActiveDesigner(event){

    let sortBy = event.target.innerHTML;
    let data = new FormData();
    data.append("sortActive", sortBy);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerActive.php", data, showActiveSortedContests);
}



//display the sorted contests when a sort method is clicked
function showActiveSortedContests(data){

    document.getElementById("row").innerHTML = "";
    console.log("show me: " + data);

        for (let i = 0; i < data.projects.length; i++) {


            data.projects[i].u_closing_date = data.projects[i].u_closing_date.split(/[- :]/);
            data.projects[i].u_closing_date = new Date(data.projects[i].u_closing_date[0], data.projects[i].u_closing_date[1] - 1, data.projects[i].u_closing_date[2], data.projects[i].u_closing_date[3], data.projects[i].u_closing_date[4], data.projects[i].u_closing_date[5]);
            console.log(data.projects[i].u_closing_date);

            var s = "";
            s += "<div onclick='retrieveOne( this.dataset.contest );' class='col-md-6' data-contest='" + data.projects[i].u_project_id + "' >" +
                "<div class='card'>" +

                //TODO get the link to work
                "<a >" +
                "<div class='image-wrapper overlay-fade-in'>" +
                //TODO Get the image

                "<img class='card-img-top' src='images/slider/1.png' width='100%' alt='Card image cap'>" +
                "<div class='image-overlay-content'>" +
                "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                "<div class='specs pull-xs-right'>" +
                //TODO Get the number of designs in a project

                "<p class=''>2 designs</p>" +
                "<p class=''>" + countdown(data.projects[i].u_closing_date, null, countdown.DAYS) + "</p>" +
                "</div>" +
                "<h6 class='pull-xs-left'>" +

                //TODO Get the room names in a for loop
                "<span class='label'>Bedroom</span>" +
                "<span class='label'>Bathroom</span>" +
                "</h6>" +
                "</div>" +
                "</div>" +
                "<div class='card-block'>" +
                "<h6 class='card-title pull-xs-right prize'>$" + data.projects[i].u_prize + "</h6>" +
                "<h5 class='card-title pull-xs-left'>" + data.projects[i].u_project_title + "</h5>" +
                "</div>" +
                "<div class='card-block'>" +
                "<p class='card-text'>" + data.projects[i].u_project_desc + "</p>" +
                "<div class='card-fade'></div>" +
                "</div>" +
                "</a>" +
                "</div>" +
                "</div>";

            document.getElementById("row").innerHTML += s;
        }

}

