if(navigator.geolocation) {
  
  navigator.geolocation.getCurrentPosition(succes, error);
} else {
    alert("puedes obtener GEO");   
}

function succes(geolocationposition) {
    
  let cordenadas = geolocationposition.coords;
  document.getElementById("latitude_").value = cordenadas.latitude;
  document.getElementById("longitude_").value = cordenadas.longitude;
    
}
function error(err) {
    console.log(err);
    alert("No Acepto ubicación");
}