document.addEventListener("DOMContentLoaded", () => {
    const todoForm = document.getElementById("todo-form");
    const todoInput = document.getElementById("TodoInput");
    const tododescription = document.getElementById("TodoDescription");
    const todoList = document.getElementById("todo-list");

    todoForm.addEventListener("submit", (a) => {
      a.preventDefault();
      const todoText = todoInput.value.trim();
      const todotext_description = tododescription.value.trim();


      if (todoText !== "" || todotext_description !=="") {
        addTodoItem(todoText);
        todoInput.value = "";
        tododescription.value = "";
      }
    });

    function addTodoItem(text) {
      const li = document.createElement("li");
      li.textContent = text;

      const deleteButton = document.createElement("button");
      deleteButton.textContent = "Delete";
    
      deleteButton.classList.add("delete-btn");
     

      li.appendChild(deleteButton);

     
      li.addEventListener("click", () => {
        li.classList.toggle("completed");
      });

     
      deleteButton.addEventListener("click", (a) => {
        a.stopPropagation();
        todoList.removeChild(li);
      });

      todoList.appendChild(li);
    }
  });