<!DOCTYPE html>
<html>

<head>
    <title>HelloKitty</title>
    <link href="product.css" rel="stylesheet">
    <style>
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
        }
    
        header ul li a {
          color: #fff;
          text-decoration: none;
        }
    
        header ul li a:hover {
          color: rgb(255, 0, 191);
        }
    
        .product-container {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
    
        .product {
          text-align: center;
          max-width: 400px;
          max-height: auto;
          padding: 20px;
          border: 1px solid #ddd;
          border-radius: 5px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          margin: 300px auto 0;
          /* Espaçamento superior adicionado */
          margin-left: auto 0;
          margin-top: 150px;
        }
    
        .product-image {
          width: 200px;
          height: 200px;
          object-fit: cover;
          margin-bottom: 20px;
        }
    
        .product-name {
          font-size: 24px;
          font-weight: bold;
          margin-bottom: 10px;
        }
    
        .product-description {
          margin-bottom: 20px;
        }
    
        .product-price {
          font-size: 18px;
          font-weight: bold;
        }
    
        .add-to-cart-button {
          background-color: #007bff;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 4px;
          font-size: 16px;
          cursor: pointer;
        }
    
        .add-to-cart-button:hover {
          background-color: #fc009b;
        }
    
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
      </style>
</head>

<body>
    <header>
    <div id="logo" style="width: 80px">
            <img style="width: 80px" src="https://i.imgur.com/bTybNbv.png" alt="">
        </div>
        <div class="header_h1" id="title">
            <h1>Guitar Kitty</h1>
        </div>
        <div class="options">
            <ul>
            <li><a href="/">Home</a></li>
                <li><a href="/cart">Carrinho</a></li>
            </ul>
        </div>

    </header>

    <div class="container">
        <div class="product">
            <img src="https://www.megadisconildo.com.br/wp-content/uploads/2023/01/6e6f8be5e8b0c6b9f6bf18625e239399.png" alt="Imagem do Produto"
                class="product-image">
            <h2 class="product-name">'GUITARRA KLASS STRATOCASTER ST SB Sunburst</h2>
            <p class="product-description">Para os baixistas que preferem um formato compacto, esta guitarra curta apresenta o icônico design Thunderbird em tamanho reduzido. Com um corpo em mogno e um braço em maple, proporciona um som encorpado e potente</p>
            <p class="product-price">R$ 2711.99</p>
            <button class="add-to-cart-button">Adicionar ao Carrinho</button>
        </div>
    </div>

    <footer>
        &copy; 2023 Minha Loja Online;
    </footer>
</body>

</html>