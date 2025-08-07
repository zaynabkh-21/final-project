document.addEventListener("DOMContentLoaded", function() {
    let task = document.getElementById("task-input");
    let taskList = document.getElementById("tasks");
    let themeButton = document.getElementById("themeButton");

    class Task {
        constructor(name) {
            this.name = name;
            this.completed = false;
        }
    }

    const tasks = [];


    function submitBtnClick(event) {
        event.preventDefault();
        const taskName = task.value.trim();
        if (taskName === "") return;
        const newTask = new Task(taskName);
        tasks.push(newTask);
        task.value = "";
        printTasks();
    }

    function printTasks() {
        taskList.innerHTML = "";
        for (let i = 0; i < tasks.length; i++) {
            const taskItem = document.createElement("li");
            taskItem.style.display = "flex";
            taskItem.style.justifyContent = "space-between";
            taskItem.style.alignItems = "center";
            
            const checkButton = document.createElement("input");
            checkButton.type = "checkbox";
            checkButton.name = "check-it";
            checkButton.className = "check-it";
            checkButton.style.marginRight = "10px";
            

            const nameSpan = document.createElement("span");
nameSpan.textContent = tasks[i].name;
            nameSpan.style.flexGrow = "1";

            const updateButton = document.createElement("button");
            updateButton.textContent = "Update";
            updateButton.className="add-butt";
            updateButton.style.marginLeft = "10px";
            updateButton.addEventListener("click", (function(index) {
                return function() {
                    task.value = tasks[index].name;
                    tasks.splice(index, 1);
                    printTasks();
                    task.focus();
                }
            })(i));

            
            const deleteButton = document.createElement("button");
            deleteButton.textContent = "Delete";
            deleteButton.style.marginLeft = "10px";
            deleteButton.className="add-butt";
            deleteButton.addEventListener("click", (function(index) {
                return function() {
                    tasks.splice(index, 1);
                    printTasks();
                }
            })(i));

            
            taskItem.appendChild(checkButton);
            taskItem.appendChild(nameSpan);
            taskItem.appendChild(updateButton);
            taskItem.appendChild(deleteButton);

            taskList.appendChild(taskItem);
        }
    }

    document.getElementById("task-form").addEventListener("submit", submitBtnClick);

    themeButton.addEventListener("click", changeTheme);
    function changeTheme() {
        document.body.classList.toggle('darkmode');
    }
});