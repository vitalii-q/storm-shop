/* КАСТОМНЫЕ СТИЛИ */
/* checkbox на странице авторизации / регистрации */
function checkboxRemember() {
    let rememberCheckbox = document.getElementById("remember");
    rememberCheckbox.classList.toggle('custom-form-check_custom-checked');
}
/* checkbox на странице авторизации / регистрации end */


/* проверка колличества продуктов добавляемых в корзину */
function checkQuantity(clickedElement) {
    // если значение input < 1
    if(clickedElement.value < 1) {
        clickedElement.value = '1'; // меняем на 1
    }
}
/* проверка колличества продуктов добавляемых в корзину */


/* add to cart ------------------------------------ */
function addToCart(productId) {
    let quantityBlockContainer = document.getElementById('cart_add-plus_minus-container');
    if(quantityBlockContainer != undefined) { // если элемент есть, значит на странице продукта
        cartAddButton = document.getElementById('cartAddButton');
        cartAddButton.classList.add('display-none'); // скрываем кнопку добавления товара

        quantityBlockContainer = document.getElementById('cart_add-plus_minus-container');
        quantityBlockContainer.classList.remove('display-none'); // показываем переключалку колличесвта товара

        quantityElement = document.getElementById('catalogQuantityProduct_'+productId);
        quantity = quantityElement.innerHTML; // получаем указанное колличество
    } else { // на странице каталога
        quantityElement = document.getElementById('catalogQuantityProduct_'+productId);
        quantity = quantityElement.innerHTML; // получаем указанное колличество
    }

    $.ajax({
        url:"/cart/add",
        type: "POST",
        data: {
            id: productId,
            quantity: quantity,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            //console.log(data);
        }
    })
}
/* add to cart -------------------------------- end */


/* удаление / обновление / добавление продукта в корзину / каталог ------ */
function addToCartButtonCatalog(productId) {
    quantityElements = document.getElementsByClassName('cart_add-plus_minus-count'); // получаем все элементы с колличеством на странице
    for(i=0;  i < quantityElements.length; i++) { // находим колличевтво элемента которого добавляют в корзину
        if(quantityElements[i].getAttribute('data-id') == productId) {
            cartAddButton = document.getElementById('cartAddButton_'+productId);
            quantityBlockContainer = document.getElementById('cart_add-plus_minus-container_'+productId);
            cartAddButton.classList.add('display-none'); // скрываем кнопку добавления товара
            quantityBlockContainer.classList.remove('display-none'); // показываем переключалку колличесвта товара
        }
    }

    addToCart(productId);
}

function cartUpdate(productId) { // обновление продуктов (страницы коталог / продукт)
    console.log('update');
    quantityBlock = document.getElementById('catalogQuantityProduct_'+productId);
    quantity = Number(quantityBlock.innerHTML); // приводим к числу и прибавляем единицу

    $.ajax({
        url:"/cart/update",
        type: "POST",
        data: {
            id: productId, // передаем id продукта
            quantity: quantity, // передаем количество продукта
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            console.log(data);
        }
    })
}

function updateProductInCart(clickedElement) { // обновление продуктов (страница корзины)
    // если значение input < 1
    if(clickedElement.value < 1) {
        clickedElement.value = '1'; // меняем на 1
    }

    // получаем сумму продукта
    quantity = clickedElement.value;
    console.log(quantity);

    // получаем id продукта
    productId = clickedElement.getAttribute('data-id');

    // обновляем корзину
    $.ajax({
        url: "cart/update",
        type: "POST",
        data: {
            id: productId,
            quantity: quantity,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            //console.log(data); // ответ от php
        }
    })

    // обновляем сумму продукта
    let pricesElements = document.getElementsByClassName('product-price_get-price');
    let prices = [];
    for(let i=0; i < pricesElements.length; i++) { // получаем цены продуктов в корзине
        prices.push(pricesElements[i].innerHTML);
    }

    // получаем элементы с суммами продукта
    let quantitiesInput = document.getElementsByClassName('quantity_get-value');
    let quantities = [];

    // формируем массив с суммами продуктов
    for(let i=0; i < quantitiesInput.length; i++) {
        quantities.push(quantitiesInput[i].value);
    }

    let productSum = []; // суммы продуктов
    for(let i=0; i < pricesElements.length; i++) {
        productSum.push(quantities[i] * prices[i]); // умножаем цену продукта на его колличество
    }

    let productSumElements = document.getElementsByClassName('product-sum_get-sum'); // элементы с суммой продукта
    for(let i=0; i < productSumElements.length; i++) {
        productSumElements[i].innerHTML = productSum[i]; // обновляем сумму продукты
    }

    // обновляем итоговую сумму
    let totalSumElement = document.getElementById('total-price_total');
    let totalSum = 0; // итоговая сумма
    for(let i = 0; i < productSum.length; i++){
        totalSum = totalSum + parseInt(productSum[i]); // складываем сумму за продукты
    }
    totalSumElement.innerHTML = totalSum; // обновляем итоговую сумму
}

function removeProductCart(productId) {
    $.ajax({
        url:"/cart/remove",
        type: "POST",
        data: {
            id: productId, // передаем id продукта
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            console.log(data);
        }
    })

    // удаляем html блок продукта на странице корзины
    productBlockInCart = document.getElementById('productBlockInCart_'+productId);
    if(productBlockInCart != undefined) {
        productBlockInCart.remove();
    }
}

function cartMinusProduct(productId) { // минус единица продукта
    quantityBlockContainer = document.getElementById('cart_add-plus_minus-container_'+productId); // блок с колличеством добовляемого товара
    quantityBlock = document.getElementById('catalogQuantityProduct_'+productId); // элемент с колличеством добавляемого товара
    if(Number(quantityBlock.innerHTML) > 1) {
        quantityBlock.innerHTML = Number(quantityBlock.innerHTML) - 1; // приводим к числу и отнимаем единицу

        cartUpdate(productId);
    } else {
        if(cartAddButton == undefined) { // на странице каталога
            quantityBlockContainer.classList.add('display-none'); // скрываем переключалку колличесвта товара
            cartAddButton = document.getElementById('cartAddButton_'+productId);
            cartAddButton.classList.remove('display-none'); // показываем кнопку добавления товара
        } else { // на странице продукта
            cartAddButton = document.getElementById('cartAddButton');
            quantityBlockContainer = document.getElementById('cart_add-plus_minus-container');
            cartAddButton.classList.remove('display-none'); // показываем кнопку добавления товара
            quantityBlockContainer.classList.add('display-none'); // скрываем переключалку колличесвта товара
        }

        removeProductCart(productId);
    }
}
function cartPlusProduct(productId) { // плюс единица продукта
    quantityBlock = document.getElementById('catalogQuantityProduct_'+productId);
    quantityBlock.innerHTML = Number(quantityBlock.innerHTML) + 1; // приводим к числу и прибавляем единицу

    cartUpdate(productId);
}
/* удаление / обновление / добавление продукта в корзину / каталог -- end */


/* cart header -----------------------------------  */

/* cart header -------------------------------- end */