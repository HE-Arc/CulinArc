document.addEventListener('DOMContentLoaded', function () {
    const stepsContainer = document.getElementById('preparation-steps');
    const addStepButton = document.getElementById('add-step');

    function updateStepIndices() {
        const steps = stepsContainer.querySelectorAll('.step');
        steps.forEach((step, index) => {
            const input = step.querySelector('input');
            input.name = `preparation[${index}][action]`;
            step.dataset.index = index;
            const removeButton = step.querySelector('.remove-step');
            removeButton.dataset.index = index;
        });
    }

    stepsContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-step')) {
            const stepToRemove = e.target.closest('.step');
            stepsContainer.removeChild(stepToRemove);
            updateStepIndices();
        }
    });

    addStepButton.addEventListener('click', function () {
        const newStep = document.createElement('div');
        newStep.classList.add('step', 'mb-2');
        newStep.innerHTML = `
            <input type="text" name="preparation[][action]" class="form-control mb-2">
            <button type="button" class="btn btn-danger remove-step">Supprimer</button>
        `;

        stepsContainer.appendChild(newStep);
        updateStepIndices();
    });
});
