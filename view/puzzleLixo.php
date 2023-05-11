<!DOCTYPE html>
<html>

<head>
    <title>Mover Imagens</title>
    <style type="text/css">
        .image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .image:nth-child(2) {
            top: calc(50% - 100px);
        }

        .image:nth-child(3) {
            left: calc(50% - 100px);
        }

        .image:nth-child(4) {
            left: calc(50% + 50px);
            top: calc(50% - 100px);
        }

        .image:nth-child(5) {
            left: calc(50% + 100px);
        }

        .image:nth-child(6) {
            top: calc(50% + 100px);
        }

        .selected {
            border: none;
        }
    </style>
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