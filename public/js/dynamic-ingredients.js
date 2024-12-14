document.addEventListener('DOMContentLoaded', function () {
    const ingredientsList = document.getElementById('ingredients-list');
    const addIngredientButton = document.getElementById('add-ingredient');
    let ingredientCount = 1;

    // Précharger les options dans une variable
    const ingredientOptions = Array.from(ingredientsList.querySelectorAll('select option'))
        .map(option => `<option value="${option.value}">${option.text}</option>`)
        .join('');

    addIngredientButton.addEventListener('click', function () {
        const newIngredient = document.createElement('div');
        newIngredient.classList.add('ingredient-row', 'mb-3'); // Adjusted margin for spacing
        newIngredient.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-2">
                <select name="ingredients[${ingredientCount}][id]" class="form-control w-75">
                    ${ingredientOptions}
                </select>
                <input type="number" name="ingredients[${ingredientCount}][quantity]" class="form-control w-25 ml-2" placeholder="Quantité">
            </div>
            <button type="button" class="btn btn-danger remove-ingredient">Supprimer</button>
        `;
        ingredientsList.appendChild(newIngredient);
        ingredientCount++;

        // Add event listener to the remove button
        newIngredient.querySelector('.remove-ingredient').addEventListener('click', function () {
            ingredientsList.removeChild(newIngredient);
        });
    });

    // Supprimer un ingrédient
    ingredientsList.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-ingredient')) {
            event.target.parentElement.remove();
        }
    });
});
