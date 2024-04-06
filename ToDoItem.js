let ToDoList = [];
let tagList = new Set();

function addToDo() {
    let defaultToDo = {
        isChecked: false,
        title: "Click to add title...",
        date: new Date(),
        tags: ["new tag..."] //remove tag2 for final
    }

    ToDoList.push(defaultToDo);
    appendToDo(defaultToDo);
}

function appendToDo(item){
    var listItem = document.createElement('div');
        listItem.className = 'ToDo-item';
        listItem.innerHTML = `
        <div class="checkbox">
            <input type="checkbox" value="${item.isChecked}">
        </div>
      <div class="ToDo-item-title">
        <h3>${item.title}</h3>
      </div>
      <div class="ToDo-item-tags">
        <div class="tag-title">
          <h4>Tags:</h4>
        </div>
        ${item.tags.map(tag => `<div class="tag"><p>${tag}</p></div>`)}
      </div>`;
      document.getElementById('ToDo-Items').appendChild(listItem);
}

// Getters and Setters
function setChecked(index, checked) {
    ToDoList[index].ischecked = checked;
}

function setTitle(index, newTitle) {
    ToDoList[index].title = newTitle;
}

function setDate(index, newDate) {
    ToDoList[index].date = newDate;
}

function addTag(index, newTag) {
    tagList.add(newTag);
    ToDoList[index].tags.push(newTag);
}

function removeTag(index, oldTag) {
    // Check if the tag is not used by any todo item
    if (!todoList.some(ToDoList => ToDoList.tags.includes(oldTag))) {
        // Remove the tag from the tag set
        tagList.delete(oldTag);
    }
    ToDoList[index].tags.delete(oldTag);
}

function countElementsAbove(targetId) {
    var targetElement = document.getElementById(targetId);
    var count = 0;

    // Loop through previous siblings
    var sibling = targetElement.previousElementSibling;
    while (sibling) {
        count++;
        sibling = sibling.previousElementSibling;
    }

    return count;
}

function printList() {
    document.getElementById('ToDo-Items').innerHTML = "";
    for (var item of ToDoList) {
        appendToDo(item);
    }
}

function removeToDo(){
    
}

