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

    if (data[0] == null){
        //TODO this is to prevent someone who may trip over an incorrect ID or tampers with that
        console.log('error');
    }

    
    data[0].closing_date = data[0].closing_date.split(/[- :]/);
    data[0].closing_date = new Date(data[0].closing_date[0], data[0].closing_date[1]-1, data[0].closing_date[2], data[0].closing_date[3], data[0].closing_date[4], data[0].closing_date[5]);


    var a = "";
    a +=
        "<div class='tab-price'>"+
            "<div class='tabs item-left'>"+
                "<h4>" + data[0].project_title +"</h4>"+
                    //TODO get the homeowner name related to the profile
                "<p>Created by: <a href='designer-view-homeownerProfile.php' data-user='" + data[0].user_id +"'>"+ data[0].username  +"</a></p>"+
                "<ul id='roomFeats' class='pager'>"+
                    "<li class='label label-pill room'>"+data[0].rooms[0].room_type+"</li>"+
                "</ul>"+
            "</div>"+
            "<div class='price item-right'>"+
            "<div class='price-unit'>$"+ data[0].prize +"</div>"+
            "<div class='time'>"+countdown(data[0].closing_date , null, countdown.DAYS)+"</div>"+
        "</div>"+
        "<div class='clear'></div>"+
        "</div>";

    document.getElementById("contBrief").innerHTML +=a;

    for (let k=0; k < data[0].rooms.length; k++) {

        var y = "";
        y +=


            "<li class='label label-pill'>"+data[0].rooms[k].feature_name+"</li>";

        document.getElementById("roomFeats").innerHTML +=y;

    }


    var b = "";
    b +=
        "<div id='imgLoop' class='gallery js-flickity'>" +


        "</div>";

    document.getElementById("imageSlider").innerHTML +=b;

    for (let j=0; j < data[0].rooms.length; j++) {

        var x = "";
        x +=

            "<img src='upload/" + data[0].rooms[j].filename.slice(0, - 2) + "."+ data[0].rooms[j].filetype.substring(6) +" ' alt='' />"

        document.getElementById("imgLoop").innerHTML +=x;

    }


    var elem = document.querySelector('.gallery');
    var flkty = new Flickity( elem, {
        // options
        imagesLoaded:true,
        percentPosition: false,
        wrapAround: true

    });





    var c = "";
    c +=
    "<div class='title'>"+data[0].project_title+"</div>"+
    "<div class='detail'>"+
        "<p>"+data[0].project_desc+"</p>"+
    "</div>";

    document.getElementById("contestInfo").innerHTML +=c;



    var d = "";
    d +=
    "<div class='title'> Room Dimensions </div>"+
    "<div class='detail'>"+
    "<p class='last-child'>"+ data[0].rooms[0].room_length +" x " + data[0].rooms[0].room_width + " x " + data[0].rooms[0].rooms_height +"</p>"+
    "</div>";

    document.getElementById("sideInfo").innerHTML +=d;

    var e = '';
    e +=
        "<li><a onclick='submitTo( this.dataset.contest );' data-toggle='modal' data-target='#submissionModal' data-contest='" + data[0].project_id +"' >Submit</a></li>";
    document.getElementById("designerSubmit").innerHTML +=e;

}

function submitTo(contest){
  console.log(contest);
    localStorage.setItem('contestId', contest);

//    location.assign("http://localhost:8888/newRaumJS/designer-contest.php");

}