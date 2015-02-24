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

var abrev = ["AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT","VA","WA","WV","WI","WY"];


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
	document.getElementById("tb").disabled = false;
	document.getElementById("tb").focus();


}

function check() {

	var string = document.getElementById("tb").value;
	var table = document.getElementById("table");

	for (var i = 0; i < states.length; i++) {

		if ((states[i].toLowerCase() == string.toLowerCase() || string == abrev[i]) && states[i] != "") {

			var x = document.getElementById(i);
			x.appendChild(document.createTextNode(states[i]));
			x.style.backgroundColor = "cyan";
			var idiv = document.getElementById("idiv");
			score += 1;
			states[i] = "";
			user[i] = string;
			idiv.replaceChild(document.createTextNode("Score: " + score), idiv.childNodes[0]);
			document.getElementById("tb").value = "";
			break;

		}

	}

}