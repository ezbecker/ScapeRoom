function sortearSlide() {
    // gerar um número aleatório entre 0 e o número de slides - 1
    var index = Math.floor(Math.random() * slides.length);
    // redirecionar para o slide correspondente
    window.location.href = slides[index];
}