window.showEditModalPost = function(id, idCategoria, descripcion) {
    document.getElementById('updatePostForm').action = '/posts/' + id;
    document.getElementById('editPostCategoria').value = idCategoria;
    document.getElementById('editPostDescripcion').value = descripcion;
    $('#editPostModal').modal('show');
}

function updatePost() {
    var form = document.getElementById('updatePostForm');
    axios.put(form.action, {
        'idCategoria': form.idCategoria.value,
        'descripcion': form.descripcion.value
    })
    .then(function (response) {
        $('#editPostModal').modal('hide');
        location.reload();
    })
    .catch(function (error) {
        console.error('Error actualizando post:', error);
    });
}