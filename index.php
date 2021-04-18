<?php
$name = '';
$ipv4 = $_SERVER['REMOTE_ADDR'];
if (isset($_POST['name'])) {
    $request_time =  DateTime::createFromFormat('U.u', $_SERVER['REQUEST_TIME_FLOAT'])->format("Y-m-d H:i:s.u");
    preg_match('/[A-Za-z0-9]+/', $_POST['name'], $m);
    if (isset($m))
        $name = $m[0];
    file_put_contents('log.txt', "$request_time => $name [$ipv4]\n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUZZER</title>
    <style>
        .button {
            display: inline-block;
            padding: 0.75rem 1.25rem;
            border-radius: 10rem;
            color: #fff;
            text-transform: uppercase;
            font-size: 1rem;
            letter-spacing: 0.15rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: 0;
        }

        .button:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0cf;
            border-radius: 10rem;
            z-index: -2;
        }

        .button:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: #008fb3;
            transition: all 0.3s;
            border-radius: 10rem;
            z-index: -1;
        }

        .button:hover {
            color: #fff;
        }

        .button:hover:before {
            width: 100%;
        }

        /* optional reset for presentation */
        * {
            font-family: Arial;
            text-decoration: none;
            font-size: 20px;
        }

        .container {
            padding-top: 50px;
            margin: 0 auto;
            width: 100%;
            text-align: center;
        }

        h1 {
            text-transform: uppercase;
            font-size: 0.8rem;
            margin-bottom: 2rem;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h1>Sei
                <input type="text" style="font-size: 16px;" name="name" placeholder="Nome" value="<?= $name; ?>">
                [<?= $ipv4; ?>]
            </h1>
            <button class="button" type="submit">BUZZ</button>
        </form>
    </div>
</body>

</html>