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

$(document).on('click', "#edit-item", function () {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
        'backdrop': 'static'
    };
    $('#edit-modal').modal(options)
});

// on modal show
$('#edit-modal').on('show.bs.modal', function () {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('id');
    var title = el.data('title');
    var name = row.children(".name").text();
    var description = row.children(".description").text();

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-name").val(title);
    $("#modal-input-description").val(description);

});

// on modal hide
$('#edit-modal').on('hide.bs.modal', function () {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
});

$('.btnshow').click(function (e) {
    $("#showmodal").modal('show');
})
