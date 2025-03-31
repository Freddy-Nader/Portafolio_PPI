const units = {
    temperatura: ["Celsius", "Fahrenheit", "Kelvin"],
    distancia: ["Metros", "Kilómetros", "Millas", "Pies", "Pulgadas"],
    tiempo: ["Años", "Días", "Horas", "Minutos", "Segundos"],
    moneda: ["MXN", "USD", "Euro"]
};

function updateUnits() {
    const category = document.getElementById("category").value;
    const fromUnit = document.getElementById("fromUnit");
    const toUnit = document.getElementById("toUnit");

    fromUnit.innerHTML = "";
    toUnit.innerHTML = "";

    units[category].forEach(unit => {
        fromUnit.innerHTML += `<option value="${unit}">${unit}</option>`;
        toUnit.innerHTML += `<option value="${unit}">${unit}</option>`;
    });
}

function convert() {
    const category = document.getElementById("category").value;
    const from = document.getElementById("fromUnit").value;
    const to = document.getElementById("toUnit").value;
    const value = parseFloat(document.getElementById("value").value);
    let result = 0;

    if (isNaN(value)) {
        document.getElementById("result").innerText = "Ingrese un valor válido.";
        return;
    }

    if (from === to) {
        result = value;
    } else {
        switch (category) {
            case "temperatura":
                result = convertTemperature(value, from, to);
                break;
            case "distancia":
                result = convertDistance(value, from, to);
                break;
            case "tiempo":
                result = convertTime(value, from, to);
                break;
            case "moneda":
                result = convertCurrency(value, from, to);
                break;
        }
    }

    document.getElementById("result").innerText = `${value} ${from} = ${result.toFixed(2)} ${to}`;
}

// Temperatura
function convertTemperature(value, from, to) {
    if (from === "Celsius") return to === "Fahrenheit" ? value * 9/5 + 32 : value + 273.15;
    if (from === "Fahrenheit") return to === "Celsius" ? (value - 32) * 5/9 : (value - 32) * 5/9 + 273.15;
    if (from === "Kelvin") return to === "Celsius" ? value - 273.15 : (value - 273.15) * 9/5 + 32;
    return value;
}

// Distancia
function convertDistance(value, from, to) {
    const factors = {
        Metros: 1, Kilómetros: 0.001, Millas: 0.000621371, Pies: 3.28084, Pulgadas: 39.3701
    };
    return value * (factors[to] / factors[from]);
}

// Tiempo
function convertTime(value, from, to) {
    const factors = {
        Años: 1, Días: 365, Horas: 8760, Minutos: 525600, Segundos: 31536000
    };
    return value * (factors[to] / factors[from]);
}

// Monedas
function convertCurrency(value, from, to) {
    const rates = {
        MXN: { MXN: 1, USD: 0.056, Euro: 0.051 },
        USD: { MXN: 18, USD: 1, Euro: 0.91 },
        Euro: { MXN: 19.5, USD: 1.1, Euro: 1 }
    };
    return value * rates[from][to];
}

document.getElementById("category").addEventListener("change", updateUnits);

updateUnits();
