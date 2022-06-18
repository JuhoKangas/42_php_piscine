const button = document.getElementById("new");
const listDiv = document.getElementById("ft_list");
const toDoList = new Array();
let id = 0;

// Fetch todolist items from cookies and save them to the arry
window.addEventListener("load", (e) => {
	if (document.cookie) {
		let cookieList = document.cookie;
		let toDoString = cookieList.split("=");
		cookieList = JSON.parse(decodeURIComponent(toDoString[1]));
		console.log(cookieList);
		for (i in cookieList) {
			if (cookieList[i]) {
				addItem(cookieList[i]);
				toDoList.push(cookieList[i]);
			}
		}
	}
});

// Save todo-list items when closing the tab to encoded JSON object
window.addEventListener("unload", () => {
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

button.addEventListener("click", (e) => {
	let todo = prompt("What is the todo?");
	if (todo.length > 0) {
		toDoList.push(todo);
		addItem(todo);
	}
});

// addItem will create new node from the input it gets then assign it a unique id
// and prepend it to the ft_list element
function addItem(item) {
	const node = document.createElement("div");
	node.setAttribute("class", "listItem");
	node.setAttribute("id", id++);
	node.innerHTML = item;
	node.addEventListener("click", remove);
	listDiv.prepend(node);
}

// Removes the item from internal array as well as from the flow of the page
function remove() {
	if (confirm("Are you sure?")) {
		index = toDoList.indexOf(document.getElementById(this.id).innerHTML);
		console.log(index);
		toDoList.splice(index, 1);
		console.log(toDoList);
		this.remove();
	}
}
