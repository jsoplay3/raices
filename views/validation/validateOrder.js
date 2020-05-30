
function validateADespachar(){

    aDespacharCheck = document.getElementById("despacho");
    aDespacharDate = document.getElementById("fecha_despacho").value;

        if( aDespacharCheck.checked && (aDespacharDate == null || aDespacharDate.length == 0) ) {
        alert("Solo se puede marcar la casilla de 'A despachar' si selecciona una fecha");
        return false;
        }

}