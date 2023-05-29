function sortearPagina() {
    var index = Math.floor(Math.random() * pagina.length);
    window.location.href = pagina[index];
}