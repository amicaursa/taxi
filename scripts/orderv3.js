window.onload = function () {
  
    // Отправка AJAX-запроса для получения данных заказов
    fetch('../queries/fetch_orders_archive.php')
      .then(response => response.json())
      .then(data => {
        // Вызов функции для отображения заказов на первой странице
        renderPage(1, data);
  
        // Вызов функции для отображения нумерации страниц
        renderPagination(data);
      })
      .catch(error => {
        console.log('Ошибка получения данных заказов:', error);
      });
  };
  
  
  
  const pageSize = 8; // количество заказов на одной странице
  const ordersGrid = document.querySelector(".orders-grid");
  const pagination = document.querySelector(".pagination");
  
  // функция, которая отображает заказы на текущей странице
  function renderPage(pageNumber, orders) {
    const startIndex = (pageNumber - 1) * pageSize;
    const endIndex = startIndex + pageSize;
    const pageOrders = orders.slice(startIndex, endIndex);
  
    const html = pageOrders.map(order => `
      <div class="order-tile">
        <h3>Заказ #${order.ID}</h3>
        <p><b>Место посадки:</b> ${order.place_plant}</p>
        <p><b>Место прибытия:</b> ${order.place_arrival}</p>
        <p><b>Цена:</b> ${order.payment} руб.</p>
        <p><b>Дата:</b> ${order.date_p}</p>
        <p><b>Время:</b> ${order.time_p}</p>
      </div>
    `).join("");
  
    ordersGrid.innerHTML = html;
  }
  
  // функция, которая отображает нумерацию страниц
  function renderPagination(orders) {
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
      renderPage(pageNumber, orders);
    }
  });
  
  // функция, которая отображает несколько страниц при большом количестве заказов
  function renderOrders(orders) {
    const pageCount = Math.ceil(pageSize);
  
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
    
    const pageOrders = orders.slice((i - 1) * pageSize, i * pageSize);
    
    const html = pageOrders.map(order => `
      <div class="order-tile">
        <h3>Заказ #${order.ID}</h3>
        <p><b>Место посадки:</b> ${order.place_plant}</p>
        <p><b>Место прибытия:</b> ${order.place_arrival}</p>
        <p><b>Цена:</b> ${order.payment} руб.</p>
        <p><b>Дата:</b> ${order.date_p}</p>
        <p><b>Время:</b> ${order.time_p}</p>
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
    
    // Отправка AJAX-запроса для получения данных заказов
    fetch('fetch_orders.php')
    .then(response => response.json())
    .then(data => {
    // Вызов функции для отображения всех страниц с заказами
    renderOrders(data);
    })
    .catch(error => {
    console.log('Ошибка получения данных заказов:', error);
    });  
  