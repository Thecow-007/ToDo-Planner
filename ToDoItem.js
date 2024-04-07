let ToDoList = [];
let tagList = new Set();

function addToDo() {
    let defaultToDo = {
        isChecked: false,
        title: "Click to add title...",
        date: new Date(),
        tags: ["new tag...", "Another tag..."] //remove tag2 for final
    }

    ToDoList.push(defaultToDo);
    printList();
}

function appendToDo(item, index) {
    var listItem = document.createElement('div');
    listItem.className = 'ToDo-item';
    listItem.id = "item" + index;
    listItem.innerHTML = `
        <div class="checkbox">
            <input type="checkbox" value="${item.isChecked}" id="item-checkbox${index}">
        </div>
      <div class="ToDo-item-title">
        <h3 id="item-title${index}">${item.title}</h3>
      </div>
      <div class="ToDo-item-tags" id="item-tags${index}">
        <div class="tag-title">
          <h4>Tags:</h4>
        </div>
        ${generateTag(index)}
      </div>
      <div class="remove-container">
             <button class="remove-button" onclick="removeToDo('${index}')">-</button>
        </div>`;
    document.getElementById('ToDo-Items').appendChild(listItem);
    return listItem;
}

function generateTag(index){
    var tagString = ``;
    for(var i = 0; i < ToDoList[index].tags.length; i++){
        tagString += `<div class="tag" id="item${index}-tag${i}"><p>${ToDoList[index].tags[i]}</p></div>`;
    }
    return tagString;
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
    if (!ToDoList.some(ToDoList => ToDoList.tags.includes(oldTag))) {
        // Remove the tag from the tag set
        tagList.delete(oldTag);
    }
    var tagIndex = ToDoList[index].tags.indexOf(oldTag); // Find the index of oldTag in the tags array
    if (tagIndex !== -1) { // If oldTag is found in the array
        ToDoList[index].tags.splice(tagIndex, 1); // Remove oldTag from the tags array
    }
}

// We will use this function to find out the index of each ToDo item based on its location in the list. (maybe not)
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

function removeToDo(index) {
    for (var tag of ToDoList[index].tags) {
        removeTag(index, tag);
    }
    ToDoList.splice(index, 1);
    printList();
}

function printList() {
    document.getElementById('ToDo-Items').innerHTML = "";
    for (var i = 0; i < ToDoList.length; i++) {
        var ToDoItem = appendToDo(ToDoList[i], i);
        addToDoEvents(ToDoItem);
    }
}

function addToDoEvents(ToDoItem){
    var itemId = ToDoItem.id;
    var itemIndex  = itemId.substring(4);
    var itemTitle = document.getElementById("item-title" + itemIndex);
    //var itemTags = getTags(itemIndex);

    // Add the event listeners
    itemTitle.addEventListener("click", function() {
        gatherTitleInput(itemIndex);
    });
}

// Functions to replace text with textbox and vice versa. TitleItem will be the div container,
//Containing the h3 tag of the title. This is what will be swapped.
function gatherTitleInput(index){
    var titleText = ToDoList[index].title;

    var inputElement = document.createElement('input');
    inputElement.type = "text";
    inputElement.value = titleText;
    inputElement.id = "item-title-bar" + index;

    var oldh3 = document.getElementById("item-title" + index);
    let oldh3Value = oldh3.textContent;
    console.log("olh3 value1: " + oldh3Value);
    var titleContainer = oldh3.parentNode;

    titleContainer.replaceChild(inputElement, oldh3);

    // Focus on the input field
    inputElement.focus();

    inputElement.addEventListener("keypress", function(event) {
        if ((inputElement.value.trim() == "") && (event.key === "Enter")) {
            // If the input field is empty, revert back to <h3>
            ToDoList[index].title = oldh3Value;
            printList();
        }else if (event.key === "Enter") {
            ToDoList[index].title = inputElement.value;
            printList();
        }
    });

    inputElement.addEventListener("blur", function(){
        if (inputElement.value.trim() == "") {
            // If the input field is empty, revert back to <h3>
            ToDoList[index].title = oldh3Value;
            printList();
        }else{
            ToDoList[index].title = inputElement.value;
            printList();
        }
    });
}

//Function to collect tag input
function gatherTagInput(index){

}


