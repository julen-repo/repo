<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            /* Updated background color */
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
            /* Updated hover color */
        }

        /* Heading Styling */
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #6B73FF;
            /* Updated color */
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
            /* Updated hover color */
            color: #fff;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Usuario: <?php echo htmlspecialchars($_GET["usuario"]); ?></th>
            <th><a href="index.php">Home</a></th>
            <th><a href="index.php">Ver carrito</a></th>
            <th><a href="index.php">Cerrar sesión</a></th>
        </tr>
    </table>
    <h1>Lista de Categorías</h1>
    <ul>
        <li><a href="index.php">Bebidas con alcohol</a></li>
        <li><a href="index.php">Bebidas sin alcohol</a></li>
        <li><a href="index.php">Comida</a></li>
    </ul>
</body>

</html>