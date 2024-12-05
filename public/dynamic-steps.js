document.addEventListener('DOMContentLoaded', function () {
    const stepsContainer = document.getElementById('preparation-steps');
    const addStepButton = document.getElementById('add-step');
    let stepCount = stepsContainer.childElementCount;

    addStepButton.addEventListener('click', function () {
        const newStep = document.createElement('div');
        newStep.classList.add('step', 'mb-2');
        newStep.setAttribute('data-index', stepCount);

        newStep.innerHTML = `
            <input type="text" name="preparation[${stepCount}][action]" class="form-control mb-2">
            <button type="button" class="btn btn-danger btn-remove-step" data-index="${stepCount}">Supprimer</button>
        `;

        stepsContainer.appendChild(newStep);
        stepCount++;

        newStep.querySelector('.btn-remove-step').addEventListener('click', function () {
            stepsContainer.removeChild(newStep);
            stepCount--;
            updateStepIndices();
        });
    });

    stepsContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-remove-step')) {
            const stepToRemove = e.target.closest('.step');
            stepsContainer.removeChild(stepToRemove);
            stepCount--;
            updateStepIndices();
        }
    });


    function updateStepIndices() {
        const steps = document.querySelectorAll('.step');
        steps.forEach((step, index) => {
            const inputField = step.querySelector('input');
            const removeButton = step.querySelector('.btn-remove-step');

            inputField.name = `preparation[${index}][action]`;
            removeButton.setAttribute('data-index', index);
        });
    }
});
