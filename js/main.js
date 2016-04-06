"use strict";


//this function is called when the selection box sort value is changed
function setSortDesignerBrowse(event){

    let sortBy = event.target.innerHTML;
    let data = new FormData();
    data.append("sort", sortBy);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/main.php", data, showSortedContests);
}

//function to handle all server side data requests
function dataRequest(url, params, callback){
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);


    xhr.addEventListener("load", function(){
       callback(JSON.parse(xhr.responseText));
    });


    xhr.send(params);
}


//display the sorted contests when a sort method is clicked
function showSortedContests(data){

        document.getElementById("row").innerHTML = "";
        console.log("show me: " + data);

    for (let i=0; i < data.contests.length; i++){

        data.contests[i].cl_date = data.contests[i].cl_date.split(/[- :]/);
        data.contests[i].cl_date = new Date(data.contests[i].cl_date[0], data.contests[i].cl_date[1]-1, data.contests[i].cl_date[2], data.contests[i].cl_date[3], data.contests[i].cl_date[4], data.contests[i].cl_date[5]);
        console.log(data.contests[i].cl_date);

        var s = "";
        s += "<div onclick='retrieveOne( this.dataset.contest );' class='col-md-6' data-contest='" + data.contests[i].c_id +"' >" +
                "<div class='card'>" +
                    "<a >" +
                        "<div class='image-wrapper overlay-fade-in'>" +
                            "<img class='card-img-top' src='images/slider/1.png' width='100%' alt='Card image cap'>" +
                                "<div class='image-overlay-content'>" +
                                    "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                                    "<div class='specs pull-xs-right'>" +
                                    //TODO Get the number of designs in a project
                                        "<p class=''>2 designs</p>"+
                                        "<p class=''>"+ countdown(data.contests[i].cl_date , null, countdown.DAYS) +"</p>" +
                                    "</div>" +
                                    "<h6 class='pull-xs-left'>" +
                                    //TODO Get the room names
                                    "<span class='label'>Bedroom</span>" +
                                    "<span class='label'>Bathroom</span>" +
                                    "</h6>" +
                                "</div>" +
                        "</div>" +
                        "<div class='card-block'>" +
                            "<h6 class='card-title pull-xs-right prize'>$"+ data.contests[i].c_prize +"</h6>" +
                            "<h5 class='card-title pull-xs-left'>" + data.contests[i].c_name +"</h5>" +
                        "</div>" +
                        "<div class='card-block'>" +
                            "<p class='card-text'>"+ data.contests[i].c_desc +"</p>" +
                            "<div class='card-fade'></div>" +
                        "</div>"+
                    "</a>"+
                "</div>"+
            "</div>";

        document.getElementById("row").innerHTML +=s;
    }
}

function retrieveOne(contest){
    localStorage.setItem('contestId', contest);
    location.assign("http://localhost:8888/newRaumJS/designer-contest.php");
}

//image preview
let loadFile = function(event) {
    let reader = new FileReader();
    reader.onload = function(){
        let output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};


//submission send
let contestSubmission = function() {

    //TODO check for empty values
    //TODO if empty fire an error - else continue
    //TODO if checkbox is not checked, don't submit

    let contestSubObj = {
        submissionDescription: document.getElementById("submissionDesc").value,
        submissionTitle: document.getElementById("submissionTitle").value
    };

    let file = document.getElementById("submissionFile").files[0];

    contestSubObj = JSON.stringify(contestSubObj);

    let data = new FormData();
    data.append("details", contestSubObj);
    data.append('SelectedFile', file);

    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/contestSubmission.php", data, contestSubmissionCallback);

};


let contestSubmissionCallback = function(data) {

    console.log( JSON.stringify(data) );

};