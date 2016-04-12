"use strict";


//this function is called when the selection box sort value is changed
function setSortDesignerBrowse(event){

    let sortBy = event.target.innerHTML;
    let data = new FormData();
    data.append("sort", sortBy);
    //calls the data request function passing in desired url, parameters, and the function to fire upon callback
    dataRequest("api/designerSort.php", data, showSortedContests);
}


//display the sorted contests when a sort method is clicked
function showSortedContests(data){

    document.getElementById("row").innerHTML = "";

    console.log(data);
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

            "<img class='card-img-top' src='upload/" + data[i].rooms[0].files[0].filename.slice(0, - 2) + "."+ data[i].rooms[0].files[0].filetype.substring(6) +" ' width='100%' alt='Card image cap'>" +
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
}