document.addEventListener("DOMContentLoaded", () => {
  let oReq = new XMLHttpRequest();
  oReq.addEventListener("load", function(){
    let tasks = JSON.parse(this.response);
    if (tasks.length !== 0) {
      generateTable(tasks);
    }
    
  })
  oReq.open("GET", 'model/getTasks.php', true);
  oReq.send();
});



$('.todoForm').on("submit", function (e) {
  e.preventDefault();
  let text = document.querySelector('#text').value;
  $.ajax({
    url: 'model/addTask.php',
    type: 'POST',
    data: {
      text: text
    },
    dataType: "text",
    success: function (data, textStatus, jqXHR) {
      console.log(JSON.parse(data));
      generateTable(JSON.parse(data));
    }
  });
});


function generateTable(tasks) {
  if (document.querySelector('tbody') === null) {
    $table = document.getElementById("table");
    $table.innerHTML = `<table class="table caption-top">
   <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Task</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody></tbody>
    <button type="button" class="btn btn-danger deltasks"><a href="model/deleteAllTasks.php">Delete all tasks</a></button>`
  }
  $content = document.querySelector('tbody');

  // console.log(data);
  $content.innerHTML = "";
  tasks.forEach(element => {

    $tr = document.createElement('tr');
    $tr.setAttribute('class', 'item');
    $tr.setAttribute('data-key', element.id);
    $tr.innerHTML = `
    <th scope="row">${element.id}</th>
    <td>${element.text}</td>
    <td><a class="deltask" href="model/deleteTask.php?id=${element.id}">Delete</a></td>`;
    $content.append($tr);
  });
}