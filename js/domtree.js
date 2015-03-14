var cur = null;

function next() {

	if (cur != null)
		cur.style.background = "transparent";

	if (cur == null)
		cur = document.body.firstElementChild;
	else if (cur.childElementCount != 0)
		cur = cur.children[0];
	else if (cur.nextElementSibling != null)
		cur = cur.nextElementSibling;
	else
		while (cur.parentNode != null && cur != document.body) {

			cur = cur.parentNode;
			if (cur.nextElementSibling != null) {
				cur = cur.nextElementSibling;
				break;
			}

		}

	if (cur == document.body)
		cur = document.body.firstElementChild;

	cur.style.background = "#FF00FF";
	console.log(cur);

}