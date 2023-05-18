<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<head>
    <title>Fim de Venda</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header-container {
            background-color: #333;
            padding: 20px;
        }

        .store-name {
            color: #fff;
            text-align: center;
            margin: 0;
        }

        .checkout-container {

            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-summary h3,
        .delivery-details h3,
        .total-price h3 {
            margin-top: 0;
        }

        .order-items {
            list-style-type: none;
            padding: 0;
        }

        .order-items li {
            margin-bottom: 10px;
        }

        .delivery-details p {
            margin: 0;
        }

        .total-price p {
            margin: 0;
            font-weight: bold;
            font-size: 18px;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        .footer-container {
            font-size: 14px;
        }

        /* Estilos específicos do botão */
        .back-to-top-button {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #000000;
            padding: 10px 20px;
            text-decoration: none;
            width: auto;
            border-radius: 5px;
        }

        .back-to-top-button:hover {
            text-decoration: underline;
            background-color: #fc009b;
            border-color: #000000;
        }

        .cart {
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

        .button-home {
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            padding: 10px 25px;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-container">
            <h1 class="store-name">GuitarKitty</h1>
        </div>
    </header>

    <div class="checkout-container">
        <h2>Compra Concluída</h2>

        <div class="cart" id="cart">

            <div class="cart-total" id="cart-total">

            </div>
        </div>

        <button class='button-home' type="button" onclick="goToHomePage()">
            Voltar para a Home
        </button>
    </div>

    <footer>
        <div class="footer-container">
            <p>Todos os direitos reservados &copy; 2023 GuitarKitty</p>
        </div>
    </footer>

    <script>
        const productList = document.getElementById('cart');
        const totalDiv = document.getElementById('cart-total');
        let products = JSON.parse(getCookie('cart'));
        const total = products.reduce((acc, curr) => acc + curr.price, 0);
        console.log(total);
        totalDiv.innerText = `Total: R$ ${total}`

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

        for (let i = 0; i < products.length; i++) {
            const cartProduct = products[i];
            const productDiv = document.createElement("div");
            productDiv.setAttribute("class", "cart-item")
            productDiv.innerHTML = `
                <img src="${cartProduct.urlImage}" alt="Item ${cartProduct.id}">
                <div class="cart-item-info">
                    <div class="cart-item-name">${cartProduct.name}</div>
                    <div class="cart-item-price">R$ ${cartProduct.price}</div>
                </div>
                `;

            productList.appendChild(productDiv);
        }

        const goToHomePage = () => {
            deleteCookie('cart');
            window.location.href = "/";
        }

        function deleteCookie(cookieName) {
            document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        }
    </script>
</body>

</html>