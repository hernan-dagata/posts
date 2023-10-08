window.showEditModal = function(id, name) {
    document.getElementById('updateCategoryForm').action = '/categories/' + id;
    document.getElementById('editCategoryName').value = name;
    $('#editCategoryModal').modal('show');
}

function updateCategory() {
    var form = document.getElementById('updateCategoryForm');
    axios.put(form.action, {
        'nombre': form.nombre.value
    })
    .then(function (response) {
        $('#editCategoryModal').modal('hide');
        location.reload();
    })
    .catch(function (error) {
        console.error('Error actualizando categoría:', error);
    });
}
