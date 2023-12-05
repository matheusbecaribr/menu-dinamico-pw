<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }
        legend {
            font-size: 1.2em;
            font-weight: bold;
            color: #4CAF50;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="../php/login.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <input type="text" name="login" id="login" placeholder="Digite seu login:">
            <br><br>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha:">
            <br><br>
            <button type="submit" name="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>