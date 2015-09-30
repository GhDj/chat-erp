var sendto2;
var username;
var y;
var id;



$(document).ready(function()
{
    username = $('#inputId_cu').val();
    $("#inputselect").change(function() {
    	sendto = $("#inputselect").val();
    	sendto2 = sendto[0];
   	    retrieveChatMessages();
   	    $('#chat-window').html('');
        pullData();


    });


    $.ajaxSetup(
	{
   		headers:
    	{
       		'X-CSRF-Token': $('input[name="_token"]').val()
    	}
	});



    $(document).keyup(function(e) {
        if (e.keyCode == 13)
            sendMessage();
    });

});


function pullData()
{
     $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });

    $.post('http://localhost:8000/chat/get/', {user1: username, user2: sendto2}, function(data)
    {
        y = data;
        
        var x = data.length;
            if (data[y.length-1]["id"] != id) {
                id = y[y.length-1]["id"];
                $('#chat-window').append("<br>"+data[data.length-1]["message"]);
            };
        
        
    });
    setTimeout(pullData,3000);
}


function sendMessage()
{
    var te = $('#inputmsg').val();
    var c = $('#name_u1').val();
    var text = c + ' : '+te;

    if (text.length > 0)
    {
        $.post('http://localhost:8000/chat', {id_u1: username, id_u2: sendto2, message: text}, function()
        {
            /*$('#chat-window').append('<br> '+text+'<br>');*/
            $('#inputmsg').val('');

        });
    }
}


function retrieveChatMessages()
{
	   $.ajaxSetup(
	{
   		headers:
    	{
       		'X-CSRF-Token': $('input[name="_token"]').val()
    	}
	});

    $.post('http://localhost:8000/chat/get/', {user1: username, user2: sendto2}, function(data)
    {
        y = data;
        var x = data.length;
        id = y[y.length-1]["id"];
    	for (var i = 0;  data.length > i; i++) {
            
    		$('#chat-window').append("<br>"+data[i]["message"]);
    	};
    	
    });
}