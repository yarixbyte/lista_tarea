// Cargar las tareas del almacenamiento local
function cargarTareas() {
  const tareas = JSON.parse(localStorage.getItem('tareas')) || [];
  const lista = document.getElementById('lista-tareas');
  lista.innerHTML = '';
  tareas.forEach((tarea, index) => {
    const li = document.createElement('li');
    li.className = tarea.completada ? 'completed' : '';
    li.innerHTML = `
      <span onclick="toggleCompletada(${index})">${tarea.nombre}</span>
      <button class="delete" onclick="eliminarTarea(${index})">Eliminar</button>
    `;
    lista.appendChild(li);
  });
}

// Agregar una tarea a la lista
function agregarTarea() {
  const tareaInput = document.getElementById('nueva-tarea');
  const tareaNombre = tareaInput.value.trim();

  if (tareaNombre) {
    const tareas = JSON.parse(localStorage.getItem('tareas')) || [];
    tareas.push({ nombre: tareaNombre, completada: false });
    localStorage.setItem('tareas', JSON.stringify(tareas));
    tareaInput.value = '';
    cargarTareas();
    window.location.href = "lista.html"; // Redirige a la lista de tareas
  } else {
    alert('Por favor, escribe una tarea.');
  }
}

// Eliminar una tarea de la lista
function eliminarTarea(index) {
  const tareas = JSON.parse(localStorage.getItem('tareas')) || [];
  tareas.splice(index, 1);
  localStorage.setItem('tareas', JSON.stringify(tareas));
  cargarTareas();
}

// Marcar o desmarcar una tarea como completada
function toggleCompletada(index) {
  const tareas = JSON.parse(localStorage.getItem('tareas')) || [];
  tareas[index].completada = !tareas[index].completada;
  localStorage.setItem('tareas', JSON.stringify(tareas));
  cargarTareas();
}

// Cargar las tareas al iniciar la página
window.onload = cargarTareas;