document.getElementById("formulario").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que la página se recargue

    if (checar()) {
        document.getElementById("errores").innerHTML = "";
        nueva_linea();
        this.reset(); // Limpia el formulario
    }
});

function checar() {
    let nombre = document.getElementById("nombre").value.trim();
    let email = document.getElementById("email").value.trim();
    let fecha = document.getElementById("fecha").value;
    let color = document.getElementById("color").value;
    let calificacion = document.getElementById("calificacion").value;
    
    let sabores = [...document.getElementsByName("sabores")].filter(cb => cb.checked).map(cb => cb.value);
    let mkt = [...document.getElementsByName("mkt")].find(radio => radio.checked)?.value || "";

    let vacios = [];

    if (!nombre) vacios.push("Nombre");
    if (!email) vacios.push("Email");
    if (sabores.length === 0) vacios.push("Sabores");
    if (!mkt) vacios.push("Contacto");
    if (!fecha) vacios.push("Fecha");
    if (!color) vacios.push("Color");
    if (!calificacion) vacios.push("Calificación");

    let error = document.getElementById("errores");

    if (vacios.length > 0) {
        error.innerHTML = `Los siguientes campos están vacíos: ${vacios.join(", ")}.`;
        return false;
    } else {
        error.innerHTML = `Todos los campos están llenos.`;
        return true;
    }
}

function nueva_linea() {
    let tabla = document.getElementById("tabla").getElementsByTagName("tbody")[0];

    let nombre = document.getElementById("nombre").value.trim();
    let email = document.getElementById("email").value.trim();
    let fecha = document.getElementById("fecha").value;
    let color = document.getElementById("color").value;
    let calificacion = document.getElementById("calificacion").value;

    let sabores = [...document.getElementsByName("sabores")].filter(cb => cb.checked).map(cb => cb.value).join(", ");
    let mkt = [...document.getElementsByName("mkt")].find(radio => radio.checked)?.value || "";

    let nuevaFila = tabla.insertRow();
    nuevaFila.innerHTML = `
        <td>${nombre}</td>
        <td>${email}</td>
        <td>${sabores}</td>
        <td>${mkt}</td>
        <td>${fecha}</td>
        <td><input type="color" value="${color}" disabled></td>
        <td>${calificacion}</td>
    `;
}