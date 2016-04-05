document.addEventListener("DOMContentLoaded", function() {
    passSingleContestId();
});

function passSingleContestId(){

    let contest = localStorage.getItem('contestId');
    
    let data = new FormData();
    data.append("id", contest);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/singleContest.php", data, showSingleContest);

}

function showSingleContest(data){
console.log(data);

    if (data.contestDetails[0] == null){
        //TODO this is to prevent someone who may trip over an incorrect ID or tampers with that
        console.log('error');
    }

    
    data.contestDetails[0].cl_date = data.contestDetails[0].cl_date.split(/[- :]/);
    data.contestDetails[0].cl_date = new Date(data.contestDetails[0].cl_date[0], data.contestDetails[0].cl_date[1]-1, data.contestDetails[0].cl_date[2], data.contestDetails[0].cl_date[3], data.contestDetails[0].cl_date[4], data.contestDetails[0].cl_date[5]);


    var a = "";
    a +=
        "<div class='tab-price'>"+
            "<div class='tabs item-left'>"+
                "<h4>" + data.contestDetails[0].c_name +"</h4>"+
                    //TODO get the homeowner name related to the profile
                    //TODO INNER JOIN to get this
                "<p>Created by: <a href='designer-view-homeownerProfile.php'>Mike Z</a></p>"+
                "<ul class='pager'>"+
                    //TODO get the room labels
                    "<li class='label label-pill room'>Bathroom</li>"+
                    "<li class='label label-pill'>Flooring</li>"+
                    "<li class='label label-pill'>Textiles</li>"+
                "</ul>"+
            "</div>"+
            "<div class='price item-right'>"+
            "<div class='price-unit'>$"+ data.contestDetails[0].c_prize +"</div>"+
            "<div class='time'>"+countdown(data.contestDetails[0].cl_date , null, countdown.DAYS)+"</div>"+
        "</div>"+
        "<div class='clear'></div>"+
        "</div>";

    document.getElementById("contBrief").innerHTML +=a;



    var b = "";
    b +=
        "<div class='gallery js-flickity'>" +

            //TODO loop for each image add an extra image...

            "<img src='images/slider/1.png' alt='orange tree' />"+
            "<img src='images/slider/1.png' alt='submerged' />"+
            "<img src='images/slider/1.png' alt='look-out' />"+
        "</div>";


    document.getElementById("imageSlider").innerHTML +=b;

    var elem = document.querySelector('.gallery');
    var flkty = new Flickity( elem, {
        // options
        imagesLoaded:true,
        percentPosition: false,
        wrapAround: true

    });


    var c = "";
    c +=
    "<div class='title'>"+data.contestDetails[0].c_name+"</div>"+
    "<div class='detail'>"+
        "<p>"+data.contestDetails[0].c_desc+"</p>"+
    "</div>";

    document.getElementById("contestInfo").innerHTML +=c;



    var d = "";
    d +=
    "<div class='title'> Room Dimensions </div>"+
    "<div class='detail'>"+
    "<p class='last-child'>width x length x height</p>"+
    "</div>";

    document.getElementById("sideInfo").innerHTML +=d;

    var e = '';
    e +=
        "<li><a onclick='submitTo( this.dataset.contest );' data-contest='" + data.contestDetails[0].c_id +"' >Submit</a></li>";
    document.getElementById("designerSubmit").innerHTML +=e;

}

function submitTo(contest){
  console.log(contest);
    localStorage.setItem('contestId', contest);

//    location.assign("http://localhost:8888/newRaumJS/designer-contest.php");

}