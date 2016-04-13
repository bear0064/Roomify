"use strict";

//function to handle all server side data requests
function dataRequest(url, params, callback){
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);


    xhr.addEventListener("load", function(){
        // console.log(xhr.responseText);

       callback(JSON.parse(xhr.responseText));
    });


    xhr.send(params);
}


function retrieveOne(contest){
    localStorage.setItem('contestId', contest.contest);
    location.assign("http://localhost:8888/newRaumJS/designer-contest.php");
}

function getHomeOwner(homeowner){
    console.log(homeowner);
    localStorage.setItem('homeownerId', homeowner.user);
    location.assign("http://localhost:8888/newRaumJS/designer-view-homeownerProfile.php");

}

function retrieveOneHoCont(contest){
    localStorage.setItem('contestId', contest.contest);
    location.assign("http://localhost:8888/newRaumJS/homeowner-contest.php");
}


// function getDesigner(designer){
//     console.log(designer);
//     localStorage.setItem('homeownerId', homeowner.user);
//     location.assign("http://localhost:8888/newRaumJS/homeowner-view-designerProfile.php");
//
// }

