let openFileInput = (event) => {
    event.preventDefault();
    let imageInput = document.getElementById("image");
    imageInput.click();
};

let image = document.getElementById("image");

image.addEventListener("change", function (event) {
    let file = event.target.files[0];
    var reader = new FileReader();
    let imagenMuestra = document.getElementById("imagen-muestra");
    reader.onloadend = function () {
        imagenMuestra.style.backgroundImage = "url(" + reader.result + ")";
    };

    if (file) {
        reader.readAsDataURL(file);
        imagenMuestra.classList.remove('d-none');
        document.getElementById('btnOpenFileSel').value = "EDIT"
    }else {
        imagenMuestra.classList.add('d-none');
        document.getElementById('btnOpenFileSel').value = "CHOOSE FILE";
    }
});
