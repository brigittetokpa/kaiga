/**
 * Created by AXEL DJAHA on 24/10/2016.
 */
/*$(function()
{

});*/

function previewFile(){
    var preview = document.getElementById('img'); //selects the query named img
    var inputImg = document.getElementById('inputImg'); //selects the query named img
    var inputTest = document.getElementById('inputTest'); //selects the query named img
    var file    = document.querySelector('input[type=file]').files[0]; //sames as here
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file)
    {
        reader.readAsDataURL(file); //reads the data as a URL
        inputImg.name = "photo";
        inputTest.name = "tof";
    }
    else
    {
        preview.src = "images/icon1.png";
        inputImg.name = "tof";
        inputTest.name = "photo";
    }
}

previewFile();  //calls the function named previewFile()