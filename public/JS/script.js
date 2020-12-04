$(document).ready(
    getAjax()
)

// Open and close filters
$(".dropbtn").click(function(){

   let btn = $(this).next().attr('class')

   if (btn === 'dropdown-content show'){
       $(this).next().removeClass('show')
   } else {
       $(this).next().addClass('show')
   }
});

//Sort cards
$('.btn-sort').click(function () {
    let sort = $(this).attr('name')
    showFilters(sort)
})

//Start filter
$('#Show').click(function () {
    showFilters()
})

//Search
$('#search-btn').click(function () {
    getAjax()
})

// ---------------------------- Functions ----------------------------- //
// -------------------------------------------------------------------- //

//Universal AJAX for filters of Products
function getAjax(sort, arrPrice, arrColor, arrBrand, arrMaterial, arrCountry) {
    $.ajax({
        url: 'http://basicserver/index/filters',
        method: 'post',
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: {
            search : $('#search-line').val(),
            sort : sort,
            arrPrice : arrPrice,
            arrColor : arrColor,
            arrBrand : arrBrand,
            arrMaterial : arrMaterial,
            arrCountry: arrCountry,
        },
        success: function(dataResult) {
            clearCatalog()
            selectProduct(dataResult)
        }
    })
}

//размещение товаров на странице
function selectProduct(data) {
    for (let i = 0; i < data.length; i++){
        $("#cont-for-cards").append(`
            <div class="card">
                <div class="contParam">
                    <img src="${data['Photo']}" alt="">
                    <div class="name_prod">${data[i]['Name']}</div>
                    <div>Country: ${data[i]['Country']}</div>
                    <div>Material: ${data[i]['Material']}</div>
                    <div>Color: ${data[i]['Color']}</div>
                    <div class="price_prod">Prise: ${data[i]['Price']}</div>
                </div>
            </div>`)
    }
}

//Очистка каталога
function clearCatalog() {
    $("#cont-for-cards").html("")
}

//found all names of checked checkboxes
function showFilters(sort){
    let arrPrice = ''
    let arrColor = ''
    let arrBrand = ''
    let arrMaterial = ''
    let arrCountry = ''

    $.each($('.check:checked'), (number, elem) => {
        let param = $(elem).attr('name')
        let checkClass = $(elem).attr('class')

        switch (checkClass) {
            case 'price check':
                arrPrice += param + " "
                break;
            case 'colors check':
                arrColor += param + " "
                break;
            case 'brands check':
                arrBrand += param + " "
                break;
            case 'materials check':
                arrMaterial += param + " "
                break;
            case 'country check':
                arrCountry += param + " "
                break;
        }
    });
    getAjax(sort, arrPrice, arrColor, arrBrand, arrMaterial, arrCountry)
}