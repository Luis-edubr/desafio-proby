import $ from 'jquery';

function confirmDelete(event) {
    if (!confirm('Tem certeza que deseja excluir este projeto?')) {
        event.preventDefault();
    }
}

$('.delete').on('click', function(e) {
    confirmDelete(e);
});