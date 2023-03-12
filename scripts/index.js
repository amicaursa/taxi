document.getElementById("order-btn").addEventListener("click", function() {
  location.href = "../main_pages/orders.php";
});

// скрывает все блоки с типами автомобилей,
// удаляет подсветку с выбранных ссылок,
// показывает выбранный блок и подсвечивает выбранную ссылку.

// function openCarType(evt, carType) {
//     var i, carcontent, carlinks;
//     carcontent = document.getElementsByClassName("car-content");
//     for (i = 0; i < carcontent.length; i++) {
//       carcontent[i].style.display = "none";
//     }
//     carlinks = document.getElementsByClassName("car-link");
//     for (i = 0; i < carlinks.length; i++) {
//       carlinks[i].className = carlinks[i].className.replace(" active", "");
//     }
//     document.getElementById(carType).style.display = "flex";
//     evt.currentTarget.className += " active";
//   }


  // будет отправлен запрос на сервер, получены данные о заказах,
  // связанных с определенным типом автомобиля,
  // и эти данные будут выведены в консоль. 
  // Затем произойдет переход на страницу main_pages/orders

//   async function ftch(carType){
//     let ft = await fetch('../queries/order-get.php?' + 'car_type=' + carType)
//     .then((response) => {
//     window.location.href = '../main_pages/orders.php';
//     let elem = document.getElementById('car-type');
//     elem.value = getCookie('type');
//     return response.json();
//     })
//     .then((data) => {
//     console.log(data);
//     return data;
//     });
// }