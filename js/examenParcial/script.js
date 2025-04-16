function Insercion(numeros) {
    const n = numeros.length;
    let key, j;
    let viejo = "", nuevo = "";

    document.getElementById("viejo").innerHTML = "Arreglo original: ";
    document.getElementById("nuevo").innerHTML = "Arreglo ordenado: ";

    for (let i = 0; i < n; i++) {
        if (i == n - 1) {
            viejo += numeros[i];
        } else {
            viejo += numeros[i] + ", ";
        }
    }

    for (let i = 2; i < n; i++) {
        key = numeros[i];
        j = i - 1;
        while (j > 0 && numeros[j] > key) {
            numeros[j + 1] = numeros[j];
            j--;
        }
        numeros[j + 1] = key;
    }

    for (let i = 0; i < n; i++) {
        if (i == n - 1) {
            nuevo += numeros[i];
        } else {
            nuevo += numeros[i] + ", ";
        }
    }

    document.getElementById("viejo").innerHTML += viejo;
    document.getElementById("nuevo").innerHTML += nuevo;
}

function arregloRandom() {
    let arreglo = [];

    for (let i = 0; i < 10; i++) {
        arreglo[i] = Math.floor(Math.random() * 100);
    }

    return arreglo
}

function aleatorio(numeros, input) {
    let menor = 0, mayor = 0, igual = 0;

    for (let i = 0; i < 10; i++) {
        if (input > numeros[i]) {
            menor++;
        } else if (input < numeros[i]) {
            mayor++;
        } else {
            igual++;
        }
    }

    if (menor != 0) {
        document.getElementById("menores").innerHTML = "Cantidad de números menores: " + menor;
    }

    if (mayor != 0) {
        document.getElementById("mayores").innerHTML = "Cantidad de números mayores: " + mayor;
    }

    if (igual != 0) {
        document.getElementById("iguales").innerHTML = "Cantidad de números iguales: " + igual;
    }

    return document.getElementById("input").value;
}
