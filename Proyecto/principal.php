<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body Styling */
        body {
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Table Styling */
        table {
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
            background-color: #6B73FF;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table tr th {
            padding: 15px;
            text-align: left;
            color: #fff;
        }

        table tr th a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        table tr th a:hover {
            background-color: #5A63E0;
        }

        /* Heading Styling */
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #6B73FF;
        }

        /* Category List Styling */
        ul {
            list-style: none;
            width: 100%;
            max-width: 800px;
            padding: 0;
        }

        ul li {
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        ul li a {
            display: block;
            padding: 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        ul li a:hover {
            background-color: #6B73FF;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php

    session_start();

    // Verifica si el usuario está logueado, de lo contrario redirige a index.php
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit();
    }

    // Si el enlace de "Cerrar sesión" es presionado
    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    $usuario = $_SESSION['usuario'];
    ?>
    <table>
        <tr>
            <th>Usuario: <?php echo htmlspecialchars($usuario); ?></th>
            <th><a href=<?php echo "principal.php?usuario=" . $usuario; ?>>Home</a></th>
            <th><a href="index.php">Ver carrito</a></th>
            <th><a href="?logout=true">Cerrar sesión</a></th>
        </tr>
    </table>

    <h1>Lista de Categorías</h1>
    <ul>
        <li><a href="conAlcohol.php">Bebidas con alcohol</a></li>
        <li><a href="sinAlcohol.php">Bebidas sin alcohol</a></li>
        <li><a href="index.php">Comida</a></li>
    </ul>
</body>

</html>