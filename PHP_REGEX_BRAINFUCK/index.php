<!DOCTYPE html>
<html lang="sv">

<head>
    <title>Making Brainfuck in PHP Regex</title>


    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin-left: 10em;
            background-color: lightgray;
            align-content: center;
        }

        textarea {
            height: 15em;
            width: 100%;
        }

        form {
            align-content: center;
            background-color: #7cb06d;
            padding: 1em;
            border-radius: 0.25em;
            width: max-content;
            min-width: 40em;
        }

        h1 code {
            background-color: #333;
            border-radius: 0.5em;
            color: #0cedda;
            padding: 15px;
            border: 0px solid #999;
            width: 10em;
        }

        div {
            background-color: #333;
            border-radius: 0.5em;
            color: #0cedda;
            padding: 15px;
            border: 0px solid #999;
            display: block;
            width: 40em;
        }

        code {
            white-space: pre-line;
            word-wrap: break-word;
            width: 45%;
        }
    </style>
</head>

<body>
    
    <h1>Making Brainf**k in <code>Regex</code></h1>
    
    <form action="index.php" method="get">
        Code:<br><textarea type="text" placeholder="i.e +[<,.>]-" name="bfcode" required></textarea>
        <br><br>
        Input(s):<br><input type="text" placeholder="Enter your inputs (optional)" name="bfinput">
        <br><br>
        <input type="submit" value="Run">
    </form>
    
    <script>
        function drawShapes() {
            submit
        }
    </script>

    <?php
    $str = $_GET["bfcode"];
    $inputs = $_GET["bfinput"];
    $pattern = '/[^+\-,.<>[\]]/';

    ?>
    <p>Stage 1: Remove whitespace and comments...</p>
    <?php
    $str = preg_replace($pattern, "", $str);
    ?>
    <div><code>
        <?php
            echo "$str\n";
            ?>
        </code></div>
    <p>Stage 2: matched balenced parenthesis with a Scope ID example (<code>[[[]]]</code> to
    <code>0[1[2[]2]1]0)</code>
</p>
<?php

$other = '';
$i = 0;
$pattern = "/(.*)(?<!$i)\(.+\)(?!$i)(.*)/";
    $subst = "$0$1$2";
    
    while (preg_match($pattern, $str)) {
        $other = strval($i++);
        $subst = "$other$0$other";
        $str = preg_replace($pattern, $subst, $str);
        echo $str;
    }
    echo $str;

    for ($i = 0; $i < 255; $i++) {
        $other = chr($i);
    }

    ?>

    <p>Stage 3: adding overhead and input</p>

    <div><code>
        <?php
            echo $str = "ABC...\n$inputs\n$str\n";
            $gray = '/\((?>\((?<c>)|[^()]+|\)(?<-c>))*(?(c)(?!))\)/';
            ?>
        </code></div>
        <p>Stage 4: execute and output result</p>
        
        <div><code>
            
        <?php $gray = '/\((?>\((?<c>)|[^()]+|\)(?<-c>))*(?(c)(?!))\)/'; ?>
        123
        <?php
            // echo  . "\n";
            ?>
        </code></div>
        <script>document.getElementById('inputBox').addEventListener('input', drawShapes);</script>
</body>

</html>