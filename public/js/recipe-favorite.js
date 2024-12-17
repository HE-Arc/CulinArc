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

              // Find or create alert div
              let alertDiv = document.querySelector('.alert[role="alert"]');
              if (!alertDiv) {
                  alertDiv = document.createElement('div');
                  alertDiv.className = 'alert alert-success';
                  alertDiv.role = 'alert';
                  document.querySelector('.container').insertAdjacentElement('afterbegin', alertDiv);
              }
              alertDiv.innerText = data.message;
          }
      });
}