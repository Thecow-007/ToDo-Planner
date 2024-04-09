<!-- DANIEL -->
<!DOCTYPE html>
<html lang="en">

<!-- Please Note: The paper effect seen here was sourced from https://www.codesdope.com/blog/article/getting-notebook-paper-effect-with-css/,
Then altered for use on this page. -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../ToDo_CSS/ToDo.css">
  <title>ToDo Planner</title> 
</head>
<body>
  <div id="paper">
    <div id="pattern">
      <!-- Header -->
      <header>
        <div id="title">
          <h1>ToDo Planner</h1>
        </div>
        <div id="search-interface">
          <div id="save-button-container">
            <button id="save-button">save</button> 
          </div>
          <div id="user-box">
            <a href="../index.php"><button id="user-button">login</button>
            </a>
          </div>
          <div id="search-bar-container">
            <input type="text" placeholder="Search..." id="search-bar">
          </div>
          <div id="filters-container">
            <button id="filters-button" onclick="toggleActive('sort-window')">sort</button>
          </div>
          <div id="add-container">
            <button id="add-button" onclick="addToDo()"><span>+</span></button>
          </div>
        </div>
      </header>

      <!-- Sort Dialogue -->
      <div id="sort-window" class="active">
        <h4 id="sort-title">Sort:</h4>
        <div id="name-buttons-container">
          <label for="alpha-button">Name:</label>
          <input class="filter" type="radio" id="alpha-button" name="name-buttons">
          <label for="alpha-button">Alphebetically</label>
          <input class="filter" type="radio" id="reverse-button" name="name-buttons">
          <label for="reverse-button">Reverse Alphebetical</label>
        </div>
        <div id="tag-buttons-container">
          <label for="tag-button">Tag: </label>
          <input class="filter" type="checkbox" id="tag-button" name="tag-button">
        </div>
      </div>

      <!-- ToDo Items -->
      <div id="ToDo-Items">
      <script src="../ToDo_JS/ToDoItem.js"></script>
      </div>
    </div>
  </div>
</body>
<!-- Pls let this Work-->
<?php
    require_once 'ToDoSave.php';
    echo "<script>
    ToDoList = JSON.parse('$ToDoListJSON');
    printList();
    </script>";
?>
</html>