function updateQuantities() {
    let numPersons = parseInt(document.getElementById('numPersons').value) || 1;

    // Nombree de personnes entre 1 et 6 
    if (numPersons < 1) {
        numPersons = 1;
    } else if (numPersons > 6) {
        numPersons = 6;
    }

    document.getElementById('numPersons').value = numPersons;
    const ingredients = document.querySelectorAll('#ingredients-list li');

    ingredients.forEach(item => {
        const baseQuantity = parseFloat(item.getAttribute('data-quantity'));
        const newQuantity = (baseQuantity * numPersons / 2);
        // Si la quantié est un entier, affiche un entier, sinon on affiche un nombre à virgule
        item.querySelector('.ingredient-quantity').textContent = newQuantity % 1 === 0 ? newQuantity.toFixed(0) : newQuantity.toFixed(2);
    });
}