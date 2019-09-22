const botones = document.querySelectorAll(".btneliminar");

botones.forEach(boton => {
    boton.addEventListener("click", function(){
        
        const matricula = this.dataset.matricula;
        const confirm = window.confirm("Deeseas eliminar al alumno "+ matricula + "?");
        if(confirm){
            httpRequest("http://localhost/facilito/consulta/eliminarAlumno/" + matricula, function(){
                const tbody = document.querySelector("#tbody-alumnos");
                const fila = document.querySelector("#fila-"+matricula);

                tbody.removeChild(fila);
                document.querySelector("#respuesta").innerHTML(this.responseText);
            })
        }
    });
} );


function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET",url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http)
        }
    }
}