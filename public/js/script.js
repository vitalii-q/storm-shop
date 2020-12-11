/* КАСТОМНЫЕ СТИЛИ */
/* checkbox на странице авторизации / регистрации */
function checkboxRemember() {
    let rememberCheckbox = document.getElementById("remember");
    rememberCheckbox.classList.toggle('custom-form-check_custom-checked');
}
/* checkbox на странице авторизации / регистрации end */


/* проверка колличества продуктов добавляемых в корзину */
/*function checkQuantity(clickedElement) {
    // если значение input < 1
    if(clickedElement.value < 1) {
        clickedElement.value = '1'; // меняем на 1
    }
}*/
/* проверка колличества продуктов добавляемых в корзину */


/* удаление продукта / обновление продукта / добавление продукта в корзину ------ */
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

    // добавление продукта в header ------------------
    // получаем информацию о продукте
    let product = document.getElementById('product-item_'+productId);
    let name = product.getAttribute('data-name');
    let price = product.getAttribute('data-price');
    let img = product.getAttribute('data-img');

    // добавляем html блок
    let hfCartProductsWrapper = document.getElementById('hf_cart-products_wrapper');
    let template = document.getElementById('hf_cart-product-template'); // берем шаблон карточки продукта для мини корзины
    hfCartProductsWrapper.innerHTML = template.outerHTML + hfCartProductsWrapper.innerHTML; // добавляем шаблон продукта в мини корзину
    let newBlockProductHF = hfCartProductsWrapper.querySelector('.cart-item'); // получаем шаблон продукта, который уже в структуре html

    // добавляем значения в блок
    newBlockProductHF.classList.remove('display-none'); // показываем блок добавленного продукта
    newBlockProductHF.removeAttribute('id'); // удаляем старый id
    newBlockProductHF.setAttribute('id', 'hf_cart-product-'+productId); // присваиваем новый id

    newBlockProductHF.querySelector('.item-title').innerHTML = name; // добавляем имя продукта
    newBlockProductHF.querySelector('.for-inner-price').innerHTML = price; // добавляем цену
    newBlockProductHF.querySelector('.quantity-input').setAttribute('data-id', productId); // добавляем id в элемент с колличеством
    newBlockProductHF.querySelector('.remove-btn').setAttribute('onclick', 'removeProductCart('+productId+')'); // добавляем onclick с функцией удаления
    newBlockProductHF.querySelector('.hf-img-teg').setAttribute('src', img); // добавляем картинку

    miniCartChanges();
}

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
            //console.log(data);
        }
    })

    changeQuantityInAllElements(quantityBlock);

    miniCartChanges();
}

function updateProductInCart(clickedElement) { // обновление продуктов (страница корзины / мини корзина)
    // если значение input < 1
    if(clickedElement.value < 1) {
        clickedElement.value = '1'; // меняем на 1
    }

    // получаем сумму продукта
    quantity = clickedElement.value;

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

    changeQuantityInAllElements(clickedElement);

    // обновляем сумму продукта
    let pricesElements = document.getElementsByClassName('product-price_get-price');
    let prices = [];
    for(let i=0; i < pricesElements.length; i++) { // получаем цены продуктов в корзине
        prices.push(pricesElements[i].innerHTML);
    }

    // получаем элементы с суммами продуктов
    let quantitiesInput = document.getElementsByClassName('quantity_get-value');
    console.log(quantitiesInput);

    // формируем массив с суммами продуктов
    let quantities = [];
    for(let i=1; i < quantitiesInput.length; i++) {
        quantities.push(quantitiesInput[i].value);
        //console.log(quantitiesInput[i]);
    }
    console.log(quantities);

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

    if(totalSumElement != null) {
        totalSumElement.innerHTML = totalSum; // обновляем итоговую сумму
    }

    miniCartChanges();
}

