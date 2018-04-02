@extends('pdf.master')

@section('body')
    <div class="text-center">
        <h3>{{ $proyecto->nombre }} - Resultados</h3>
        <hr>
    </div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Modelacion</th>
                <td>{{ $modelacion }}</td>
            </tr>
            <tr>
                <th>Plataforma</th>
                <td>{{ $plataforma }}</td>
            </tr>
            <tr>
                <th>Codificacion</th>
                <td>{{ $codificacion }}</td>
            </tr>
            <tr>
                <th>Base de Datos</th>
                <td>{{ $basedatos }}</td>
            </tr>
            <tr class="info">
                <th>Total</th>
                <th>{{ $total }}</th>
            </tr>
        </tbody>
    </table>
@endsection