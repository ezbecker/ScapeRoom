<?php
require_once "../model/incluirPartida.php";
?>

<body onload="sortearSlide()">

</body>

<script>
    var slides = [
        "../view/slides.php?slide=3"
    ];

    // função para redirecionar para um slide aleatório
    function sortearSlide() {
        // gerar um número aleatório entre 0 e o número de slides - 1
        var index = Math.floor(Math.random() * slides.length);
        // redirecionar para o slide correspondente
        window.location.href = slides[index];
    }
</script>