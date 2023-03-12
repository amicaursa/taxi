// Функция для обратного отсчета времени
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
      minutes = parseInt(timer / 60, 10)
      seconds = parseInt(timer % 60, 10);
  
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;
  
      display.textContent = minutes + ":" + seconds;
  
      if (--timer < 0) {
        timer = duration;
      }
    }, 1000);
  }
  
  window.onload = function () {
    var tenMinutes = 60 * 10,
        display = document.querySelector('#timer');
    startTimer(tenMinutes, display);
  };

  const orders = [
    { id: 1, from: "Аэропорт", to: "Центр города", price: 500, data: 20.05, timeLeft: "5 минут" },
    { id: 2, from: "ЖД Вокзал", to: "Улица Ленина", price: 350, data: 20.05, timeLeft: "8 минут" },
    { id: 3, from: "Аэропорт", to: "Центр города", price: 500, data: 20.05, timeLeft: "5 минут" },
    { id: 4, from: "ЖД Вокзал", to: "Улица Ленина", price: 350, data: 20.05, timeLeft: "8 минут" },
    { id: 5, from: "Аэропорт", to: "Центр города", price: 500, data: 20.05,timeLeft: "5 минут" },
    { id: 6, from: "ЖД Вокзал", to: "Улица Ленина", price: 350, data: 20.05, timeLeft: "8 минут" },
    { id: 7, from: "Аэропорт", to: "Центр города", price: 500, data: 20.05, timeLeft: "5 минут" },
    { id: 8, from: "ЖД Вокзал", to: "Улица Ленина", price: 350, data: 20.05, timeLeft: "8 минут" },
    { id: 9, from: "Аэропорт", to: "Центр города", price: 500, data: 20.05, timeLeft: "5 минут" },
    { id: 10, from: "ЖД Вокзал", to: "Улица Ленина", price: 350, data: 20.05, timeLeft: "8 минут" },
  ];

  const pageSize = 8; // количество заказов на одной странице
  const ordersGrid = document.querySelector(".orders-grid");
  const pagination = document.querySelector(".pagination");

  // функция, которая отображает заказы на текущей странице
  function renderPage(pageNumber) {
    const startIndex = (pageNumber - 1) * pageSize;
    const endIndex = startIndex + pageSize;
    const pageOrders = orders.slice(startIndex, endIndex);

    const html = pageOrders.map(order => `
      <div class="order-tile">
        <h3>Заказ #${order.id}</h3>
        <p><b>Откуда:</b> ${order.from}</p>
        <p><b>Куда:</b> ${order.to}</p>
        <p><b>Цена:</b> ${order.price} руб.</p>
        <p><b>Дата:</b> ${order.data}</p>
        <p><b>Осталось времени:</b> ${order.timeLeft}</p>
      </div>
    `).join("");

    ordersGrid.innerHTML = html;
  }

  // функция, которая отображает нумерацию страниц
  function renderPagination() {
    const pageCount = Math.ceil(orders.length / pageSize);
    const pages = Array.from({ length: pageCount }, (_, i) => i + 1);

    const html = pages.map(page => `
      <button class="page-link" data-page="${page}">${page}</button>
    `).join("");

    pagination.innerHTML = html;
  }

  // обработчик клика на кнопку страницы
  pagination.addEventListener("click", event => {
    if (event.target.classList.contains("page-link")) {
      const pageNumber = Number(event.target.dataset.page);
      renderPage(pageNumber);
    }
  });

  // отображаем первую страницу при загрузке страницы
  renderPage(1);
  // отображаем нумерацию страниц при загрузке страницы
  renderPagination();
  
  // функция, которая отображает несколько страниц при большом количестве заказов
  function renderOrders() {
    const pageCount = Math.ceil(orders.length / pageSize);

    for (let i = 1; i <= pageCount; i++) {
      const container = document.createElement("div");
      container.classList.add("orders-container");

      const heading = document.createElement("h2");
      heading.textContent = `Дэшборд заказов - страница ${i}`;

      const ordersGrid = document.createElement("div");
      ordersGrid.classList.add("orders-grid");

      const pagination = document.createElement("div");
      pagination.classList.add("pagination");

      container.appendChild(heading);
      container.appendChild(ordersGrid);
      container.appendChild(pagination);

      document.body.appendChild(container);
      document.body.appendChild(container);

    const pageOrders = orders.slice((i - 1) * pageSize, i * pageSize);

    const html = pageOrders.map(order => `
        <div class="order-tile">
            <h3>Заказ #${order.id}</h3>
            <p>Откуда: ${order.from}</p>
            <p>Куда: ${order.to}</p>
            <p>Цена: ${order.price} руб.</p>
            <p>Дата: ${order.data}</p>
            <p>Осталось времени: ${order.timeLeft}</p>
        </div>
  `).join("");

  ordersGrid.innerHTML = html;

  const paginationButtons = Array.from(pagination.children);
  paginationButtons.forEach(button => {
    if (Number(button.dataset.page) === i) {
      button.classList.add("active");
    } else {
      button.classList.remove("active");
    }
  });
}
}
