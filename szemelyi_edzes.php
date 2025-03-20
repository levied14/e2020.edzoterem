<?php
    
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "energym";

    
    try {
        $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

        
        if ($conn->connect_error) {
            throw new Exception("Kapcsolódási hiba: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        echo "Nem sikerült csatlakozni az adatbázishoz! Hiba: " . $e->getMessage();
        exit();
    }

    
    $sql = "SELECT nev, leiras, telefon, email, kor, eredmeny, kep_url FROM edzok";
    $result = $conn->query($sql);

    
    $edzok = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $edzok[] = $row;
        }
    } else {
        $uzenet = "Nincs megjeleníthető edző.";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENERGYM - Személyi Edzők</title>
    <style>
         {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #000;
            color: yellow;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: yellow;
            padding: 1em 0;
            text-align: center;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .edzoi-lehetoseg {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
            align-items: flex-start;
        }

        .edzo {
            background: #222;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(255, 255, 0, 0.3);
            width: 250px;
            height: 320px;
            text-align: center;
            color: yellow;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
            cursor: pointer;
			ba
        }

        .edzo.flipped {
            transform: rotateY(180deg);
        }

        .edzo .kártya-előre, .edzo .kártya-vissza {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .edzo .kártya-előre {
            background: #222;
        }

        .edzo .kártya-vissza {
            background: #444;
            transform: rotateY(180deg);
            color: yellow;
        }

        .edzo img {
            width: 150px;
            height: 300px;
            border-radius: 30%;
            border: 2px solid yellow;
            margin-bottom: 10px;
        }

        .vissza-gomb {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: yellow;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
			
        }

        .vissza-gomb:hover {
            background-color: #ccc;
        }

        footer {
            text-align: center;
            color: yellow;
            background-color: #333;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>ENERGYM - Személyi Edzők</h1>
    </header>

    <div class="container">
        <a href="edzoterem.html" class="vissza-gomb">Vissza a Kezdőoldalra</a>
        <h2>Ismerd meg személyi edzőinket</h2>
        <div class="edzoi-lehetoseg">
            <?php if (!empty($edzok)) : ?>
                <?php foreach ($edzok as $edzo) : ?>
                    <div class='edzo' onclick="flipCard(this)">
                        <div class='kártya-előre'>
                            <img src='<?= htmlspecialchars($edzo["kep_url"]) ?>' alt='<?= htmlspecialchars($edzo["nev"]) ?>'>
                            <h3><?= htmlspecialchars($edzo["nev"]) ?></h3>
                            <p><?= htmlspecialchars($edzo["leiras"]) ?></p>
                        </div>
                        <div class='kártya-vissza'>
                            <p>Telefon: <?= htmlspecialchars($edzo["telefon"]) ?></p>
                            <p>Email: <?= htmlspecialchars($edzo["email"]) ?></p>
                            <p>Kor: <?= htmlspecialchars($edzo["kor"]) ?></p>
                            <p>Legjobb eredmény: <?= htmlspecialchars($edzo["eredmeny"]) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p><?= $uzenet ?? "Nincs megjeleníthető edző." ?></p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>Kapcsolat: info@energym.hu | © 2024 ENERGYM</p>
    </footer>

    <script>
        function flipCard(card) {
            card.classList.toggle('flipped');
        }
    </script>
</body>
</html>