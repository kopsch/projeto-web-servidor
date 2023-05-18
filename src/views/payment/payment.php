<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Minha Loja Online</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <style>
    /* Estilos personalizados aqui */
    .product {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .product img {
      width: 80px;
      margin-right: 10px;
    }

    .product-info {
      flex: 1;
    }

    .product-name {
      font-weight: bold;
    }

    .product-price {
      color: #888;
    }

    .add-to-cart {
      background-color: #4caf50;
      color: #fff;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .cart {
      margin-top: 20px;
      border: 1px solid #ddd;
      padding: 10px;
    }

    .cart-item {
      margin-bottom: 5px;
    }

    .checkout-form {
      max-width: 500px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group select {
      width: 100%;
      padding: 8px;
      border: 1px solid #fd0000;
      border-radius: 4px;
    }

    .form-group.btn {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .form-group.btn:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand mx-auto" href="/">GuitarKitty</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/cart">Carrinho</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="checkout-form">
      <h2>Checkout</h2>
      <div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="address">Endereço:</label>
            <input type="text" id="address" name="address" class="form-control" required />
          </div>
          <div class="form-group col-md-6">
            <label for="payment">Forma de Pagamento:</label>
            <select id="payment" name="payment" class="form-control" required>
              <option value="">Selecione</option>
              <option value="credit">Cartão de Crédito</option>
              <option value="debit">Cartão de Débito</option>
              <option value="paypal">PayPal</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary" onclick="goToEndPage()">
            Realizar Pagamento
          </button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const goToEndPage = () => {
      window.location.href = "/payment-finalized";
    }
  </script>
</body>

</html>