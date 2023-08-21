<!DOCTYPE html>
<html>
<head>
  <title>Bienvenue!</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      text-align: center;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    h1 {
      margin-top: 0;
      color: #007bff;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      margin-bottom: 10px;
    }

    strong {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenue!</h1>
    <p>Voici vos identifiants :</p>
    <ul>
      <li><strong>Nom d'utilisateur :</strong> {{$info['name']}}</li>
      <li><strong>E-mail :</strong> {{$info['email']}}</li>
      <li><strong>Mot de passe :</strong> {{$info['password']}}</li>
    </ul>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
