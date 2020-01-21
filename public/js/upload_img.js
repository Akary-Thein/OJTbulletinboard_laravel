var loadFile = function (event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};

function resetimg() {
    var image = document.getElementById('output');
    image.src = "/img/default.png";
}


$('.show_confirm').click(function (e) {
    if (!confirm('Are you sure you want to delete this post?')) {
        e.preventDefault();
    }
});


$('#showmodal').on('show.bs.modal', function (e) {
    $("#modal-title").html($(e.relatedTarget).data('title'));
    $("#modal-description").html($(e.relatedTarget).data('description'));
    $("#modal-status").html($(e.relatedTarget).data('status'));
    $("#modal-created-at").html($(e.relatedTarget).data('created-at'));
    $("#modal-created-user").html($(e.relatedTarget).data('created-user'));
    $("#modal-updated-at").html($(e.relatedTarget).data('updated-at'));
    $("#modal-updated-user").html($(e.relatedTarget).data('updated-user'));
});
