/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
  $("#btnShow").click(function () {
    var outData = {}; // make empty anonymous js object, fill like dictionary
    outData['action'] = "show";
    outData['search'] = "s";
    AjaxPostJson( 'index.php', outData, GotData );
    });
});
function GotData( newData, retStatus ){
    console.log( newData );
    $("#outDiv").append( newData );
}
function ProcessGrades(myData, myStatus)
{
    console.log( myData );
    
}