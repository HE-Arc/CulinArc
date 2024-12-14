function deleteRecipe() {
    const form = document.getElementById('delete-recipe-form');
    if (confirm('Êtes-vous sûr de vouloir supprimer cette recette ?')) {
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  window.location.href = '/recipes';
              }
          });
    }
}