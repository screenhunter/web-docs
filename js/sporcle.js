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
	"New York",
	"New Mexico",
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

var abrev = ["AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NH","NJ","NM","NY","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT","VA","WA","WV","WI","WY"];

var score = 0;
var time = 300;

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

function initialize() {

	var tdiv = document.getElementById("tdiv");
	var table = document.createElement('table');
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

}

function check() {

	var string = document.getElementById("tb").value;
	var table = document.getElementById("table");

	for (var i = 0; i < states.length; i++) {

		if ((states[i].toLowerCase() == string.toLowerCase() || string == abrev[i]) && states[i] != "") {

			var x = document.getElementById(i);
			x.appendChild(document.createTextNode(states[i]));
			x.style.backgroundColor = "LightBlue";
			var idiv = document.getElementById("idiv");
			score += 1;
			states[i] = "";
			idiv.replaceChild(document.createTextNode("Score: " + score), idiv.childNodes[0]);
			document.getElementById("tb").value = "";
			break;

		}

	}

}