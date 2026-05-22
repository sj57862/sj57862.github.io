class TaskMenager{
    constructor(){
        localStorage.setItem("taskList","[]")
    }

    addTask(isDone,taskName,taskDate){
        const task = {
            isDone:isDone,
            taskName:taskName,
            taskDate:taskDate
        };

        let taskList = JSON.parse(localStorage.getItem("taksList"));
        taskList.push(task);
        taskList = JSON.stringify(taskList);

        localStorage.setItem("taskList",taskList);
    }
}

class LineNode{

}
