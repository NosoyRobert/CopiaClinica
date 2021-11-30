@extends('layout.main')

@section('content')

    <body>

        <br><br>

        <?php echo '<a href="/admin/impo_evaluadores"  class="but">Asignar Evaluados</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/camb_eva"  class="but">Cambiar Evaluadores</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/mostrar"  class="but">Empleados Registrados</a>'; ?>

        <br><br>

        <?php echo '<a href="/empleado/buscar"  class="but">Buscar</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/buscar_grupo"  class="but">Buscar por grupos</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/intentos"  class="but">Borrar intentos</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/exp_resultados"  class="but">Exportar Resultados</a>'; ?>

        <br/><br/>

    </body>

@endsection