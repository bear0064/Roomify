document.addEventListener("DOMContentLoaded", function() {
    retrieveDesignerProfile();
    retrieveDesignerSubmissions();

    $(".sort.dropdown-item").on("click", function() {
        $(".sort.dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });

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

        localStorage.setItem('ut', data.users[0].u_currentmode);

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

function retrieveDesignerSubmissions(){
    let getMe = 'designerSubmissions';
    let data = new FormData();
    data.append("designerSubmissions", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getDesSub.php", data, getDesignerSubs);
}


function sortDesignerSubmissions(){
    let sortBy = event.target.innerHTML;
    let data = new FormData();
    data.append("sortMethod", sortBy);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/getDesSub.php", data, getDesignerSubs);

    document.getElementById("outputSubmissions").innerHTML = "";
}


function getDesignerSubs(data){

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

        document.getElementById("submissions").innerHTML = "";
        document.getElementById("submissions").classList.add('empty');
        document.getElementById("submissions").classList.add('cnt-center');


        var s = "";
        s +=
            "<p>You have no submissions currently.</p>";



        document.getElementById("submissions").innerHTML += s;

    }

}