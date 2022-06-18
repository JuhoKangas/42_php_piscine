const button = document.getElementById("new");
const listDiv = document.getElementById("ft_list");
const toDoList = new Array();
let id = 0;

// Fetch todolist items from cookies
window.addEventListener("load", (e) => {
	if (document.cookie) {
		let cookieList = JSON.parse(decodeURIComponent(document.cookie));
		for (i in cookieList) {
			if (cookieList[i]) {
				addItem(cookieList[i]);
				toDoList.push(cookieList[i]);
			}
		}
		console.log(cookieList);
	}
});

// Save todo-list items when closing the tab
window.addEventListener("unload", () => {
	let listItems = {};

	if (toDoList.length === 0) {
		document.cookie = "";
		return;
	}
	toDoList.forEach((item, index) => {
		listItems[index] = item;
	});

	if (Object.keys(listItems).length !== 0) {
		document.cookie = encodeURIComponent(JSON.stringify(listItems));
	}
});

button.addEventListener("click", (e) => {
	let todo = prompt("What is the todo?");
	if (todo.length > 0) {
		toDoList.push(todo);
		addItem(todo);
	}
});

function addItem(item) {
	const node = document.createElement("div");
	node.setAttribute("class", "listItem");
	node.setAttribute("id", id++);
	node.innerHTML = item;
	node.addEventListener("click", remove);
	listDiv.prepend(node);
}

function remove() {
	if (confirm("Are you sure?")) {
		index = toDoList.indexOf(document.getElementById(this.id).innerHTML);
		console.log(index);
		toDoList.splice(index, 1);
		console.log(toDoList);
		this.remove();
	}
}
