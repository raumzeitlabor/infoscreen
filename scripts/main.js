"use strict";
var graph_source;

function updateData() {
	$.ajax({
		url: 'ajax.php',
		success: function(data) {
			$("#temperature").html(data.temperature);
			$("#devices").html(data.devices);
			$("#power").html(data.power);
			$("#members").html(data.members);
			$("#account").html(data.account);
			$("#internet_down").html(data.internet_down);
			$("#internet_up").html(data.internet_up);
			if (data.door == 1) {
				$("#door").removeClass('success important').addClass('success');
				$("#door").html("Offen");
			} else {
				$("#door").removeClass('success important').addClass('important');
				$("#door").html("Geschlossen");
			}
			$('#frame').attr('src', function ( i, val ) { return val; });
			setTimeout('updateData()',30000);
		}
	}).fail(function() {
		alert("Something went wrong. Please try again.");
	});
}

function updateGraph() {
	$('#graph').attr('src', function ( i, val ) { return graph_source + "&v=" + new Date().getTime()});
	setTimeout('updateGraph()',120000);
}

$(document).ready(function() {
	updateData();
	graph_source = $('#graph').attr('src');
	setTimeout('updateGraph()',120000);
});
