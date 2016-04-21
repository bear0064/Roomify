document.addEventListener("DOMContentLoaded", function () {
    retrieveAllDesigners();


    $(".dropdown-item").on("click", function () {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });


});

function retrieveAllDesigners() {
    var getMe = 'designers';
    var data = new FormData();
    data.append("getAllDesigners", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getAllDesigners.php", data, getAllDesigners);
}

//Get contests from DB
function getAllDesigners(data) {

    document.getElementById("allDes").innerHTML = "";
    console.log(data.users);

    if (data.users.length != 0) {

        for (var i = 0; i < data.users.length; i++) {

            var s = "";
            s +=
                "<div onclick='retrieveDesProf( this.dataset );' data-designer='" + data.users[i].u_id +"'  class='col-sm-3'>" +
                    "<div class='card designerCard text-xs-center'>" +
                        "<div class='card-block'>" +
                            "<img class='media-object img-circle img-thumbnail img-thumbnail-custom' style='width: 125px; height:125px; margin:0 auto;' src='"+ data.users[i].u_photoURL +"' width='100%' alt='Card image cap'>" +
                        "</div>" +
                        "<hr>" +
                        "<div class='card-block designerInfo'>" +
                            "<h6 class='card-title'><a href='#' onclick='retrieveDesProf( this.dataset );' data-designer='" + data.users[i].u_id +"' >"+ data.users[i].u_username +"</a></h6>" +
                            "<div class=''>" +
                                "<a href='#' class='link-like'><span class='number-like'>21</span><i class='fa fa-heart-o'></i></a>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>";

            document.getElementById("allDes").innerHTML += s;
        }
    } 
}

