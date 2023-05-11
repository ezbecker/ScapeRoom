<!DOCTYPE html>
<html>

<head>
    <title>Arrastar Elementos</title>
    <style type="text/css">
        #box {
            width: 100px;
            height: 100px;
            background-color: #b2dfdb;
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
</head>

<body>
    <div id="box"></div>

    <script type="text/javascript">
        const box = document.getElementById('box');
        let offsetX = 0;
        let offsetY = 0;

        box.addEventListener('mousedown', function(e) {
            offsetX = e.clientX - box.offsetLeft;
            offsetY = e.clientY - box.offsetTop;
            document.addEventListener('mousemove', moveBox);
            document.addEventListener('mouseup', stopMovingBox);
        });

        function moveBox(e) {
            box.style.left = (e.clientX - offsetX) + 'px';
            box.style.top = (e.clientY - offsetY) + 'px';
        }

        function stopMovingBox() {
            document.removeEventListener('mousemove', moveBox);
            document.removeEventListener('mouseup', stopMovingBox);
        }
    </script>
</body>

</html>