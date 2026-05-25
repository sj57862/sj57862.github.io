class TaskMenager{
    constructor(){
        if(localStorage.getItem("taskList") == null){
            localStorage.setItem("taskList","[]")
        }
        if(localStorage.getItem("nextID") == null){
            localStorage.setItem("nextID","0");
        }
    }

    addTask(isDone,taskName,taskDate){
        let nextID= parseInt(localStorage.getItem("nextID"));

        const task = {
            isDone:isDone,
            taskName:taskName,
            taskDate:taskDate,
            id:nextID
        };

        nextID++;
        localStorage.setItem("nextID",nextID);

        let taskList = JSON.parse(localStorage.getItem("taskList"));
        taskList.push(task);
        taskList = JSON.stringify(taskList);

        localStorage.setItem("taskList",taskList);

        return task.id;
    }

    deleteTask(id){
        let taskList = JSON.parse(localStorage.getItem("taskList"));
        taskList = taskList.filter(task => task.id != id);
        taskList = JSON.stringify(taskList);
        localStorage.setItem("taskList", taskList);
    }

    getAllTasks(){
        return JSON.parse(localStorage.getItem("taskList"));
    }

    taskUpdate(id,isDone = null,taskName = null,taskDate = null){
        let taskList = JSON.parse(localStorage.getItem("taskList"));
        const taskIndex = taskList.findIndex(task => task.id == id);
        if(isDone !== null){
            taskList[taskIndex].isDone = isDone;
        }
        if(taskName !== null){
            taskList[taskIndex].taskName = taskName;
        }
        if(taskDate !== null){
            taskList[taskIndex].taskDate = taskDate;
        }
        taskList = JSON.stringify(taskList);
        localStorage.setItem("taskList", taskList);
    }

    getFilteredTaks(filter,type){
        let taskList = this.getAllTasks();

        if(type == "name"){
            taskList = taskList.filter(task => task.taskName.includes(filter));
        }

        return taskList;
    }
}

class LineNode{
    constructor(title,date,isDone,id){
        const template = document.getElementById("line_temp");
        const templateContent = template.content;

        this.node = templateContent.firstElementChild.cloneNode(true);

        this.node.querySelector(".title").textContent = title;
        this.node.querySelector(".date").textContent = date;
        this.node.querySelector("input[type='checkbox']").checked = isDone;

        this.focus = false;
        this.innerDiv = this.node.querySelector(".content");
        this.node.querySelector(".edit").addEventListener("click",() => {
            if(this.focus){
                this.onUnFocus();
                this.focus = false;
            }else{
                this.onFocus();
                this.focus = true;
            }
        });

        this.id = id;

        this.node.querySelector(".delete").addEventListener("click", () => {
            this.removeItself();
        });
        this.node.querySelector("input[type='checkbox']").addEventListener("change", (event) => {
            const isChecked = event.target.checked;
            const taskMenager = new TaskMenager();
            taskMenager.taskUpdate(this.id, isChecked);
        });
    }

    getNode(){
        return this.node;
    }

    removeItself(){
        this.node.remove();
        const taskMenager = new TaskMenager();
        taskMenager.deleteTask(this.id);
    }

    yellowishBackground_onfiltered(filter){
        let name = this.node.querySelector(".title").textContent;
        const colored_html = "<span class='colored'>" + filter + "</span>";
        this.node.querySelector(".title").innerHTML = name.replace(filter, colored_html);
    }

    onFocus(){
        const title = this.node.querySelector(".title").textContent;
        const date = this.node.querySelector(".date").textContent;

        this.innerDiv.innerHTML = `<input type='text' class='edit-title' value='${title}'>
                                    <input type='date' class='edit-date' value='${date}'>`;
    }

    onUnFocus(){
        const newTitle = this.innerDiv.querySelector(".edit-title").value;
        const newDate = this.innerDiv.querySelector(".edit-date").value;
        this.innerDiv.innerHTML = `<span class='title'>${newTitle}</span>
                                    <span class='date'>${newDate}</span>`;
        const taskMenager = new TaskMenager();
        taskMenager.taskUpdate(this.id, null, newTitle, newDate);
    }
}

class MainMenager{
    constructor(){
        this.taskMenager = new TaskMenager();
        this.buildTasks(this.taskMenager.getAllTasks());

        const addButton = document.getElementById("new_task_button");
        addButton.addEventListener("click",() => {
            const taskName = document.querySelector("#new_task_input").value;
            const taskDate = document.querySelector("#new_task_date").value;

            const taskID = this.taskMenager.addTask(false, taskName, taskDate);
            const lineNode = new LineNode(taskName, taskDate, false, taskID);
            document.querySelector(".list").appendChild(lineNode.getNode());
        });

        const filterInput = document.getElementById("search_input");
        filterInput.addEventListener("input",event => {this.onTyping(event.target.value)});
    }

    buildTasks(taskList){
        taskList.forEach(task => {
            const lineNode = new LineNode(task.taskName,task.taskDate,task.isDone,task.id);
            document.querySelector(".list").appendChild(lineNode.getNode());
        });
    }

    clearMain(){
        document.querySelector(".list").innerHTML = "";
    }

    onTyping(typed){
        if(typed == ""){
            document.querySelector(".list").innerHTML = "";
            this.buildTasks(this.taskMenager.getAllTasks());
        }else{
            const filteredTasks = this.taskMenager.getFilteredTaks(typed, "name");
            document.querySelector(".list").innerHTML = "";
            this.buildTasks_filteredText(filteredTasks,typed);
        }
    }

    buildTasks_filteredText(taskList,filter){
        taskList.forEach(task => {
            const lineNode = new LineNode(task.taskName,task.taskDate,task.isDone,task.id);
            lineNode.yellowishBackground_onfiltered(filter);
            document.querySelector(".list").appendChild(lineNode.getNode());
        });
    }
}

const mainMenager = new MainMenager();
console.log("Hello world");