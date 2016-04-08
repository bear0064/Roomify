function submitTo(id){


}

function imagesModal(){

    let form = document.getElementById('uploadForm');
    let dropZone = document.getElementById('dropZone');

    let startUpload = function(files) {
        

        let data = new FormData();
        data.append("SelectedFile", files[0]);

        dataRequest("api/fileUpload.php", data, function(response){

            if (response.code == 0){

                //add file to project files object
                roomSelections[currentRoom].roomFiles.push({
                    name: response.fileName,
                    originalName: files[0].name,
                    type: files[0].type,
                    size: files[0].size,
                    caption: ""
                });

                console.log(uploadList.childElementCount);

                let targetDiv = uploadList.querySelector('[data-name="'+files[0].name+'"');

                setTimeout(function(){
                    let progB = targetDiv.querySelector("p.progBar");
                    progB.classList.add("success");
                }, 2000);

                setTimeout(function(){
                    let span = targetDiv.querySelector("span.hidden");
                    span.classList.remove("hidden");
                    let thumb = targetDiv.querySelector(".myThumb");
                    thumb.src = "upload/" + response.fileName;
                    let w = $('.myThumb').last().width();
                    $('.myThumb').css({'height': w +'px'});


                },4500);

                console.log(roomSelections);

            }else{
                console.log(response.message);

                //TODO file type not supported
            }
        });

    }

    form.addEventListener('submit', function(e) {
        let uploadFiles = document.getElementById('uploadFiles').files;
        e.preventDefault()

        if (uploadFiles.length > 0 && oneFileBool){
            oneFileBool = false;
            console.log("UPLOAD NOW");
            startUpload(uploadFiles);
        }

    });

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}