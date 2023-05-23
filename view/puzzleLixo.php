<!DOCTYPE html>
<html>

<head>
    <title>Lixeira</title>
    <link rel="stylesheet" href="css/puzzleLixo.css">
</head>

<body>
    <img class="image" src="../assets/bilhete.png" width="305" height="104" />
    <img class="image" src="../assets/papel1.png" width="150" height="150" />
    <img class="image" src="../assets/papel3.png" width="150" height="150" />
    <img class="image" src="../assets/papel2.png" width="150" height="150" />
    <img class="image" src="../assets/papel1.png" width="150" height="150" />
    <img class="image" src="../assets/papel2.png" width="150" height="150" />
    <img class="image" src="../assets/papel3.png" width="150" height="150" />

    <script type="text/javascript">
        const images = document.querySelectorAll('.image');
        let offsetX = 0;
        let offsetY = 0;

        images.forEach(image => {
            let selected = false;
            image.addEventListener('mousedown', (event) => {
                selected = !selected;
                image.classList.toggle('selected', selected);
                offsetX = event.clientX - image.offsetLeft;
                offsetY = event.clientY - image.offsetTop;
            });
            image.addEventListener('mousemove', (event) => {
                if (selected) {
                    image.style.left = (event.clientX - offsetX) + 'px';
                    image.style.top = (event.clientY - offsetY) + 'px';
                }
            });
            image.addEventListener('mouseup', () => {
                dragging = false;
            });
        });
    </script>
</body>

</html>