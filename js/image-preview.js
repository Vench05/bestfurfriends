// image revciew modal
(() => {
    $('#blah').hide();
})();

function readURL(input) {
    $('#blah').show();
    if (input.files) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});

document.getElementById('reset').addEventListener('click', function () {
    $('#blah').hide();
});