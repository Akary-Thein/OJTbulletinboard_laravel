var loadFile = function (event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};

function resetimg() {
    var image = document.getElementById('output');
    image.src = "/img/default.png";
}
