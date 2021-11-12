<style>
    h1.titulo{
        font-family: 'Oswald', sans-serif;
	font-weight:200	;
	text-transform:uppercase;
	text-decoration:none;
	color:#16151b;
	letter-spacing:1px;
    display:inline-block;
    font-size: 35pt;
    text-align: center;
    margin: 30px 0px 30px 0px;
    }

    p{
        font-family: 'Oswald', sans-serif;
	text-align: center;
    font-size: 12pt;
    }
    p.si{
        font-family: 'Oswald', sans-serif;
        text-align: center;
        font-size: 12pt;
    }
 

    h3{
        font-family: 'Oswald', sans-serif;
        font-weight:200	;
        text-transform:uppercase;
        text-decoration:none;
        color:#16151b;
        letter-spacing:1px;
        display:inline-block;
        font-size: 15pt;
        text-align: center;
        margin: 30px 0px 30px 0px;
    }
    
</style>

    <h1 class="titulo">Evaluacion de Desempeño.</h1> <br/>        
    <table>
        <tr>
        <p class="si">EVALUADO:</p>
        <p> {{$respuestas[0]->evaluado}}</p>
        </tr>
       <br/>
       <br/>
       <tr>
        <p class="si">DEPARTAMENTO/ÁREA: </p>
        <p > {{$respuestas[0]->grupo_pregunta}} </p>
       </tr>
       <br/>
       <tr>
        <p class="si">FECHA DE EVALUACIÓN: </p>
        <p> {{$respuestas[0]->fecha}} </p>
       </tr>
       <br/>
       <tr>
        <p class="si">EVALUADOR</p>
        <p> {{$respuestas[0]->evaluador}} </p>
       </tr>
       <br/>
       <br/>
       <tr>
        <td>&nbsp;</td>
       </tr>
    </table>
    <br/><br/><hr class="hr"><br/>
    {{$grupo=null;}}
    @foreach($respuestas as $pregunta)
        @if($grupo != $pregunta->grupo_pregunta)
            <h3 class="sex">{{$grupo=$pregunta->grupo_pregunta;}}</h3>
        @endif
            <div>
                <p class="bren">{!! $pregunta->pregunta !!}</p>
                <p class="bren">{!! $pregunta->puntajevaluacion_pregunta !!}</p>
            </div>
    @endforeach

    <br/><br/><hr class="hr"/><br/>