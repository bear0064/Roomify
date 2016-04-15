"use strict";
let subData;

document.addEventListener("DOMContentLoaded", function () {
    passDesigner();



    $(".dropdown-item").on("click", function () {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });
});

function passDesigner() {

    let user = localStorage.getItem('designerId');

    let data = new FormData();
    data.append("userId", user);

    //dataRequest("api/getHoDet.php", data, showShowcase);
    dataRequest("api/getDesSub.php", data, showDesignerSubmissions);
    dataRequest("api/userFetch.php", data, showDesignerDetails);

}

function showShowcase(data) {

    console.log(data);

    if (data.length != 0) {

    } else {

        document.getElementById("showcase").innerHTML = "";
        document.getElementById("showcase").classList.add('cnt-center');


        var s = "";
        s +=
            "<p>This designer has no showcase items.</p>";

        document.getElementById("showcase").innerHTML += s;

    }


}

function showDesignerSubmissions(data) {

    subData = data;

    console.log(data);

    if (data.length != 0) {

        for (let i=0; i < data.length; i++){

            var s = "";
            s +=

                "<div class='col-md-6'>"+
                "<div class='card submissionCard'>"+
                "<a href='#' data-toggle='modal' data-target='#submissionView' data-id='" + data[i].submission_id + "' onclick='showFullSize(this.dataset.id);'>"+
                "<img class='card-img-top' src='upload/"+ data[i].filename +"' width='100%' alt='Card image cap'>"+
                "<div class='card-block'>"+
                "<p class='card-text'>"+ data[i].submission_text +"</p>"+
                "<div class='card-fade'></div>"+
                "</div>"+
                "</a>"+
                "</div>"+
                "</div>"+
                "</div>";



            document.getElementById("outputSubmissions").innerHTML +=s;
        }
    }else {

        document.getElementById("outputSubmissions").innerHTML = "";
        document.getElementById("outputSubmissions").classList.add('empty');
        document.getElementById("outputSubmissions").classList.add('cnt-center');


        var s = "";
        s +=
            "<p>This user has not submitted to any contests yet.</p>"+
            "<p>Invite them to your next design.</p>";


        document.getElementById("outputSubmissions").innerHTML += s;

    }
}

function showDesignerDetails(data) {

    console.log(data);

    var s = "";
    s += "<div class='pull-left' href='#'>"+
        "<img class='media-object img-circle img-thumbnail img-thumbnail-custom' src='"+ data.users[0].u_photoURL +"' alt='avatar' style='width: 125px;height:125px;'>"+
        "</div>"+
        "<div class='media-body' style='padding-left: 20px'>"+
        "<br>"+
        "<p><span class='name'>"+ data.users[0].u_username +"</span></p>"+
        "<p>"+
        "English"+
        "<br> America"+
        "</p>"+
        "</div>";


    document.getElementById("designerProfile").innerHTML += s;



}

function desSortDesignerSubmissions(data){
    var sortBy = event.target.innerHTML;
    let uId = localStorage.getItem('designerId');

    let desData = new FormData();
    desData.append("sortDesMethod", sortBy);
    desData.append("userDes", uId);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/desVdes.php", desData, desGetDesignerSubs);

}

function desGetDesignerSubs(data){

    document.getElementById("outputSubmissions").innerHTML = "";

    if (data.length != 0) {

        for (let i=0; i < data.length; i++){

            var s = "";
            s +=

                "<div class='col-md-6'>"+
                "<div class='card submissionCard' data-id='" + data[i].submission_id + "' onclick='showFullSize(this.dataset.id);'>"+
                "<a href='#'>"+
                "<img class='card-img-top' src='upload/"+ data[i].filename +"' width='100%' alt='Card image cap'>"+
                "<div class='card-block'>"+
                "<p class='card-text'>"+ data[i].submission_text +"</p>"+
                "<div class='card-fade'></div>"+
                "</div>"+
                "</a>"+
                "</div>"+
                "</div>"+
                "</div>";

            document.getElementById("outputSubmissions").innerHTML +=s;
        }
    }else {

        document.getElementById("submissions").innerHTML = "";
        document.getElementById("submissions").classList.add('empty');
        document.getElementById("submissions").classList.add('cnt-center');


        var s = "";
        s +=
            "<p>This Designer has not made a submission to a contest.</p>";



        document.getElementById("submissions").innerHTML += s;

    }

}

function showFullSize(id){

    let thisSub;

    for (let i=0;i<subData.length;i++){

        if (subData[i].submission_id == id){

            thisSub = subData[i];
        }

    }


    let img = document.getElementById("submissionImage");
    let text = document.getElementById("submissionText");

    img.src = "upload/"+thisSub[0].filename;
    text.innerHTML = thisSub[0].submission_text;



}
