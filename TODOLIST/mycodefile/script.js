// вибираємо все,що нам потрібно
// звертаємось до todo-form
const todoForm = document.querySelector('.todo-form');
// звертаємось до input box
const todoInput = document.querySelector('.todo-input');
// звертаємось до <ul> з class="todo-items"
const todoItemsList = document.querySelector('.todo-items');

// створюємо масив,який буде зберігати дані
let todos = [];

// додаємо eventListener у форму та прослуховуємо подію відправки
todoForm.addEventListener('submit', function(event) {
  // забороняємо перезавантаження сторінки під час відправки форми
  event.preventDefault();
  addTodo(todoInput.value); // викликаємо функцію addTodo з поточним значенням поля введення
});

// функція, щоб додати завдання
function addTodo(item) {
  // якщо елемент(item) не порожній
  if (item !== '') {
    // створюється об’єкт todo, який має ідентифікатор, ім’я та завершені властивості(true or false)
    const todo = {
      id: Date.now(),
      name: item,
      completed: false
    };

    // потім додаємо його до масиву todos
    todos.push(todo);
    addToLocalStorage(todos); // потім зберігаємо його в localStorage

    // очищуємо значення поля введення
    todoInput.value = '';
  }
}

// функція для відображення заданих завдань на екрані
function renderTodos(todos) {
  // очищаємо все в середині <ul> з class=todo-items
  todoItemsList.innerHTML = '';

  // проходимось по кожному елементу в todo
  todos.forEach(function(item) {
    // перевіряємо, чи заповнений пункт
    const checked = item.completed ? 'checked': null;
    // ми повинні створити елемент <li> і заповнити його в html
    // <li> </li>
    const li = document.createElement('li');
    // <li class="item"> </li>
    li.setAttribute('class', 'item');
    // <li class="item" data-key="20200708"> </li>
    li.setAttribute('data-key', item.id);
    /* <li class="item" data-key="20200708"> 
          <input type="checkbox" class="checkbox">
          <button class="delete-button">X</button>
        </li> */
    // якщо елемент завершено, додаємо клас до <li> під назвою 'checked', який додасть стиль перекреслення рядка
    if (item.completed === true) {
      li.classList.add('checked');
    }

    li.innerHTML = `
      <input type="checkbox" class="checkbox" ${checked}>
      ${item.name}
      <button class="delete-button">X</button>
    `;
    // додаємо <li> до <ul>
    todoItemsList.append(li);
  });

}

// функція для додавання завдань до  local storage
function addToLocalStorage(todos) {
  // перетворюємо масив у рядок, а потім зберігаємо його.
  window.localStorage.setItem('todos', JSON.stringify(todos));
  // виводимо їх на екрані
  renderTodos(todos);
}

// функція для зчитання данних в localStorage parse
function getFromLocalStorage() {
  const reference = localStorage.getItem('todos');
  // якщо посилання існує
  if (reference) {
    // перетворюємо назад у масив і зберігає його в масиві todos
    todos = JSON.parse(reference);
    renderTodos(todos);
  }
}

// функція для переключання значення на завершене і не завершене
function toggle(id) {
  todos.forEach(function(item) {
    // use == not ===, because here types are different. One is number and other is string
    if (item.id == id) {
      // переключити значення
      item.completed = !item.completed;
    }
  });

  addToLocalStorage(todos);
}

// функція видаляє завдання з масиву todos, потім оновлює локальне сховище та відображає оновлений список на екрані
function deleteTodo(id) {
  // відфільтровує <li> з ідентифікатором і оновлює масив todos
  todos = todos.filter(function(item) {
    // use != not !==, because here types are different. One is number and other is string
    return item.id != id;
  });

  // оновити localStorage
  addToLocalStorage(todos);
}

// спочатку отримуємо все з localStorage
getFromLocalStorage();

// після цього addEventListener <ul> з class=todoItems. Тому що нам потрібно прослухати подію кліку у всіх кнопках видалення та прапорцях
todoItemsList.addEventListener('click', function(event) {
  // перевіряємо чи стоїть подія у прапорці,тобто чи поставили галочку
  if (event.target.type === 'checkbox') {
    // переключаємо стан
    toggle(event.target.parentElement.getAttribute('data-key'));
  }

  // перевіряємо, чи це кнопка видалення
  if (event.target.classList.contains('delete-button')) {
    // отримуємо ідентифікатор із значення атрибута data-key для батьківського <li>, де є кнопка видалення
    deleteTodo(event.target.parentElement.getAttribute('data-key'));
  }
});