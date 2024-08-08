<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parque Temático</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Parque Temático</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @if(auth()->check())
                            <li class="nav-item">
                                <!-- Botón para abrir el modal de perfil -->
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Ver
                                    Perfil</a>
                            </li>
                            <li class="nav-item">
                                <span class="navbar-text text-white">
                                    {{ auth()->user()->name }}
                                </span>
                            </li>
                            <li class="nav-item">
                                <!-- Formulario oculto para cerrar sesión -->
                                <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                                    @csrf
                                </form>
                                <!-- Enlace que al hacer clic envía el formulario de cerrar sesión -->
                                <a class="nav-link" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Registrarse</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Iniciar Sesión</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">¡Bienvenido al Parque Temático!</h1>
            <p class="lead">Explora las maravillas de nuestro parque y comparte tu experiencia.</p>
            <hr class="my-4">
            <p>Utiliza los enlaces a continuación para navegar por las atracciones y leer comentarios de otros
                visitantes.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('attractions.index') }}" role="button">Ver Atracciones</a>
            <a class="btn btn-secondary btn-lg" href="{{ route('species.index') }}" role="button">Ver Especies</a>
        </div>
    </div>

    <!-- Modal de Perfil -->
    @if(auth()->check())
        <!-- Modal de Perfil -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Perfil de Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Información Básica -->
                        <div class="mb-3">
                            <img src="{{ asset('path/to/profile/image.jpg') }}" alt="Foto de Perfil" class="img-thumbnail"
                                width="100">
                            <p><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Fecha de Registro:</strong> {{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>

                        <!-- Opciones de Perfil -->
                        <div class="mb-3">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
                            <a href="{{ route('password.request') }}" class="btn btn-secondary">Cambiar Contraseña</a>
                        </div>

                        <!-- Información Adicional -->
                        <div class="mb-3">
                            <p><strong>Última Actividad:</strong> {{ auth()->user()->last_login_at ?? 'No disponible' }}</p>
                            <p><strong>Rol:</strong> {{ auth()->user()->role ?? 'Usuario' }}</p>
                        </div>

                        <!-- Acciones Avanzadas -->
                        <div class="mb-3">
                            <a href="#" class="btn btn-danger"
                                onclick="confirm('¿Está seguro de que desea eliminar su cuenta?')">Eliminar Cuenta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Conéctate con nosotros en las redes sociales:</span>
            </div>
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </section>
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Parque Temático
                        </h6>
                        <p>
                            Aquí puedes usar rows y columns para organizar tu footer content.
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Productos
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Atracciones</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Especies</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Comentarios</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Derechos reservados: Parque Temático
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>