<body onload="sortearSlide()">

</body>

<script>
    var slides = [
        "https://docs.google.com/presentation/d/1CXgvLcUBjJd_9u8_dqEA9Y2Lfhvqus2AF_I8m7umDAA/edit#slide=id.g24147439be2_0_0"
    ];

    // função para redirecionar para um slide aleatório
    function sortearSlide() {
        // gerar um número aleatório entre 0 e o número de slides - 1
        var index = Math.floor(Math.random() * slides.length);
        // redirecionar para o slide correspondente
        window.location.href = slides[index];
    }
</script>