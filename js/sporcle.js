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


function tableCreate() {

	var div = document.getElementById("tdiv");
	var table = document.createElement('table');
	table.id = "table";
	table.style.border = "1px solid black";

	for (var i = 0; i < 5; i++) {

		var tr = table.insertRow();
		for (var j = 0; j < 10; j++) {

			var td = tr.insertCell();
			td.style.border = "1px solid black";

		}

	}

	tdiv.appendChild(table);

}

function check() {

	var string = document.getElementById("tb").value;
	var table = document.getElementById("table");

	for (var i = 0; i < states.length; i++) {

		if (states[i].toLowerCase() == string.toLowerCase()) {

			states[i] = "";
			user[i] = string;
			var r = Math.floor(i/10);
			var c = i % 10;
			table.rows[r].cells[c].appendChild(document.createTextNode(string));

			break;

		}

	}

	document.getElementById("tb").value = "";


}