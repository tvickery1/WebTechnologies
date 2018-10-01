$(document).ready(function () {
    $("#btnMessage").click(function() { // send a new message to db
       var outData = {};
       outData['action'] = "sendMsg";
       outData['message'] = $("#message").val();
       
       AjaxPostJson('messages.php', outData, SentData);
    });
    
    $("#btnShow").click(Refresh);
    Refresh();
});
function Refresh(){
    var outData = {}; 
        outData['action'] = "show";
        outData['search'] = $("#filter").val();
        
        AjaxPostJson( 'messages.php', outData, GotData );
}
function GotData( newData, retStatus ){
    console.log(retStatus);
    $("#outDiv").html("");
    $("#tablehead").html("");
    $("#tablebody").html("");
    $("#tablehead").append("<th>username </th><th>message </th><th>timestamp</th>");
    for(i = 0; i < newData.length; i++)
    {
        $("#tablebody").append("<tr>");
        $("#tablebody").append("<td>" + newData[i]['username'] + "</td>" );
        $("#tablebody").append("<td>" + newData[i]['msg'] + "</td>" );
        $("#tablebody").append("<td>" + newData[i]['stamp'] + "</td>" );
        $("#tablebody").append("</tr>");
    }
}
function SentData(data, retStatus ){
    console.log(retStatus);
    $("#outDiv").append( data );
    
}