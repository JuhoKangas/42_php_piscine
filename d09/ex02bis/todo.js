const toDoList = new Array();
let id = 0;

$(document).ready(() => {
	if (document.cookie) {
		let cookieList = document.cookie;
		let toDoString = cookieList.split("=");
		cookieList = JSON.parse(decodeURIComponent(toDoString[1]));
		for (i in cookieList) {
			if (cookieList[i]) {
				addItem(cookieList[i]);
				toDoList.push(cookieList[i]);
			}
		}
	}
});

$(window).on("unload", () => {
	let listItems = {};

	if (toDoList.length === 0) {
		document.cookie = "listItems=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
		return;
	}
	toDoList.forEach((item, index) => {
		listItems[index] = item;
	});

	if (Object.keys(listItems).length !== 0) {
		document.cookie = "listItems=" + encodeURIComponent(JSON.stringify(listItems));
	}
});

$("#new").click(() => {
	let todo = prompt("What is the thing you would like to do?");
	if (todo.length > 0) {
		toDoList.push(todo);
		addItem(todo);
	}
});

function addItem(item) {
	const newItem = document.createElement("div");
	$(newItem).text(item);
	$(newItem).addClass("listItem");
	$(newItem).attr("id", id++);
	$(newItem).click(remove);
	$("#ft_list").prepend(newItem);
}

function remove() {
	if (confirm("Are you sure?")) {
		index = toDoList.indexOf($(this).text());
		toDoList.splice(index, 1);
		$(this).remove();
	}
}
