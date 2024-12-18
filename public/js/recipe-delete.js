function confirmDelete() {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette recette ?')) {
        document.getElementById('delete-recipe-form').submit();
    }
}