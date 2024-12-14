
function toggleFavorite() {
    const form = document.getElementById('favorite-form');
    const icon = document.getElementById('favorite-icon');
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    }).then(response => response.json())
      .then(data => {
          if (data.success) {
              icon.classList.toggle('bi-star-fill');
              icon.classList.toggle('bi-star');
          }
      });
}