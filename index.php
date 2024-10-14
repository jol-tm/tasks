<?php 
    session_start();

    if (!isset($_SESSION['notes'])) {
        $_SESSION['notes'] = array();
    } elseif (!empty($_POST['inputx'])) {
        array_push($_SESSION['notes'], $_POST['inputx']);
        header('Location: index.php');
    }

    if (isset($_POST['clear'])) {
        session_destroy();
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <style>
        body {
            display: flex;
            align-items: center;
            flex-direction: column;
            font-family: "Arial";
            text-align: center;
            background-color: #383838;
            color: #fff;
        }
        input, button {
            outline: none;
            margin: .5rem 0;
            padding: .5rem;
            border: none;
            border-radius: .3rem;
        }
        .bx {
            display: flex;
            justify-content: center; 
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            max-width: 70vw;
            margin: 1rem 0;
            padding: 1rem;
            border: 2px solid #fff;
            border-radius: .5rem;
        }
        .ct {
            word-break: break-word;
            width: 90%;
        }
    </style>
</head>
<body>
    <h1>Tasks</h1>
    <form action="index.php" method="post">
        <input type="text" placeholder="Insert here your note..." name="inputx">
        <button type="submit">+</button>
        <button type="submit" name="clear">Clear</button>
    <?php 
        if (isset($_POST['idx'])) {
            unset($_SESSION['notes'][$_POST['idx']]);
        }

        foreach ($_SESSION['notes'] as $index => $note) {
            echo "<div class='bx'><div class='ct'>$note</div><button type='submit' name='idx' value='$index'>✔</button></div>";
        }
    ?>
    </form>
</body>
</html>