// var slider = document.getElementById("myRange");
//     var output = document.getElementById("dur-days");
//     output.innerHTML = slider.value;
//     slider.oninput = function() {
//         output.innerHTML = this.value;
//     }
    //pop-up
    let popupBg = document.querySelector('.popup__bg'); // Фон попап окна
    let popup = document.querySelector('.popup'); // Само окно
    let openPopupButtons = document.querySelectorAll('.open-popup'); // Кнопки для показа окна
    let closePopupButton = document.querySelector('.close-popup'); // Кнопка для скрытия окна
    openPopupButtons.forEach((button) => { // Перебираем все кнопки
        button.addEventListener('click', (e) => { // Для каждой вешаем обработчик событий на клик
            e.preventDefault(); // Предотвращаем дефолтное поведение браузера
            popupBg.classList.add('active'); // Добавляем класс 'active' для фона
            popup.classList.add('active'); // И для самого окна
        })
    });
    closePopupButton.addEventListener('click', () => { // Вешаем обработчик на крестик
        popupBg.classList.remove('active'); // Убираем активный класс с фона
        popup.classList.remove('active'); // И с окна
    });
    document.addEventListener('click', (e) => { // Вешаем обработчик на весь документ
        if (e.target === popupBg) { // Если цель клика - popup, то:
            popupBg.classList.remove('active'); // Убираем активный класс с фона
            popup.classList.remove('active'); // И с окна
        }
    });

// function ftch(){
//     let a = $('get-form').serialize();
//     alert(a);
//     let ft = await fetch('../queries/order-get.php?id=1')
//     .then((response) => {
//     return response.json();
//     })
//     .then((data) => {
//     console.log(data);
//     return data;
//     });
// }
