function openCarType(evt, carType) {
    var i, carcontent, carlinks;
    carcontent = document.getElementsByClassName("car-content");
    for (i = 0; i < carcontent.length; i++) {
      carcontent[i].style.display = "none";
    }
    carlinks = document.getElementsByClassName("car-link");
    for (i = 0; i < carlinks.length; i++) {
      carlinks[i].className = carlinks[i].className.replace(" active", "");
    }
    document.getElementById(carType).style.display = "flex";
    evt.currentTarget.className += " active";
  }
  document.getElementById("defaultType").click();

  async function ftch(carType){
    let ft = await fetch('../queries/order-get.php?' + 'car_type=' + carType)
    .then((response) => {
    window.location.href = '../main_pages/orders.php';
    let elem = document.getElementById('car-type');
    elem.value = getCookie('type');
    return response.json();
    })
    .then((data) => {
    console.log(data);
    return data;
    });
}