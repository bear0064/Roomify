document.addEventListener("DOMContentLoaded", function () {


    $(".sort.dropdown-item").on("click", function() {
        $(".sort.dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#dropDownName")[0].innerHTML = this.innerHTML;

    });

    $(".filter.dropdown-item").on("click", function() {
        $(".filter.dropdown-item").removeClass("active");
        $(this).addClass("active");
        $("#filterDropDownName")[0].innerHTML = this.innerHTML;

    });
    
    
    retrieveDesignerActive();
    retrieveDesignerCompleted();
});



function retrieveDesignerActive() {
    let getMe = 'designersActive';
    let data = new FormData();
    data.append("designersActive", getMe);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerActive.php", data, getAllDesignerActiveprojects);
}

function getAllDesignerActiveprojects(data) {

    console.log(data);

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

            document.getElementById("activerow").innerHTML +=s;
        }
    }else {

        document.getElementById("active").innerHTML = "";
        document.getElementById("active").classList.add('cnt-center');


        var s = "";
        s +=
        "<p>You have no active contests.</p>"+
        "<p>Browse contests <a href='designer-browse.html'>here</a></p>";


        document.getElementById("active").innerHTML += s;

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


    document.getElementById("completedrow").innerHTML = "";


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



            document.getElementById("completedrow").innerHTML +=s;
        }
    }else if (data.length == 0) {


        document.getElementById("completed").innerHTML = "";
        document.getElementById("completed").classList.add('cnt-center');

        var s = "";
        s +=
            "<p>You have no completed contests.</p>"+
            "<p>Browse contests <a href='designer-browse.php'>here</a></p>";

        document.getElementById("completed").innerHTML += s;
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

    document.getElementById("activerow").innerHTML = "";

    console.log(data);

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

            document.getElementById("activerow").innerHTML +=s;
        }
    }else {
        
        document.getElementById("active").innerHTML = "";
        document.getElementById("active").classList.add('cnt-center');


        var s = "";
        s +=
            "<p>You have no active contests.</p>"+
            "<p>Browse contests <a href='designer-browse.html'>here</a></p>";


        document.getElementById("active").innerHTML += s;


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
