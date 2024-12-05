document.addEventListener('DOMContentLoaded', function () {
    const stepsContainer = document.getElementById('preparation-steps');
    const addStepButton = document.getElementById('add-step');
    let stepCount = 1;

    addStepButton.addEventListener('click', function () {
        const newStep = document.createElement('div');
        newStep.classList.add('step', 'mb-2');
        newStep.innerHTML = `
            <input type="text" name="preparation[${stepCount}][action]" class="form-control">
            <button type="button" class="btn btn-danger btn-sm mt-1 remove-step">Supprimer</button>
        `;
        stepsContainer.appendChild(newStep);
        stepCount++;

        // Add event listener to remove button
        newStep.querySelector('.remove-step').addEventListener('click', function () {
            stepsContainer.removeChild(newStep);
            stepCount--;
        });
    });
});