function changeQuantityInAllElements(clickedElement = null) { // обновляем и связываем колличество товаров в разных местах верстки
    productId = clickedElement.getAttribute('data-id'); // получаем id продукта
    positionProductQuantityElem = clickedElement.getAttribute('data-position'); // смотрим откуда был клик

    // если клик из каталога, меняем количество в мини корзине
    if(positionProductQuantityElem == 'catalog') {
        changingProductQuantityElements = document.getElementsByClassName('quantity_get-value');
        for (let i=0; i < changingProductQuantityElements.length; i++) {
            if(changingProductQuantityElements[i].getAttribute('data-id') == clickedElement.getAttribute('data-id')){
                changingProductQuantityElements[i].setAttribute('value', Number(clickedElement.innerHTML));
                changingProductQuantityElements[i].value = Number(clickedElement.innerHTML);
            }
        }
    }

    // если клик из мини корзины, меняем в каталоге
    if(positionProductQuantityElem == 'header') {
        changingProductQuantityElements = document.getElementById('catalogQuantityProduct_'+productId);
        changingProductQuantityElements.innerHTML = Number(clickedElement.value);
    }

    // связываем количества продуктов в корзине и в мини корзине
    if(positionProductQuantityElem == 'cart' || positionProductQuantityElem == 'header-cart') {
        changingProductQuantityElements = document.getElementsByClassName('quantity_get-value');
        for (let i=0; i < changingProductQuantityElements.length; i++) {
            if(changingProductQuantityElements[i].getAttribute('data-id') == clickedElement.getAttribute('data-id')){
                changingProductQuantityElements[i].value = clickedElement.value;
            }
        }
    }
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
            //console.log(data);
        }
    })

    // удаляем html блок продукта на странице корзины
    productBlockInCart = document.getElementById('productBlockInCart_'+productId);
    if(productBlockInCart != undefined) {
        productBlockInCart.remove();
    }

    // удаляем html блок продукта в мини корзине header
    productBlockInCart = document.getElementById('hf_cart-product-'+productId);
    if(productBlockInCart != undefined) {
        productBlockInCart.remove();
    }

    // сбрасываем добавленные продукты в блоке товара (каталог)
    catalogQuantityProduct = document.getElementById('catalogQuantityProduct_'+productId);
    if(catalogQuantityProduct != null) { // сбрасываем колличество
        catalogQuantityProduct.innerHTML = 1;
        catalogProductQuantityBlock = document.getElementById('cart_add-plus_minus-container_'+productId).classList.add('display-none'); // скрываем кнопки - + обновления товара
        catalogProductBuyButton = document.getElementById('cartAddButton_'+productId).classList.remove('display-none'); // показываем кнопку добавления в корзину
    }

    miniCartChanges();
}

function cartMinusProduct(productId) { // минус единица продукта
    quantityBlockContainer = document.getElementById('cart_add-plus_minus-container_'+productId); // блок с колличеством добовляемого товара
    quantityBlock = document.getElementById('catalogQuantityProduct_'+productId); // элемент с колличеством добавляемого товара
    if(Number(quantityBlock.innerHTML) > 1) {
        quantityBlock.innerHTML = Number(quantityBlock.innerHTML) - 1; // приводим к числу и отнимаем единицу

        cartUpdate(productId);
    } else {
        cartAddButton = document.getElementById('cartAddButton');
        if(cartAddButton == undefined) { // на странице каталога
            quantityBlockContainer.classList.add('display-none'); // скрываем переключалку колличесвта товара
            cartAddButton = document.getElementById('cartAddButton_'+productId);
            cartAddButton.classList.remove('display-none'); // показываем кнопку добавления товара
        } else { // на странице продукта
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

function miniCartChanges() {
    miniCartProductsWrapper = document.getElementById('hf_cart-products_wrapper'); // обертка продуктов мини корзины
    miniCartProductBlocks = miniCartProductsWrapper.querySelectorAll('.cart-item'); // блоки продуктов мини корзины

    if(miniCartProductBlocks.length > 0) { // если в корзине есть продукты
        // меняем количество на иконке мини корзины
        miniCartCountIcon = document.getElementById('mini-cart_count').innerHTML = miniCartProductBlocks.length;

        // считаем общую сумму продуктов в корзине и записываем итог в мини корзину
        let miniCartTotalSum = 0; // общая сумма
        for (let i = 0; i < miniCartProductBlocks.length; i++) { // подсчитываем сумму
            productPrice = miniCartProductBlocks[i].querySelector('.color-black').innerHTML;
            productQuantity = miniCartProductBlocks[i].querySelector('.quantity_get-value').value;

            miniCartTotalSum = miniCartTotalSum + parseInt(productPrice) * productQuantity;
        }
        miniCartTotalSumElement = document.getElementById('mini-cart_total-price').innerHTML = miniCartTotalSum; // записываем итоговую сумму в мини корзину

        // скрываем заглушку пустой корзины и показываем элементы корзины
        emptyMiniCartBlock = document.getElementById('mini-cart_empty-wrapper');
        if(emptyMiniCartBlock.classList.contains('display-none') == false) {
            emptyMiniCartBlock.classList.add('display-none'); // скрываем заглушку

            document.getElementById('mini-cart_top-info').classList.remove('display-none'); // показываем топ мини корзины
            document.getElementById('mini-cart_bottom-info').classList.remove('display-none'); // показываем боттом мини корзины
        }
    } else { // если в корзине нет продуктов
        // меняем количество на иконке мини корзины
        miniCartCountIcon = document.getElementById('mini-cart_count').innerHTML = miniCartProductBlocks.length;

        // показываем заглушку пустой корзины и скрываем элементы корзины
        emptyMiniCartBlock.classList.remove('display-none'); // показываем заглушку

        document.getElementById('mini-cart_top-info').classList.add('display-none'); // скрываем топ мини корзины
        document.getElementById('mini-cart_bottom-info').classList.add('display-none'); // скрываем боттом мини корзины
    }
}
/* удаление продукта / обновление продукта / добавление продукта в корзину / каталог -- end */


/* cart header -----------------------------------  */

/* cart header -------------------------------- end */