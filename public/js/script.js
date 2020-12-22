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


/* admin panel - show image ------------------------------------ */
function adminShowImage(input) { // предворительный просмотр изображения
    let image = input.files[0];
    let reader = new FileReader(); // ридер файлов

    reader.readAsDataURL(image); // считываем файл как url

    reader.onload = function() { // выводим изображение
        let imgShowElement = document.getElementById('imgShowElement');
        imgShowElement.setAttribute('src', reader.result)
    };
}
function adminEditImg() {
    imageShowElement = document.getElementById('image_show_input').click();
}
function adminDeleteImg() {
    document.getElementById('image_show_input').value = '';
    document.getElementById('imgShowElement').setAttribute('src', 'http://storm-shop.loc/media/photos/photo5.jpg');

    deleteImageDB(); // удаление изображения в бд (страница редактирования)
}
function deleteImageDB() {
    // удаление изображения в бд (страница редактирования)
    delete_image = document.getElementById('delete_image');
    delete_image.setAttribute('value', 'yes');
}
/* admin panel - show image -------------------------------- end */



/* функции ----------------------------------------------------- */
function clickElem(info) { // имитация клика по элементу
    document.getElementById(info).click();
}
/* функции ------------------------------------------------- end */

/* текстовый редактор summernote ------------------------------- */
jQuery(function ($) {
    $("#text").summernote({
        height: 350,
        toolbar:[
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ],
    });
});
jQuery(function ($) {
    $("#text_en").summernote({
        height: 350,
        toolbar:[
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ],
    });
});

jQuery(function ($) {
    $("#description").summernote({
        height: 350,
        toolbar:[
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ],
    });
});
jQuery(function ($) {
    $("#description_en").summernote({
        height: 350,
        toolbar:[
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ],
    });
});

jQuery(function ($) {
    $("#information").summernote({
        height: 350,
        toolbar:[
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ],
    });
});
jQuery(function ($) {
    $("#information_en").summernote({
        height: 350,
        toolbar:[
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ],
    });
});
/* текстовый редактор summernote --------------------------- end */

