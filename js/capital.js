var states = [
	"Alabama",
	"Alaska",
	"Arizona",
	"Arkansas",
	"California",
	"Colorado",
	"Connecticut",
	"Delaware",
	"Florida",
	"Georgia",
	"Hawaii",
	"Idaho",
	"Illinois",
	"Indiana",
	"Iowa",
	"Kansas",
	"Kentucky",
	"Louisiana",
	"Maine",
	"Maryland",
	"Massachusetts",
	"Michigan",
	"Minnesota",
	"Mississippi",
	"Missouri",
	"Montana",
	"Nebraska",
	"Nevada",
	"New Hampshire",
	"New Jersey",
	"New Mexico",
	"New York",
	"North Carolina",
	"North Dakota",
	"Ohio",
	"Oklahoma",
	"Oregon",
	"Pennsylvania",
	"Rhode Island",
	"South Carolina",
	"South Dakota",
	"Tennessee",
	"Texas",
	"Utah",
	"Vermont",
	"Virginia",
	"Washington",
	"West Virginia",
	"Wisconsin",
	"Wyoming"
];

var capitals = [
	"Montgomery",
	"Juneau",
	"Phoenix",
	"Little Rock",
	"Sacramento",
	"Denver",
	"Hatford",
	"Dover",
	"Tallahassee",
	"Atlanta",
	"Honolulu",
	"Boise",
	"Springfield",
	"Indianapolis",
	"Des Moines",
	"Topeka",
	"Frankfort",
	"Baton Rouge",
	"Augusta",
	"Annapolis",
	"Boston",
	"Lansing",
	"Saint Paul",
	"Jackson",
	"Jefferson City",
	"Helena",
	"Lincoln",
	"Carson City",
	"Concord",
	"Trenton",
	"Santa Fe",
	"Albany",
	"Raleigh",
	"Bismarck",
	"Columbus",
	"Oklahoma City",
	"Salem",
	"Harrisburg",
	"Providence",
	"Columbia",
	"Pierre",
	"Nashville",
	"Austin",
	"Salt Lake City",
	"Montpelier",
	"Richmond",
	"Olympia",
	"Charleston",
	"Madison",
	"Cheyenne"
];

var choices = new Array(50);
var score = 0;
var time = 300;
var index;

function newQ() {

	if (choices.length == 0)
		return -1;
	else {
		index = Math.floor(Math.random()*choices.length);
		var qdiv = document.getElementById("qdiv");
		while (qdiv.firstChild)
			qdiv.removeChild(qdiv.firstChild);
		qdiv.appendChild(document.createTextNode(states[index]));
		return index;

	}

}

function timeR() {

	var min = Math.floor(time/60);
	var sec = time %60;
	if (time < 0)
		return "0:00";
	if (sec < 10)
		return min + ":" + 0 + "" + sec;
	return min + ":" + sec;

}

function runUpdateTime() {
	time--;
	idiv = document.getElementById("idiv");
	idiv.replaceChild(document.createTextNode("Time Remaining: " + timeR()), idiv.childNodes[2]);
		if(time === 0){
			alert("GAME OVER");
			document.getElementById("tb").disabled = true;
		}
	}

function getHint() {

	var cur = document.getElementById("hdiv").childNodes[1];
	console.log(cur);
	if (cur.length < capitals[index].length)
		cur = cur + capitals[index][cur.length];

	document.getElementById("hdiv").replaceChild(document.createTextNode(cur), document.getElementById("hdiv").childNodes[1]);

}

function initialize() {

	var tdiv = document.getElementById("tdiv");
	var table = document.createElement('table');
	var jwei = document.getElementById("jwei");
	jwei.disabled = true;
	table.id = "table";

	for (var i = 0; i < 5; i++) {

		var tr = table.insertRow();
		for (var j = 0; j < 10; j++) {

			var td = tr.insertCell();
			td.id = j+10*i;

		}

	}

	tdiv.appendChild(table);

	var idiv = document.getElementById("idiv");

	idiv.appendChild(document.createTextNode("Score: " + score));
	idiv.appendChild(document.createElement("br"));
	idiv.appendChild(document.createTextNode("Time Remaining: " + timeR()));
	document.getElementById("tb").disabled = false;
	document.getElementById("tb").focus();
	setInterval( function() {runUpdateTime();}, 1000);

	var div = document.getElementById("qdiv");
	for (var i = 0; i < 50; i++)
		choices[i] = i;
	newQ();

	var hdiv = document.getElementById("hdiv");
	var button = document.createElement("BUTTON");
	button.appendChild(document.createTextNode("Hint"));
	var l = hdiv.childNodes.length;
	for (var i = 0; i < l; i++)
		hdiv.removeChild(hdiv.childNodes[0]);
	hdiv.appendChild(button);
	hdiv.appendChild(document.createTextNode(""));
	button.onclick = getHint();
}

function check() {

	var string = document.getElementById("tb").value;
	var table = document.getElementById("table");

	if (capitals[index].toLowerCase() == string.toLowerCase()) {

		var x = document.getElementById(index);
		x.appendChild(document.createTextNode(states[index] + ": " + capitals[index]));
		x.style.backgroundColor = "LightBlue";
		var idiv = document.getElementById("idiv");
		score += 5;
		states[index] = "";
		capitals[index] = "";
		for (var i = 0; i < choices.length; i++)
			if (choices[i] == index) {
				choices.splice(i, 1);
				break;
			}
		idiv.replaceChild(document.createTextNode("Score: " + score), idiv.childNodes[0]);
		document.getElementById("tb").value = "";
		index = newQ();

	}

}