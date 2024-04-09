<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../ToDo_CSS/ToDo.css">
  <title>ToDo Planner</title>
  <script defer src="../ToDo_JS/ToDoItem.js"></script> 
</head>
<?php
    require_once 'ToDoSave.php';
?>
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
            <!-- ToDo: implement item saving via clicking this button. -->
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
        <!-- <div id="date-buttons-container">
          <label for="latest-button">Date:</label>
          <input type="radio" id="latest-button" name="date-buttons">
          <label for="latest-button">Latest to Oldest</label>
          <input type="radio" id="oldest-button" name="date-buttons">
          <label for="oldest-button">Oldest to Latest</label>
        </div> -->
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
        <!-- <div class="ToDo-item">
          <div class="checkbox">
            <input type="checkbox">
          </div>
          <div class="ToDo-item-title">
            <h3>Finish web assignment 2</h3>
          </div>
          <div class="ToDo-item-tags">
            <div class="tag-title">
              <h4>Tags:</h4>
            </div>
            <div class="tag">
              <p>tag1</p>
            </div>
            <div class="tag">
              <p>tag2</p>
            </div>
          </div>
          <div class="remove-container">
            <button class="remove-button" onclick="removeToDo()">-</button>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</body>

</html>