/* манипуляции свойствами на странице продукта --- */
function attributeChange(data) {
    productId = data[0];
    valueId = data[1];
    attributeId = data[2];
    //console.log(productId);

    // получаем все элементы значений свойств выбранного продукта продукта
    attributesProductWrapper = document.getElementById('attributes-wrapper_product-'+productId); // обертка выбранного продукта
    allAttributeValuesElements =  attributesProductWrapper.getElementsByClassName('product-attribute_element'); // все элементы значений свойств продукта

    // делаем активным элемент по которому кликнули
    selectedElement = document.getElementById('value_'+valueId).classList.add('active');

    // проверка установленна ли комбинация
    combinationSet = false;
    for (i=0; i < allAttributeValuesElements.length; i++) {
        if(allAttributeValuesElements[i].classList.contains('attribute-value_disabled')) {
            combinationSet = true;
            break
        }
    }

    $.ajax({
        url:"/catalog/sku",
        type: "POST",
        data: {
            productId: productId, // передаем id продукта
            valueId: valueId, // передаем id свойства
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            //console.log(data);
            // формаруем два массива (1: с выбранной комбинацией. 2: с привязанными к выбранному значению значениями)
            // массив 1 (с выбранной комбинацией)
            splitDoubleArray = data.split('],[');
            raplaceOneArray = splitDoubleArray[0].replace('[', ''); // обрезаем лишнее
            split1OneArray = raplaceOneArray+']'; // массив с выбранной комбинацией

            // массив 2 (с привязанными к выбранному значению значения)
            raplaceTwoArray = splitDoubleArray[1].replace(']', ''); // обрезаем лишнее
            attachedValuesString = raplaceTwoArray.replace(']', ''); // строка с привязанными к выбранному значению значениями
            attachedValues = attachedValuesString.split(','); // массив с привязанными к выбранному значению значениями
            //console.log(attachedValues);

            // ==================================================================
            // получаем свойства в виде массива которые комбинируются с выбранным
            valuesBeforeReplaceSymbols = split1OneArray.split('","');
            combinableValues = []; // массив с комбинируемыми свойствами с выбранным свойством
            for (i=0; i < valuesBeforeReplaceSymbols.length; i++) {
                valuesBeforeReplaceSymbols_1 = valuesBeforeReplaceSymbols[i].replace('["', ''); // убираем лишние симфолы в начале строки
                valuesBeforeReplaceSymbols_2 = valuesBeforeReplaceSymbols_1.replace('"]', ''); // убираем лишние симфолы в конце строки
                combinableValues.push(valuesBeforeReplaceSymbols_2);
            }

            if(combinationSet == false) { // если аттрибут выбирается первый раз на странице
                // находим в html комбинируемые свойства и устанавливаем как комбинируемые
                for(i=0; i < allAttributeValuesElements.length; i++) {
                    if(combinableValues.indexOf(allAttributeValuesElements[i].getAttribute('data-value')) != -1 == true) { // если значение аттрибута комбинируется
                        allAttributeValuesElements[i].classList.remove('attribute-value_disabled');
                    } else { // если не комбинируется
                        allAttributeValuesElements[i].classList.remove('active');
                        allAttributeValuesElements[i].classList.add('attribute-value_disabled');
                    }
                }
            } else { // если выбранный аттрибут уже не первый выбранный на странице
                if(document.getElementById('value_'+valueId).classList.contains('attribute-value_disabled')) { // если кликнутый аттрибут вне комбинации
                    //console.log('1');
                    // находим в html комбинируемые свойства и устанавливаем как комбинируемые
                    for(i=0; i < allAttributeValuesElements.length; i++) {
                        if(combinableValues.indexOf(allAttributeValuesElements[i].getAttribute('data-value')) != -1 == true) { // если значение аттрибута комбинируется
                            allAttributeValuesElements[i].classList.remove('attribute-value_disabled');
                        } else { // если не комбинируется
                            allAttributeValuesElements[i].classList.remove('active');
                            allAttributeValuesElements[i].classList.add('attribute-value_disabled');
                        }
                    }
                } else { // если выбранный аттрибут в комбинации
                    //console.log('2');
                    // получаем элементы значений кликнутого атрибута
                    clickedAttributeElements = document.getElementById('attribute_'+attributeId).getElementsByClassName('product-attribute_element');
                    // делаем не активными все кроме кликнутого значения
                    for(i=0; i < clickedAttributeElements.length; i++) {
                        if(clickedAttributeElements[i].getAttribute('id') != 'value_'+valueId) {
                            clickedAttributeElements[i].classList.remove('active');
                        }
                    }

                    // формируем массив с привязаными значениями там что бы елементы массива были вида value_{{id}} как id значений
                    attachedValuesUpdatedArray = []; // обновленный массив
                    for(i=0; i < attachedValues.length; i++) {
                        attachedValuesUpdatedArray.push('value_'+attachedValues[i]);
                        //console.log(attachedValues[i]);
                    }
                    //console.log(attachedValuesUpdatedArray);

                    // получаем элементы значений паралельного атрибута
                    attributeContainers = document.getElementsByClassName('attribute_container'); // получаем все атрибуты на странице
                    for(i=0; i < attributeContainers.length; i++) { // находим паралельные атрибуты
                        if(attributeContainers[i].getAttribute('id') != ('attribute_'+attributeId)) { // находим паралельные атрибуты
                            valuesParallelAttrElems = attributeContainers[i].getElementsByClassName('product-attribute_element'); // значения паралельного атрибута
                            console.log('------------------------');
                            for(i=0; i < valuesParallelAttrElems.length; i++) {
                                if(attachedValuesUpdatedArray.indexOf(valuesParallelAttrElems[i].getAttribute('id')) != -1) { // если есть в массиве с привязаными значениями
                                    valuesParallelAttrElems[i].classList.remove('attribute-value_disabled'); // устанавливаем как комбинируемое
                                } else {
                                    valuesParallelAttrElems[i].classList.add('attribute-value_disabled'); // устанавливаем как не комбинируемое
                                }
                            }
                        }
                    }

                    // делаем не отключенными значения которые могут комбинироватся с выбранным
                    //console.log(clickedAttributeElements);
                }
            }

        }
    });
}
/* манипуляции свойствами на странице продукта end */

/* ajax теги (блог) --------------------------------------- */
function ajaxTag(tagId) {
    $.ajax({
        url:"/blog/tag",
        type: "POST",
        data: {
            id: tagId, // передаем id продукта
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            //console.log(data);
            document.getElementById('ajax_tag-articles').innerHTML = data;
        }
    })
}
/* ajax теги (блог) ----------------------------------- end */