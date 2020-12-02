$(document).ready(event =>{
    getAjax();
});

// Open and close filters
$(".dropbtn").click(function(){
   let btn = $(this).next().attr('class');
   if (btn === 'dropdown-content show'){
       $(this).next().removeClass('show');
   } else {
       $(this).next().addClass('show');
   }
});

//Start filter
$('#Show').click(function () {
    let arrPrice = ''
    let arrColor = ''
    let arrBrand = ''
    let arrMaterial = ''
    let arrCountry = ''

    //found all names of checked checkboxes
    $.each($('.check:checked'), (number, elem) => {
        let param = $(elem).attr('name')
        let checkClass = $(elem).attr('class')

        switch (checkClass) {
            case 'price check':
                arrPrice += param + " ";
                break;
            case 'colors check':
                arrColor += param + " ";
                break;
            case 'brands check':
               arrBrand += param + " ";
                break;
            case 'materials check':
                arrMaterial += param + " ";
                break;
            case 'country check':
                arrCountry += param + " ";
                break;
        }
    });
    getAjax(arrPrice, arrColor, arrBrand, arrMaterial, arrCountry);
    //console.log(arrPrice)
    //console.log(arrColor)
    //console.log(arrBrand)
    //.log(arrMaterial)
    //.log(arrCountry)

    //Подготовить запрос
});

//Search
$('#search-btn').click(function () {

});
function getAjax(arrPrice, arrColor, arrBrand, arrMaterial, arrCountry) {
    $.ajax({
        url: 'http://basicserver/index/filters',
        method: 'POST',
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: {
            arrPrice: arrPrice,
            arrColor : arrColor,
            arrBrand : arrBrand,
            arrMaterial : arrMaterial,
            arrCountry: arrCountry,
        },
        success: function(dataResult) {
            console.log(arrPrice)
            //console.log(arrColor)
            //console.log(arrBrand)
            //console.log(arrMaterial)
            //console.log(arrCountry)
            selectProduct(dataResult)
        },
        complete: function() {
           // console.log(arrPrice)
        }
    });
}

//размещение товаров на странице
function selectProduct(data) {
    for (let i = 0; i < data.length; i++){
        $("#cont-for-cards").append(`
            <div class="card">
                <div class="contParam">
                    <img src="${data['Photo']}">
                    <div class="name_prod">${data[i]['Name']}</div>
                    <div>Country: ${data[i]['Country']}</div>
                    <div>Material: ${data[i]['Material']}</div>
                    <div>Color: ${data[i]['Color']}</div>
                    <div class="price_prod">Prise: ${data[i]['Prise']}</div>
                </div>
            </div>`);
    }
}