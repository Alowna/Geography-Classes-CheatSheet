


// centímetros para metros
function cmToM(cm) {
    return cm / 100;
}

// centímetros para quilômetros
function cmToKm(cm) {
    return cm / 100000;
}

// metros para centímetros
function mToCm(m) {
    return m * 100;
}

// metros para quilômetros
function mToKm(m) {
    return m / 1000;
}

// quilômetros para centímetros
function kmToCm(km) {
    return km * 100000;
}

// quilômetros para metros
function kmToM(km) {
    return km * 1000;
}

// --- Conversor de Medidas ---
const centimetersInput = document.getElementById('centimeters');
const metersInput = document.getElementById('meters');
const kilometersInput = document.getElementById('kilometers');

function updateMeasurements(sourceInput) {
    let value = parseFloat(sourceInput.value);

    if (isNaN(value)) {
        centimetersInput.value = '';
        metersInput.value = '';
        kilometersInput.value = '';
        return;
    }

    if (sourceInput === centimetersInput) {
        metersInput.value = cmToM(value).toFixed(2);
        kilometersInput.value = cmToKm(value).toFixed(5);
    } else if (sourceInput === metersInput) {
        centimetersInput.value = mToCm(value).toFixed(2);
        kilometersInput.value = mToKm(value).toFixed(5);
    } else if (sourceInput === kilometersInput) {
        centimetersInput.value = kmToCm(value).toFixed(2);
        metersInput.value = kmToM(value).toFixed(2);
    }
}

centimetersInput.addEventListener('input', () => updateMeasurements(centimetersInput));
metersInput.addEventListener('input', () => updateMeasurements(metersInput));
kilometersInput.addEventListener('input', () => updateMeasurements(kilometersInput));

// --- Calculadora de Escala ---
const measuredValueCmInput = document.getElementById('measuredValueCm');
const realValueCmInput = document.getElementById('realValueCm');
const scaleResultSpan = document.getElementById('scaleResult');

function calculateScale() {
    const measured = parseFloat(measuredValueCmInput.value);
    const real = parseFloat(realValueCmInput.value);

    if (isNaN(measured) || isNaN(real) || measured <= 0 || real <= 0) {
        scaleResultSpan.textContent = '1 : ? (Insira valores válidos)';
        return;
    }

    // A escala é Valor Medido : Valor Real
    // Para expressar na forma 1 : X, dividimos o Valor Real pelo Valor Medido
    const scaleFactor = real / measured;

    // Arredondar para um número inteiro se for o caso, ou manter casas decimais se necessário
    if (scaleFactor % 1 === 0) { // Se for um número inteiro
        scaleResultSpan.textContent = `1 : ${scaleFactor}`;
    } else {
        scaleResultSpan.textContent = `1 : ${scaleFactor.toFixed(2)}`; // Duas casas decimais
    }
}


measuredValueCmInput.addEventListener('input', calculateScale);
realValueCmInput.addEventListener('input', calculateScale);

// --- Calculadora de coordenada
const calcCoordButton = document.getElementById('calcCoordButton');
const coordResultMinuteLongitude = document.getElementById('coordResultMinuteLongitude');
const coordResultSecondLongitude = document.getElementById('coordResultSecondLongitude');
const coordResultMinuteLatitude = document.getElementById('coordResultMinuteLatitude');
const coordResultSecondLatitude = document.getElementById('coordResultSecondLatitude');


function calculateCoordinate() {
    const data = {
        longitudeVariationMinute: parseFloat(document.getElementById('longitudeVariationMinute').value),
        longitudeVariationSecond: parseFloat(document.getElementById('longitudeVariationSecond').value),
        latitudeVariationMinute: parseFloat(document.getElementById('latitudeVariationMinute').value),
        latitudeVariationSecond: parseFloat(document.getElementById('latitudeVariationSecond').value),

        mapLongitudeMinute: parseFloat(document.getElementById('mapLongitudeMinute').value),
        mapLongitudeSecond: parseFloat(document.getElementById('mapLongitudeSecond').value),
        mapLatitudeMinute: parseFloat(document.getElementById('mapLatitudeMinute').value),
        mapLatitudeSecond: parseFloat(document.getElementById('mapLatitudeSecond').value),

        longitudeVariationCentimeters: parseFloat(document.getElementById('longitudeVariationCentimeters').value),
        latitudeVariationCentimeters: parseFloat(document.getElementById('latitudeVariationCentimeters').value),
    
        localCentimetersLongitude: parseFloat(document.getElementById('localCentimetersLongitude').value),
        localCentimetersLatitude: parseFloat(document.getElementById('localCentimetersLatitude').value),

    }

    fetch("/coord", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)})
        .then(response => response.json())
        .then(data => {
            coordResultMinuteLongitude.textContent = data.localMinuteLongitude;
            coordResultSecondLongitude.textContent = data.localSecondLongitude;
            coordResultMinuteLatitude.textContent = data.localMinuteLatitude;
            coordResultSecondLatitude.textContent = data.localSecondLatitude;
        })

}

calcCoordButton.addEventListener('click', calculateCoordinate);

