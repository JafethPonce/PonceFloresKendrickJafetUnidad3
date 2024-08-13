const time = document.getElementById("time");
const date = document.getElementById("date");

const monthNames = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre",
];

function updateTime() {
  const local = new Date();
  let hours = local.getHours();
  let minutes = local.getMinutes();
  let seconds = local.getSeconds();

  hours = hours < 10 ? `0${hours}` : hours;
  minutes = minutes < 10 ? `0${minutes}` : minutes;
  seconds = seconds < 10 ? `0${seconds}` : seconds;

  time.innerHTML = `${hours}:${minutes}:${seconds}`;
}

function updateDate() {
  const local = new Date();
  let day = local.getDate();
  let month = local.getMonth();
  let year = local.getFullYear();

  date.innerHTML = `${day} ${monthNames[month]} ${year}`;
}

function updateClock() {
  updateTime();
  updateDate();
  setTimeout(updateClock, 1000); // Actualizar cada segundo
}

updateClock();
