var list = ["Sivir", "Graves", "Corki", "Caitlyn", "Ezreal"];
var values = {};
values["Sivir"] = ["Fleet of Foot", "Boomerang Blade", "Ricochet", "Spell Shield", "On the Hunt"];
values["Graves"] = ["True Grit", "Buckshot", "Smoke Screen", "Quickdraw", "Collateral Damage"];
values["Corki"] = ["Hextech Shrapnel Shells", "Phosporus Bomb", "Valkyrie", "Gatling Gun", "Missle Barrage"];
values["Caitlyn"] = ["Headshot", "Piltover Peacemaker", "Yordle Snap Trap", "90 Caliber Net", "Ace in the Hole"];
values["Ezreal"] = ["Rising Spell Force", "Mystic Shot", "Essence Flux", "Arcane Shift", "Trueshot Barrage"];

function deleteChildren(elem) {

	while (elem.children.length > 0)
		elem.removeChild(elem.firstChild);

}

function onSelect() {

	var disp = document.getElementById("List2");
	deleteChildren(disp);

	var drop = document.getElementById("drop");
	var item = drop.options[drop.selectedIndex].value;

	var list = document.createElement("ul");
	for (var i = 0; i < values[item].length; i++) {
		var temp = document.createElement("li");
		temp.appendChild(document.createTextNode(values[item][i]))
		list.appendChild(temp)
	}
	disp.appendChild(document.createTextNode("Skills"));
	disp.appendChild(list);
	
}

function onClick() {

	var list1 = document.getElementById("List1");
	deleteChildren(list1);

	var drop = document.createElement("select");
	drop.id = "drop";
	drop.onchange = onSelect;
	for (var i = 0; i < list.length; i++) {

		var child = document.createElement("option");
		child.value = list[i];
		child.appendChild(document.createTextNode(list[i]));
		drop.appendChild(child);

	}

	if (document.getElementById("opt1").checked)
		drop.size = 1;
	else if (document.getElementById("opt2").checked)
		drop.size = list.length;

	list1.appendChild(drop);

}

function intialize() {

	var f = document.createElement("form");
	var dd = document.createElement("label");
	var lv = document.createElement("label")
	var opt1 = document.createElement("input");
	var opt2 = document.createElement("input");

	f.id = "form";

	opt1.type="radio";
	opt1.name="type";
	opt1.id = "opt1";
	opt1.value = "Dropdown"
	dd.appendChild(opt1);
	dd.appendChild(document.createTextNode("Dropdown"));
	opt1.onclick = onClick;

	opt2.type="radio";
	opt2.name="type";
	opt2.id = "opt2";
	opt2.value = "ListView";
	lv.appendChild(opt2);
	lv.appendChild(document.createTextNode("ListView"));
	opt2.onclick = onClick;

	f.appendChild(dd);
	f.appendChild(document.createElement("br"))
	f.appendChild(lv);
	document.getElementById("Type").appendChild(f);

}