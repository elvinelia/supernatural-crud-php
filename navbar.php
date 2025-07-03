<!-- 🧭 Menú Principal Estilizado -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-lg" style="background-color: rgba(0, 0, 0, 0.85); border-bottom: 2px solid #b30000; font-family: 'Cinzel Decorative', serif;">
  <div class="container-fluid">
    <a class="navbar-brand text-danger fw-bold fs-3 glow" href="index.php">
      🩸 Supernatural
    </a>

    <button class="navbar-toggler border-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0">

        <!-- Menú CRUD -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light fs-5" href="#" id="crudDropdown" role="button" data-bs-toggle="dropdown">
            ☠️ Opciones
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end animate__animated animate__fadeInDown" aria-labelledby="crudDropdown">
            <li><a class="dropdown-item" href="agregar.php">➕ Crear - Agregar Personaje</a></li>
            <li><a class="dropdown-item" href="index.php">📋 Leer - Lista de Personajes</a></li>
            <li><a class="dropdown-item" href="index.php#editar">✏️ Actualizar - Editar Personaje</a></li>
            <li><a class="dropdown-item" href="index.php#eliminar">🗑️ Eliminar - Borrar Personaje</a></li>
            <li><a class="dropdown-item" href="index.php#pdf">📄 Descargar Perfil en PDF</a></li>
          </ul>
        </li>

        <!-- Acerca -->
        <li class="nav-item">
          <a class="nav-link text-light fs-5" href="acerca.php">👤 Acerca del Estudiante</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
