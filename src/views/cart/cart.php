<!DOCTYPE html>
<html>

<meta charset="UTF-8">

<head>

    <title>GuitarKitty - Carrinho</title>
    <style>
        /* Estilos do seu site aqui */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header h1 {
            margin: 0;

        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        .cart-item {
            background-color: rgba(70, 70, 70, 0.205);
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .cart-item img {
            width: 80px;
            margin-right: 10px;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: bold;
        }

        .cart-item-price {
            color: #888;
        }

        .cart-total {
            font-weight: bold;
            text-align: right;
            margin-bottom: 5px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
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
        }

        header ul li a {
            color: #fff;
            text-decoration: none;
        }

        .buy-button {
            display: block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            text-align: center;
        }
    </style>

</head>

<body>
    <header>
        <h1>Carrinho de Compras</h1>
        <div class="options">
            <ul>
                <li><a href="/">Guitarras</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <div class="cart" id="cart">

            <div class="cart-total" id="cart-total">

            </div>
        </div>
        <a href="/payment" class="buy-button">Comprar</a>
    </div>

    <footer>
        &copy; 2023 Minha Loja Online
    </footer>

    <script>
        const cartList = document.getElementById('cart');
        const cartTotalDiv = document.getElementById('cart-total');
        let cartProducts = JSON.parse(getCookie('cart'));
        const cartTotal = cartProducts.reduce((acc, curr) => acc + curr.price, 0);
        console.log(cartTotal);
        cartTotalDiv.innerText = `Total: R$ ${cartTotal}`

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

        for (let i = 0; i < cartProducts.length; i++) {
            const cartProduct = cartProducts[i];
            const cartProductDiv = document.createElement("div");
            cartProductDiv.setAttribute("class", "cart-item")
            cartProductDiv.innerHTML = `
                <img src="${cartProduct.urlImage}" alt="Item ${cartProduct.id}">
                <div class="cart-item-info">
                    <div class="cart-item-name">${cartProduct.name}</div>
                    <div class="cart-item-price">R$ ${cartProduct.price}</div>
                </div>
                `;

            cartList.appendChild(cartProductDiv);
        }


    </script>
</body>

</html>