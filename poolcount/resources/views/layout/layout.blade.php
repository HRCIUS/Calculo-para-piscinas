<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand me-4" href="#"><img src="/img/logotipo.png" style="height: 50px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      <div class="d-flex flex-row-reverse bd-highlight">
        <ul class="navbar-nav p-2 bd-highlight">
          <li class="nav-item active">
            <a class="nav-link text-white" href="/dashboard">Home</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-white" href="/cadastro">Cadastrar Piscina</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/piscinas">Piscinas cadastradas</a>
          </li>
          <form action="/logout" method="POST">
            @csrf
          <li class="nav-item float-right mx-3">
            <a class="nav-link text-danger" href="/logout" onclick="event.preventDefault();
            this.closest('form').submit();">Sair</a>
          </li>
          </form>
        </ul>
      </div>
    </nav>
    @yield("content")

    <div class="container-fluid bg-dark d-flex justify-content-center py-5">
        <footer class="py-2">
          <div class="row navbar-expand" id="redes">
            <ul class="navbar-nav my-2 ">
              <li class="nav-item me-1"><a href="https://instagram.com/h_barretu" target="_blank"><img  class="img-fluid" src="https://img.shields.io/badge/-Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white" target="_blank"></a></li>
              <li class="nav-item mx-1"><a href="https://discord.com/channels/H_Barreto" target="_blank"><img  class="img-fluid" src="https://img.shields.io/badge/Discord-7289DA?style=for-the-badge&logo=discord&logoColor=white" target="_blank"></a> </li>
              <li class="nav-item mx-1"><a href = "mailto:horaciobarreto43@gmail.com"><img class="img-fluid" src="https://img.shields.io/badge/-Gmail-%23333?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a></li>
              <li class="nav-item mx-1"><a href="https://www.linkedin.com/in/hor%C3%A1cio-barreto-456a13235/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a></li>
              <li class="nav-item ms-1"><a href="https://github.com/HRCIUS" target="_blank"><img  class="img-fluid" src="https://img.shields.io/badge/-Github-%230077B5?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a> </li>
            </ul>
          </div>
          <div class="row d-flex justify-content-center">
            <p class="text-center text-white" >&copy; Copyright: Horácio Barreto, 2022</p>
          </div>
        </footer>
    </div>
</body>
</html>