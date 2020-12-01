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

    $.ajax({
        url: 'http://basicserver/controllers/Controller_Index.php',
        method: 'POST',
        contentType: 'application/x-www-form-urlencoder',
        dataType: 'json',
        data: {
            arrPrice: arrPrice,
            arrColor : arrColor,
            arrBrand : arrBrand,
            arrMaterial : arrMaterial,
            arrCountry: arrCountry
        },
        complete: function(data) {
            selectProduct(data['responseJSON']);
        }
    })
    //Подготовить запрос
});

//Search
$('#search-btn').click(function () {

});

//размещение товаров на странице
function selectProduct(data) {
    for (let i; i < data.length; i++){
        $('#cont-for-cards').append('<div class="card"></div>')
        $('.card').append(`<img src="${data[i][5]}" alt="alt"> <div class="contParam"></div>`)
        $('.contParam').append(`<div class="name_prod">${data[i][2]}
            <div>Country: ${data[i][6]}</div>
            <div>Material: ${data[i][3]}</div>
            <div>Color: ${data[i][2]}</div>
            <div class="price_prod">${data[i][7]}</div>`)
        
    }
}