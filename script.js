let imagenes = [
    "https://via.placeholder.com/400x200?text=Imagen+1",
    "https://via.placeholder.com/400x200?text=Imagen+2"
];
let indice = 0;

function mostrar() {
    document.getElementById('foto').src = imagenes[indice];
}

function avanzar() {
    indice = (indice + 1) % imagenes.length;
    mostrar();
}

function retroceder() {
    indice = (indice - 1 + imagenes.length) % imagenes.length;
    mostrar();
}

mostrar(); // Carga la primera al iniciar

document.getElementById('btnAgregar').addEventListener('click', function() {
    const nuevaUrl = document.getElementById('urlNueva').value;
    
    if(nuevaUrl) {
        // Simulamos una petición AJAX
        console.log("Enviando datos vía AJAX...");
        
        setTimeout(() => {
            imagenes.push(nuevaUrl);
            indice = imagenes.length - 1;
            mostrar();
            document.getElementById('urlNueva').value = "";
            alert("¡Imagen agregada por AJAX!");
        }, 500);
    }
});