document.addEventListener("DOMContentLoaded", function () {


    $(".dropdown-item").on("click", function() {
        $(".dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });

    retrieveDesignerActive();
    
});


//sets the tab to active
function setActive() {

    document.getElementById("dashOutput").innerHTML = "";

    var a = "";
    a +=
        "<div id='active' class='tab-pane fade in active'>"+
        "<div id='row' class='row'>"+

        "</div>"+
        "</div>";
    document.getElementById("dashOutput").innerHTML += a;



    document.getElementById("dropMenus").innerHTML = "";

    var b = "";
    b +=


        "<div class='btn-group'>" +
        "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+
        "All <span class='caret'></span>"+
        "</button>"+
        "<div class='dropdown-menu' aria-labelledby='dropdownMenu'>"+
        "<a class='dropdown-item' href='#'>Submitted</a>"+
        "<a class='dropdown-item' href='#'>Favourite</a>"+
        "<a class='dropdown-item active' href='#'>All</a>"+
        "</div>"+
        "</div>"+


        "<div class='btn-group'>"+
        "<button type='button' id='dropDownName' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+
        "Newest <span class='caret'></span>"+
        "</button>"+
        "<div class='dropdown-menu' aria-labelledby='dropdownMenu'>"+
        "<a class='dropdown-item active' value='Newest' onclick='setSortActiveDesigner(event);'>Newest</a>"+
        "<a class='dropdown-item' data-dropdown='Oldest' onclick='setSortActiveDesigner(event);'>Oldest</a>"+
        "<a class='dropdown-item' data-dropdown='Highest Prize' onclick='setSortActiveDesigner(event);'>Highest Prize</a>"+
        "<a class='dropdown-item' data-dropdown='Lowest Prize' onclick='setSortActiveDesigner(event);'>Lowest Prize</a>"+
        "</div>"+
        "</div>";

    document.getElementById("dropMenus").innerHTML += b;

    retrieveDesignerActive();
}


//sets the tab to completed
function setCompleted() {

    document.getElementById("dashOutput").innerHTML = "";

    var a = "";
    a +=
        "<div id='active' class='tab-pane fade in active'>"+
        "<div id='row' class='row'>"+

        "</div>"+
        "</div>";
    document.getElementById("dashOutput").innerHTML += a;


    document.getElementById("dropMenus").innerHTML = "";

    var b = "";
    b +=


        "<div class='btn-group'>" +
        "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+
        "All <span class='caret'></span>"+
        "</button>"+
        "<div class='dropdown-menu' aria-labelledby='dropdownMenu'>"+
        "<a class='dropdown-item' href='#'>Submitted</a>"+
        "<a class='dropdown-item' href='#'>Favourite</a>"+
        "<a class='dropdown-item active' href='#'>All</a>"+
        "</div>"+
        "</div>"+


        "<div class='btn-group'>"+
        "<button type='button' id='dropDownName' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+
        "Newest <span class='caret'></span>"+
        "</button>"+
        "<div class='dropdown-menu' aria-labelledby='dropdownMenu'>"+
        "<a class='dropdown-item active' value='Newest' onclick='setSortCompletedDesigner(event);'>Newest</a>"+
        "<a class='dropdown-item' data-dropdown='Oldest' onclick='setSortCompletedDesigner(event);'>Oldest</a>"+
        "<a class='dropdown-item' data-dropdown='Highest Prize' onclick='setSortCompletedDesigner(event);'>Highest Prize</a>"+
        "<a class='dropdown-item' data-dropdown='Lowest Prize' onclick='setSortCompletedDesigner(event);'>Lowest Prize</a>"+
        "</div>"+
        "</div>";

    document.getElementById("dropMenus").innerHTML += b;

    retrieveDesignerCompleted();

}

//retrieves the active contests submitted to
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
    console.log(data);
    console.log(data.length);

    if (data.length != 0) {

        console.log( data );


        for (let i=0; i < data.length; i++){

            data[i].closing_date = data[i].closing_date.split(/[- :]/);
            data[i].closing_date = new Date(data[i].closing_date[0], data[i].closing_date[1]-1, data[i].closing_date[2], data[i].closing_date[3], data[i].closing_date[4], data[i].closing_date[5]);
            console.log(data[i].closing_date);

            var s = "";
            s += "<div onclick='retrieveOne( this.dataset );' class='col-md-6' data-contest='" + data[i].project_id +"' >" +
                "<div class='card'>" +

                //TODO get the link to work
                "<a >" +
                "<div class='image-wrapper overlay-fade-in'>" +
                //TODO Get the image

                "<img class='card-img-top' src='upload/" + data[i].rooms[0].filename.slice(0, - 2) + "."+ data[i].rooms[0].filetype.substring(6) +" ' width='100%' alt='Card image cap'>" +
                "<div class='image-overlay-content'>" +
                "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                "<div class='specs pull-xs-right'>" +

                // "<p class=''>2 designs</p>"+
                "<p class=''>"+ countdown(data[i].closing_date , null, countdown.DAYS) +"</p>" +
                "</div>" +
                "<h6 class='pull-xs-left'>" +
                "<span class='label'>" + data[i].rooms[0].room_type +"</span>" +
                "</h6>" +
                "</div>" +
                "</div>" +
                "<div class='card-block'>" +
                "<h6 class='card-title pull-xs-right prize'>$"+ data[i].prize +"</h6>" +
                "<h5 class='card-title pull-xs-left'>" + data[i].project_title +"</h5>" +
                "</div>" +
                "<div class='card-block'>" +
                "<p class='card-text'>"+ data[i].project_desc +"</p>" +
                "<div class='card-fade'></div>" +
                "</div>"+
                "</a>"+
                "</div>"+
                "</div>";



            document.getElementById("row").innerHTML +=s;
        }
    }else {
        document.getElementById("dashOutput").innerHTML = "";


        var s = "";
        s += "<div id='active' class='tab-pane fade in active cnt-center'>"+
        "<p>You have no active contests.</p>"+
        "<p>Browse contests <a href='designer-browse.php'>here</a></p>"+
        "</div>";



        document.getElementById("dashOutput").innerHTML += s;

    }

}

//sorts designer contests that are active
function setSortActiveDesigner(event){

    let sortBy = event.target.innerHTML;
    let data = new FormData();
    data.append("sortActive", sortBy);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerActive.php", data, showActiveSortedContests);
}

//display the sorted active contests when a sort method is clicked
function showActiveSortedContests(data){

    document.getElementById("dashOutput").innerHTML = "";

    var a = "";
    a +=
        "<div id='active' class='tab-pane fade in active'>"+
        "<div id='row' class='row'>"+

        "</div>"+
        "</div>";
    document.getElementById("dashOutput").innerHTML += a;

    if (data.length != 0) {

        console.log( data );


        for (let i=0; i < data.length; i++){

            data[i].closing_date = data[i].closing_date.split(/[- :]/);
            data[i].closing_date = new Date(data[i].closing_date[0], data[i].closing_date[1]-1, data[i].closing_date[2], data[i].closing_date[3], data[i].closing_date[4], data[i].closing_date[5]);
            console.log(data[i].closing_date);

            var s = "";
            s += "<div onclick='retrieveOne( this.dataset );' class='col-md-6' data-contest='" + data[i].project_id +"' >" +
                "<div class='card'>" +

                //TODO get the link to work
                "<a >" +
                "<div class='image-wrapper overlay-fade-in'>" +
                //TODO Get the image

                "<img class='card-img-top' src='upload/" + data[i].rooms[0].filename.slice(0, - 2) + "."+ data[i].rooms[0].filetype.substring(6) +" ' width='100%' alt='Card image cap'>" +
                "<div class='image-overlay-content'>" +
                "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                "<div class='specs pull-xs-right'>" +

                // "<p class=''>2 designs</p>"+
                "<p class=''>"+ countdown(data[i].closing_date , null, countdown.DAYS) +"</p>" +
                "</div>" +
                "<h6 class='pull-xs-left'>" +
                "<span class='label'>" + data[i].rooms[0].room_type +"</span>" +
                "</h6>" +
                "</div>" +
                "</div>" +
                "<div class='card-block'>" +
                "<h6 class='card-title pull-xs-right prize'>$"+ data[i].prize +"</h6>" +
                "<h5 class='card-title pull-xs-left'>" + data[i].project_title +"</h5>" +
                "</div>" +
                "<div class='card-block'>" +
                "<p class='card-text'>"+ data[i].project_desc +"</p>" +
                "<div class='card-fade'></div>" +
                "</div>"+
                "</a>"+
                "</div>"+
                "</div>";



            document.getElementById("row").innerHTML +=s;
        }
    }else {
        document.getElementById("dashOutput").innerHTML = "";


        var s = "";
        s += "<div id='active' class='tab-pane fade in active cnt-center'>"+
            "<p>You have no active contests.</p>"+
            "<p>Browse contests <a href='designer-browse.php'>here</a></p>"+
            "</div>";



        document.getElementById("dashOutput").innerHTML += s;

    }

}

function retrieveDesignerCompleted() {
    let getMe = 'designersActive';
    let data = new FormData();
    data.append("designersCompleted", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerCompleted.php", data, getAllDesignerCompletedprojects);
}

function getAllDesignerCompletedprojects(data) {


    document.getElementById("row").innerHTML = "";


    console.log(data.length);

    if (data.length != 0) {

        console.log( data );


        for (let i=0; i < data.length; i++){

            data[i].closing_date = data[i].closing_date.split(/[- :]/);
            data[i].closing_date = new Date(data[i].closing_date[0], data[i].closing_date[1]-1, data[i].closing_date[2], data[i].closing_date[3], data[i].closing_date[4], data[i].closing_date[5]);
            console.log(data[i].closing_date);

            var s = "";
            s += "<div onclick='retrieveOne( this.dataset );' class='col-md-6' data-contest='" + data[i].project_id +"' >" +
                "<div class='card'>" +

                //TODO get the link to work
                "<a >" +
                "<div class='image-wrapper overlay-fade-in'>" +
                //TODO Get the image

                "<img class='card-img-top' src='upload/" + data[i].rooms[0].filename.slice(0, - 2) + "."+ data[i].rooms[0].filetype.substring(6) +" ' width='100%' alt='Card image cap'>" +
                "<div class='image-overlay-content'>" +
                "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                "<div class='specs pull-xs-right'>" +

                // "<p class=''>2 designs</p>"+
                "<p class=''>"+ countdown(data[i].closing_date , null, countdown.DAYS) +"</p>" +
                "</div>" +
                "<h6 class='pull-xs-left'>" +
                "<span class='label'>" + data[i].rooms[0].room_type +"</span>" +
                "</h6>" +
                "</div>" +
                "</div>" +
                "<div class='card-block'>" +
                "<h6 class='card-title pull-xs-right prize'>$"+ data[i].prize +"</h6>" +
                "<h5 class='card-title pull-xs-left'>" + data[i].project_title +"</h5>" +
                "</div>" +
                "<div class='card-block'>" +
                "<p class='card-text'>"+ data[i].project_desc +"</p>" +
                "<div class='card-fade'></div>" +
                "</div>"+
                "</a>"+
                "</div>"+
                "</div>";



            document.getElementById("row").innerHTML +=s;
        }
    }else if (data.length == 0) {

        console.log('hurr');

        document.getElementById("dashOutput").innerHTML = "";

        var s = "";
        s +=
            "<div id='completed' class='tab-pane fade in active cnt-center'>"+
            "<p>You have no completed contests.</p>"+
            "<p>Browse contests <a href='designer-browse.php'>here</a></p>"+
            "</div>"
        ;

        document.getElementById("dashOutput").innerHTML += s;
    }

}

//sorts designer contests that are completed
function setSortCompletedDesigner(event){

    let sortBy = event.target.innerHTML;
    let data = new FormData();
    data.append("sortActive", sortBy);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerCompleted.php", data, showCompletedSortedContests);
}

//display the sorted completed contests when a sort method is clicked
function showCompletedSortedContests(data){

    console.log(data);

    document.getElementById("row").innerHTML = "";

    if (data.length != 0) {

            for (let i=0; i < data.length; i++){

                data[i].closing_date = data[i].closing_date.split(/[- :]/);
                data[i].closing_date = new Date(data[i].closing_date[0], data[i].closing_date[1]-1, data[i].closing_date[2], data[i].closing_date[3], data[i].closing_date[4], data[i].closing_date[5]);
                console.log(data[i].closing_date);

                var s = "";
                s += "<div onclick='retrieveOne( this.dataset );' class='col-md-6' data-contest='" + data[i].project_id +"' >" +
                    "<div class='card'>" +

                    //TODO get the link to work
                    "<a >" +
                    "<div class='image-wrapper overlay-fade-in'>" +
                    //TODO Get the image

                    "<img class='card-img-top' src='upload/" + data[i].rooms[0].filename.slice(0, - 2) + "."+ data[i].rooms[0].filetype.substring(6) +" ' width='100%' alt='Card image cap'>" +
                    "<div class='image-overlay-content'>" +
                    "<h2><i class='fa fa-star-o'></i><i class='fa fa-check-circle-o'></i></h2>" +
                    "<div class='specs pull-xs-right'>" +

                    // "<p class=''>2 designs</p>"+
                    "<p class=''>"+ countdown(data[i].closing_date , null, countdown.DAYS) +"</p>" +
                    "</div>" +
                    "<h6 class='pull-xs-left'>" +
                    "<span class='label'>" + data[i].rooms[0].room_type +"</span>" +
                    "</h6>" +
                    "</div>" +
                    "</div>" +
                    "<div class='card-block'>" +
                    "<h6 class='card-title pull-xs-right prize'>$"+ data[i].prize +"</h6>" +
                    "<h5 class='card-title pull-xs-left'>" + data[i].project_title +"</h5>" +
                    "</div>" +
                    "<div class='card-block'>" +
                    "<p class='card-text'>"+ data[i].project_desc +"</p>" +
                    "<div class='card-fade'></div>" +
                    "</div>"+
                    "</a>"+
                    "</div>"+
                    "</div>";



                document.getElementById("row").innerHTML +=s;
            }
        }else {
            document.getElementById("dashOutput").innerHTML = "";


            var s = "";
            s +=
                "<div id='completed' class='tab-pane fade in active cnt-center'>"+
                "<p>You have no completed contests.</p>"+
                "<p>Browse contests <a href='designer-browse.php'>here</a></p>"+
                "</div>"
            ;



            document.getElementById("dashOutput").innerHTML += s;
        }
    }

