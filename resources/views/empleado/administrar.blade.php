@extends('layout.main')

@section('content')

    <body>

        <br><br>
        
        <?php echo '<a href="/empleado/registrar"  class="but">Registrar</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/impo_evaluadores"  class="but">Asignar Evaluados</a>'; ?>

        <br><br>

        <?php // echo '<a href="profile.php?action=cambiar"  class="but">Cambiar Evaluadores</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/mostrar"  class="but">Empleados Registrados</a>'; ?>

        <br><br>

        <?php echo '<a href="/empleado/buscar"  class="but">Buscar</a>'; ?>

        <br><br>
        
        <?php echo '<a href="/admin/eliminar"  class="but">Eliminar</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/intentos"  class="but">Borrar intentos</a>'; ?>

        <br><br>

        <?php // echo '<a href="profile.php?action=resultados"  class="but">Exportar Resultados</a>'; ?>

        <br><br>

        <?php echo '<a href="/admin/importar"  class="but">Importar base de datos</a>'; ?>

        <br><br>

        <?php // echo '<a href="profile.php?action=Copia_seguridad"  class="but">Backup</a>'; ?>

        <br><br>

        <?php // echo '<a href="profile.php?action=espe"  class="but">Importar Preguntas Especificas</a>'; ?>

        <br><br>

        <?php echo '<a href="profile.php?action=preguntas"  class="but">Editar Preguntas Especificas</a>'; ?>

        <br><br>

        <?php echo '<a href="/empleado/excel"  class="but">Matriz de Datos</a>'; ?>

        <br><br>

        <?php // echo '<a href="profile.php?action=excel"  class="but">Generar Matriz Excel</a>'; ?>


    </body>

@endsection