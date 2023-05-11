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
        let selectedImage = null;

        function onImageMouseDown(event) {
            selectedImage = event.target;
            offsetX = event.clientX - selectedImage.offsetLeft;
            offsetY = event.clientY - selectedImage.offsetTop;
            document.addEventListener('mousemove', onImageMouseMove);
            document.addEventListener('mouseup', onImageMouseUp);
        }

        function onImageMouseMove(event) {
            if (selectedImage) {
                selectedImage.style.left = (event.clientX - offsetX) + 'px';
                selectedImage.style.top = (event.clientY - offsetY) + 'px';
            }
        }

        function onImageMouseUp() {
            selectedImage = null;
            document.removeEventListener('mousemove', onImageMouseMove);
            document.removeEventListener('mouseup', onImageMouseUp);
        }

        images.forEach(image => {
            image.addEventListener('mousedown', onImageMouseDown);
        });
    </script>
</body>

</html>