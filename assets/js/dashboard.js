$(document).ready(function() {
	var url_prefix = "http://localhost";
	$(".pointer").click(function() {
		console.log("hello");
		var id = $(this).attr("msgid");
		console.log($(this).attr("msgid"));
		$.get(url_prefix + "/inbox/read?msgid=" + id, function() {
		})
		.success(function(data) {
			var json = $.parseJSON(data);
	        for (var i = 0; i < json.length; ++i) {
	            $("#sender").empty();
	            $("#timestamp").empty();
	            $("#email").empty();
	            $("#msg").empty();
	            $("#sender").append("<strong>From: </strong>" + json[i].sender);
	            $("#timestamp").append("<strong>Date and time: </strong>" + json[i].time_stamp);
	            $("#email").append("<strong>Email: </strong>" + json[i].email);
	            $("#msg").append(json[i].message);
	        }
		});
	});
});
