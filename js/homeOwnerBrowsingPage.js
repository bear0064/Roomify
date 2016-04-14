document.addEventListener("DOMContentLoaded", function () {
    retrieveAllDesigners();


    $(".dropdown-item").on("click", function () {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });


});

function retrieveAllDesigners() {
    let getMe = 'designers';
    let data = new FormData();
    data.append("getAllDesigners", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getAllDesigners.php", data, getAllDesigners);
}

//Get contests from DB
function getAllDesigners(data) {

    document.getElementById("allDes").innerHTML = "";
    console.log(data.users);

    if (data.users.length != 0) {

        for (let i = 0; i < data.users.length; i++) {

            var s = "";
            s +=
                "<div class='col-md-6'>" +
                    "<div class='card designerCard'>" +
                        "<img class='card-img-top' src='"+ data.users[i].u_photoURL +"' width='100%' alt='Card image cap'>" +
                        "<div class='card-block'>" +
                            "<h6 class='card-title pull-xs-left'><a href='homeowner-view-designerProfile.html'>"+ data.users[i].u_username +"</a></h6>" +
                            "<div class='pull-xs-right'>" +
                                "<a href='#' class='link-like'><span class='number-like'>21</span><i class='fa fa-heart-o'></i></a>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>";

            document.getElementById("allDes").innerHTML += s;
        }
    } 
}

