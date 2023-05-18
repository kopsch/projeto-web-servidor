<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>GuitarKitty</title>

    <style>
        /* Estilos básicos */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilo do header */
        header {
            background-color: #333;
            color: #ff07f3;
            padding: 10px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            align-items: center;
        }

        /* Estilo do título do header */
        .header_h1 {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            flex: 1;
            text-align: center;
        }

        header ul {
            list-style-type: none;
            margin: 0;
            padding: 10;
            text-align: right;
        }

        header ul li {
            display: inline-block;
            margin-left: 10px;
            padding: 10px;
            margin-right: 20px;
            color: #fff;
            position: relative;
        }

        header ul li a {
            color: #fff;
            text-decoration: none;
        }

        header ul li a:hover {
            color: rgb(255, 0, 191);
        }

        /* Estilo do menu lateral */
        .sidebar {
            background-color: #f1f1f1;
            float: left;
            width: 200px;
            height: 100vh;
            /* altura total da viewport */
            font-family: Arial, Helvetica, sans-serif;
            font-size: large;

        }

        /* Estilo do conteúdo principal */
        .content {
            font-family: Arial, Helvetica, sans-serif;
            margin-left: 200px;
            /* mesma largura do menu lateral */
            padding: 30px;
            position: center;
        }


        /* Estilo da barra de pesquisa */
        .search-bar {
            margin-right: 140px;
            margin-top: 20px;
            text-align: center;

        }

        .search-bar input[type="text"] {
            padding: 8px;
            width: 300px;
        }

        .search-bar input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-bar input[type="submit"]:hover {
            background-color: rgb(255, 0, 191);

        }


        /* Estilo da listagem de itens */
        .item-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            margin-top: 10px;
            max-width: auto;
        }

        .item {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            transition: box-shadow 0.3s ease;
            max-width: 250px;
            /* Largura máxima ajustada para 250px */
            align-content: center;
            margin-left: auto;
            margin-right: auto;

        }

        .item:hover {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .item .image-container {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .item .image-container img {
            max-width: 100%;
            height: auto;
        }

        .item h3 {
            margin-top: 10px;
        }

        .item p {
            color: #888;
        }

        .add-to-cart-btn {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            position: relative;

        }

        .add-to-cart-btn:hover {
            background-color: rgb(255, 0, 191);

        }

        /* Estilo do footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            margin-top: 30px;
        }

        .site-icon {
            width: 520px;
            /* Defina a largura desejada */
            height: 500px;
            /* Defina a altura desejada */
        }

        /* Estilo da logo */
        #logo {
            max-width: 70px;
            max-height: 100px;
            display: inline-block;
            margin-left: 5px;
        }

        #logo img {
            max-width: 100%;
            max-height: 100%;
        }

        #quantity-cart {
            position: absolute;
            right: 0px;
            top: 0;
            font-size: 8px;
            background-color: #000;
            padding: 4px 5px;
            border-radius: 100%;
        }
    </style>
</head>

<body>
    <header>
        <div id="logo">
            <img src="/front-end/imagens/logo.png" alt="">
        </div>
        <div class="header_h1" id="title">
            <h1>Guitar Kitty</h1>
        </div>
        <div class="options">
            <ul>
                <li><a href="/">Guitarras</a></li>
                <li><a href="/cart">Carrinho</a><span id="quantity-cart"></span></li>
                <?php
                use Src\Controllers\UserController;

                if (isset($_COOKIE['project_token'])) {
                    $user = json_decode((new UserController)->getAuthenticatedUser(), 1);
                    $username = $user['data']['username'];

                    echo '<li>Olá, ' . $username . '</li>';
                } else {
                    echo '<li><a href="/login">Login</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>



    <div class="content">
        <p>GUITARRAS</p>
    </div>

    <div class="item-list" id="product-list">

    </div>

    <footer>
        &copy; 2023 Minha Loja Online;
    </footer>

    <script>
        const products = [
            {
                'id': 1,
                'name': 'Guitarra Golden GLD-155C BRB',
                'urlImage': 'https://www.musitechinstrumentos.com.br/files/pro_32643_g.jpg',
                'price': 1999.99
            },
            {
                'id': 2,
                'name': 'Guitarra Squier Bullet Stratocaster HT',
                'urlImage': 'https://x5music.vteximg.com.br/arquivos/ids/196573-547-547/GUITARRA-SUHR-01-SIG-0014-SIGNATURE-MATEUS-ASATO-CLASSIC-S-BLACK-OFF.jpg?v=637686941808100000',
                'price': 1549.99
            },
            {
                'id': 3,
                'name': 'Guitarra Fender Squier Hello Kitty',
                'urlImage': 'https://images-americanas.b2w.io/produtos/2665882360/imagens/guitarra-fender-squier-strato-hello-kitty-rosa-mostruario/2665882360_1_xlarge.jpg',
                'price': 9379.99
            },
            {
                'id': 4,
                'name': 'Guitarra Marmor GLD-155C BRB',
                'urlImage': 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkT02Y6-kw86i4D5S9FwcHe5b-Vo9b0ePpCg&usqp=CAU',
                'price': 1711.99
            },
            {
                'id': 5,
                'name': 'GUITARRA KLASS STRATOCASTER ST SB Sunburst',
                'urlImage': 'https://www.megadisconildo.com.br/wp-content/uploads/2023/01/6e6f8be5e8b0c6b9f6bf18625e239399.png',
                'price': 2711.99
            },
            {
                'id': 6,
                'name': 'Guitarra Preta EG 810 BK',
                'urlImage': 'https://ninjasom.vteximg.com.br/arquivos/ids/175470-1200-1200/Guitarra-Preta-EG-810-BK---Maclend.jpg?v=637578074149700000',
                'price': 3711.99
            },
        ]

        const productList = document.getElementById("product-list");
        let cartQuantityNumber = JSON.parse(getCookie('cart')).length;

        for (let i = 0; i < products.length; i++) {
            const product = products[i];
            const productDiv = document.createElement("div");
            productDiv.setAttribute("class", "item")
            productDiv.innerHTML = `
                <div class="image-container">
                    <img src="${product.urlImage}"
                    alt="Item ${product.id}">
                </div>
                <h3>${product.name}</h3>
                <p>R$ ${product.price}</p>
                <button class="add-to-cart-btn" onclick="addToCart(${product.id})">Adicionar ao Carrinho</button>
                `;

            productList.appendChild(productDiv);
        }

        function addToCart(productId) {
            const product = products.find(p => p.id === productId);

            const cart = JSON.parse(getCookie('cart')) || [];

            cart.push(product);

            setCookie('cart', JSON.stringify(cart));
            cartQuantityNumber = JSON.parse(getCookie('cart')).length;
            cartQuantity.innerText = cartQuantityNumber;
            
            alert('Produto adicionado ao carrinho!');
        }

        function getCookie(name) {
            const cookies = document.cookie.split(';');
            for (let i = 0; i < cookies.length; i++) {
                const cookie = cookies[i].trim();
                if (cookie.startsWith(name + '=')) {
                    return cookie.substring(name.length + 1);
                }
            }
            return '[]';
        }

        function setCookie(name, value, days = 7) {
            const date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            const expires = 'expires=' + date.toUTCString();
            document.cookie = name + '=' + value + ';' + expires + ';path=/';
        }

        let cartQuantity = document.getElementById("quantity-cart");
        cartQuantity.innerText = cartQuantityNumber;
        

    </script>
</body>

</html>