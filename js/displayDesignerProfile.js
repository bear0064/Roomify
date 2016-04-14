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


    console.log(data);

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
