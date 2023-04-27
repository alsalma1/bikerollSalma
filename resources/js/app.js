//window.onload = uploadFiles;

function uploadFiles(){
    var files = document.getElementById('file_upload').files;
    var dropZone = document.querySelector('upload-container');
    if(files.length==0){
        alert("Please first choose or drop any file(s)...");
        return;
    }
    var filenames="";
    for(var i=0;i<files.length;i++){
        filenames=files[i].name;
    }
    alert("Selected file(s) :\n____________________\n"+filenames);
    var img = document.createElement('img');
    img.src = './resources/pic/'+filenames;
    dropZone.appendChild(img);
}