function check() {

	a = document.getElementById("string").value;
	reg = new RegExp("^([a-zA-z0-9]{1,})$");
	p2 = new RegExp("[0-9]{1,}");
	if (p1.test(a) && p2.test(b))
		document.getElementById("btn").disabled = false;
	else
		document.getElementById("btn").disabled = true;
}