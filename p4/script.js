function respuestaForm() {
    const num = parseFloat(document.getElementById("calif").value);
    const resultado = document.getElementById("calificaciones");
    
    let equivalencia
    if (num >= 0 && num < 6) {
        equivalencia  = "NA";
    } else if (num >= 6 && num < 7.5) {
        equivalencia  = "S";
    } else if (num >= 7.5 && num < 9) {
        equivalencia  = "B";
    } else if (num >= 9 && num < 10) {
        equivalencia  = "MB";
    } else if (num == 10) {
        equivalencia  = "LAP";
    }

    resultado.textContent = `La equivalencia de la calificación ${num} es ${equivalencia}`;
    return false;
}

function factorial() {
    const num = parseInt(document.getElementById("n").value);
    const resultado = document.getElementById("factorial");
    
    let fact = 1;
    if (num < 0) {
        resultado.textContent = "El factorial para números negativos no está definido.";
        return false;
    } else if (num != 0) {
        for (let i = num; i > 0; i--) {
            fact *= i;
        }
    }

    resultado.textContent = `El factorial de ${num} es ${fact}.`;
    return false;
}

function datosPersonales() {
    const formulario = document.forms["formulario_datos"];
    let texto = "";

    for (let i = 0; i < formulario.elements.length - 1; i++) {
        const elemento = formulario.elements[i];
        
        if (elemento.value !== "") {
            if (elemento.type === "radio") {
                // Si no se hace esto, va a escribirse "on" para cada botón de los géneros
                if (elemento.checked) {
                    texto += elemento.id + "<br>";
                }
            } else {
                texto += elemento.value + "<br>";
            }
        }
    }

    document.getElementById("resultados_form_titulo").textContent = "Resultados del form:";
    document.getElementById("resultados_form").innerHTML = texto;
    return false;
}
