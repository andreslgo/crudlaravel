<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud de Clientes</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="navbar bg-primary">
          <span class="navbar-brand" href="#">Clientes</span>
        </nav>
        <div id="app">
            <form-customer @update="updateCustomers" :action="action" :idCustomer="idCustomer" @modal="modalCustomer"></form-customer>
            <table-customers :data="data" @modal="modalCustomer"></table-customers>
        </div>
        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
