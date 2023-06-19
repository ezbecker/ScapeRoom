<head>
    <?php
    session_start();
    if (isset($_SESSION['pagina']) && isset($_SESSION['idPuzzle'])) {
        $pagina = $_SESSION['pagina'];
        $idPuzzle = $_SESSION['idPuzzle'];
    }
    ?>
    <link rel="stylesheet" href="css/game.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/areasClicaveis.css">
    <link rel="stylesheet" href="css/frame.css">
</head>

<body>

    <div class="data">
        <div class="playing">
            <h1>Jogando</h1>
            <p><?php echo $nome; ?></p>
        </div>

        <?php
        if ($pagina != 1) {
        ?>
            <div class="goal">
                <h1>Objetivo atual</h1>
                <?php
                if ($pagina >= 0 && $pagina <= 9)
                    echo '<p>Saia do quarto</p>';
                else if ($pagina >= 10 && $pagina <= 23)
                    echo '<p>Descubra o código do elevador</p>';
                else if ($pagina >= 24 && $pagina <= 50)
                    echo '<p>Consiga acesso às escadas</p>';
                ?>
            </div>

            <div class="time">
                <h1>Tempo total restante</h1>
            <?php
            echo '<p id="cronometro"></p>';
        }
            ?>
            </div>
    </div>

    <div class="iframe-container" id="content">

    </div>
    <div id="mensagem"></div>

    <script src="../js/redirecionarPags.js"></script>
    <script src="../js/atualizarConteudo.js"></script>
    <script src="../js/cronometro.js"></script>
</body>