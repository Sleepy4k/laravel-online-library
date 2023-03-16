$(document).ready(function (e) {
    $(".logo-cover").change(function () {
        let reader = new FileReader();

        reader.onload = (e) => {
            $(".show-image-cover").attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    });
});
