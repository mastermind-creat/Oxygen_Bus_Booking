<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxygen Bus Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to right, #13b8ef, #0a6a9d);
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            animation: fadeIn 1s;
        }

        h2 {
            font-size: 1.5em;
            margin-bottom: 40px;
            animation: fadeIn 1.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .button-container {
            display: flex;
            gap: 20px;
        }

        .button {
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 15px 30px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .button:hover {
            background-color: #e68900;
            transform: translateY(-3px);
        }

        .button:after {
            content: '';
            position: absolute;
            left: 50%;
            top: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: width 0.4s ease, height 0.4s ease, top 0.4s ease, left 0.4s ease;
            z-index: 0;
            transform: translate(-50%, -50%) scale(0);
        }

        .button:hover:after {
            width: 400%;
            height: 400%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
        }

        .button span {
            position: relative;
            z-index: 1;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.2em;
            }

            .button {
                font-size: 1em;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <h1>Oxygen Bus Management System</h1>
    <h2>Vehicle Selection</h2>
    <div class="button-container">
        <a href="busseat.php" class="button"><span>Bus</span></a>
        <a href="seat.php" class="button"><span>Shuttle</span></a>
    </div>
</body>
</html>
