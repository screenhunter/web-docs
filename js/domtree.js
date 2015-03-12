var cur = document.body.firstElementChild;

function next() {

	cur.style.background = "white";
	if (cur == null)
		cur = document.body.firstElementChild;
	else if (cur.childElementCount != 0)
		cur = cur.children[0];
	else if (cur.nextElementSibling != null)
		cur = cur.nextElementSibling;
	else
		while (cur.parentNode.nextElementSibling == null && cur != document.body)
			cur = cur.parentNode();

	if (cur == document.body)
		cur = document.body.firstElementChild;

	cur.style.background = "#FF00FF";
	console.log(cur);

}