<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <form id="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="id_perfil">Perfil</label>
                <select  class="form-select" id="id_perfil" name="id_perfil">

                    @foreach ($perfiles as $id => $perfil)
                        <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Usuario</label>
                <input id="usuario_login" type="text" class="form-control" name="usuario_login" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>

    </div>
    


   
    <script>
        $('#login-form').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('login') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if(response.user) {
                        window.location.href = '/usuarioLogeado';
                    }
                },
                error: function(response) {
                    var errors = response.responseJSON;
                    alert(errors.message)

                    $.each(errors, function(index, value) {
                        message += value[0] + '<br>';
                    });

                    $('#error-messages').html(message);
                }
            });
        });
    </script>
</body>



</html>
