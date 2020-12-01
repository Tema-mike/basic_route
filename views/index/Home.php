<html>
    <head lang="rus">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Каталог</title>
        <link href="/public/CSS/style.css" rel="stylesheet" type="text/css">

        <script src="/public/JS/jquery.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="filters">
                <div style="margin: 0 auto">Фильтры</div>

                <!-- Prise -->
                <div class="dropdown">
                    <button class="dropbtn">Prise</button>
                    <div id="myDrop" class="dropdown-content" >
                        <label for="price-s">
                            <input type="checkbox" class="price check" id="price-s" name="price-s">
                        </label>
                        <div>less than 100$</div>
                        <label for="price-m">
                            <input type="checkbox" class="price check" id="price-m" name="price-m">
                        </label>
                        <div>from 101$ till 300$</div>
                        <label for="price-l">
                            <input type="checkbox" class="price check" id="price-l" name="price-l">
                        </label>
                        <div>from 301$ till 500$</div>
                        <label for="price-xl">
                            <input type="checkbox" class="price check" id="price-xl" name="price-xl">
                        </label>
                        <div>more than 500$</div>
                    </div>
                </div>

                <!-- Colors -->
                <div class="dropdown">
                    <button class="dropbtn">Colors</button>
                    <div class="dropdown-content" >
                        <label>
                            <input id="col-red" name="col-red" class="colors check" type="checkbox">
                        </label>
                        <div>Red</div>
                        <label>
                            <input id="col-green" name="col-green" class="colors check" type="checkbox">
                        </label>
                        <div>Green</div>
                        <label>
                            <input id="col-blue" name="col-blue" class="colors check" type="checkbox">
                        </label>
                        <div>Blue</div>
                    </div>
                </div>

                <!-- Brands -->
                <div class="dropdown">
                    <button class="dropbtn">Brands</button>
                    <div id="myDrop2" class="dropdown-content">
                        <label>
                            <input id="brand1" name="brand1"class="brands check" type="checkbox">
                        </label>
                        <div>Brand 1</div>
                        <label>
                            <input id="brand2" name="brand2" class="brands check" type="checkbox">
                        </label>
                        <div>Brand 2</div>
                        <label>
                            <input id="brand3" name="brand3" class="brands check" type="checkbox">
                        </label>
                        <div>Brand 3</div>
                    </div>
                </div>

                <!-- Materials -->
                <div class="dropdown">
                    <button class="dropbtn">Materials</button>
                    <div class="dropdown-content">
                        <label>
                            <input id="metal" name="metal" class="materials check" type="checkbox" value="metal">
                        </label>
                        <div>Metal</div>
                        <label>
                            <input id="wood" name="wood" class="materials check" type="checkbox" value="wood">
                        </label>
                        <div>Wood</div>
                        <label>
                            <input id="plastic" name="materials plastic" class="materials check" type="checkbox">
                        </label>
                        <div>Plastic</div>
                    </div>
                </div>

                <!-- Country -->
                <div class="dropdown">
                    <button class="dropbtn">Countries</button>
                    <div class="dropdown-content">
                        <label>
                            <input id="Russia" name="Russia" class="country check" type="checkbox" value="Russia">
                        </label>
                        <div>Russia</div>
                        <label>
                            <input id="USA" name="USA" class="country check" type="checkbox" value="USA">
                        </label>
                        <div>USA</div>
                        <label>
                            <input id="China" name="China" class="country check" type="checkbox" value="China">
                        </label>
                        <div>China</div>
                    </div>
                </div>
                <button id="Show" name="Show">Show</button>
            </div>
            <div id="catalog">
                <div id="search-container">
                    <input type="search" class="search" id="search-line" name="searchLine" placeholder="Search...">
                    <button class="search" id="search-btn" name="searchBtn">Search</button>
                </div>
                <div id="cont-for-cards">

                </div>
            </div>
        </div>
        <script src="/public/JS/script.js"></script>
    </body>
</html>
