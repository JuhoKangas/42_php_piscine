const button = document.getElementById("new");
const toDoList = new Array();

button.addEventListener("click", (e) => {
	let todo = prompt("What is the todo?");
	toDoList.unshift(todo);
	console.log(toDoList);
});

window.addEventListener("load", (e) => {
	if (document.cookie) {
		console.log(document.cookie);
	}
});

window.addEventListener("unload", () => {
	let listItems = {};

	toDoList.forEach((item, index) => {
		listItems[index] = item;
	});

	if (Object.keys(listItems).length !== 0) {
		document.cookie = JSON.stringify(listItems);
	}
});
// const cookieArr = document.cookie.split("; ");
// const cookieMap = new Map();

// for (obj of cookieArr) {
// 	let values = obj.split("=");
// 	cookieMap.set(values[0], values[1]);
// }

// console.log(cookieMap);
