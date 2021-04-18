<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONITOR</title>
    <style>
        #log {
            height: 300px;
            font-size: 16px;
            color: white;
            background-color: black;
            overflow: scroll;
            font-family: 'Inconsolata', monospace;
            resize: both;
        }
    </style>
</head>

<body>
    <pre id="log"></pre>
    <label for="sec">
        Aggiorna ogni
    </label>
    <input type="number" name="sec" id="sec" value="3"> secondi
    <script>
        function fetchLog() {
            fetch('log.txt')
            .then(resp => resp.text())
            .then(txt => {
                log.innerHTML = txt;
                log.scrollTo(0,log.scrollHeight);
                setTimeout(fetchLog, sec.value*1000);
            });
        }
        fetchLog();
    </script>
</body>

</html>