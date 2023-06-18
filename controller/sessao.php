<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['pagina'] = $_POST['pagina'];
    $_SESSION['idPuzzle'] = $_POST['idPuzzle'];
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_SESSION['pagina'] = $_GET['pagina'];
    $_SESSION['idPuzzle'] = $_GET['idPuzzle'];
}
?>
<script>
    console.log(<?php echo $_SESSION['pagina'], $_SESSION['idPuzzle']; ?>);
</script>