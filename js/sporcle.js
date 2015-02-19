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
	"Monatana",
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

var user = new Array(50);
var score = 0;

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

}

function check() {

	var string = document.getElementById("tb").value;
	var table = document.getElementById("table");

	for (var i = 0; i < states.length; i++) {

		if (states[i].toLowerCase() == string.toLowerCase() && states[i] != "") {

			states[i] = "";
			user[i] = string;
			var x = document.getElementById(i);
			x.appendChild(document.createTextNode(string));
			x.style.backgroundColor = "cyan";
			var idiv = document.getElementById("idiv");
			idiv.replaceChild(document.createTextNode("Score: " + score), idiv.childNodes[0]);
			score += 1;
			document.getElementById("tb").value = "";
			break;

		}

	}

}