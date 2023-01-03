@extends("layout.layout")

@section("title", $piscina -> nome . " - Detalhes")

@section('content')

<style>
    th{
        font-size: 15px;
    }
    td{
        font-size: 14px
    }
</style>
<div class="container">
    <div class="row p-5">
        <h2>{{ $piscina -> nome }} - Detalhes</h2>
    </div>
    <div class="row py-5 px-1">
        <table class="table border table-responsive y-5">
            <thead>
                <tr>
                    <th>
                        Altura 1
                    </th>
                    <th>
                        Altura 2
                    </th>
                    <th>
                        @if($piscina -> formato != 'circular')
                        Largura 
                        @else
                        Diâmetro
                        @endif
                    </th>
                    <th>
                        Comprimento
                    </th>
                    <th>
                        Volume
                    </th>
                    <th>
                        Margem
                    </th>
                    <th>
                        Formato
                    </th>
                    <th>
                        Quantidade de cloro/mês
                    </th>
                    <th>
                        Quantidade de clarificante/mês
                    </th>
                    <th>
                        Controle de Ph/mês
                    </th>
                    <th>
                        Quantidade de sulfato/mês
                    </th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr>
                    <td scope='col'>{{ $piscina -> alturaMax_em_cm }} cm</td>
                    <td scope='col'>{{ $piscina -> alturamin_em_cm}} cm</td>
                    <td scope='col'>{{ $piscina -> largura_em_cm }} cm</td>
                    <td scope='col'>{{ $piscina -> comprimento }} cm</td>
                    <td scope='col'>{{ round($calculos["v"], 3) }} m³</td>
                    <td scope='col'>{{ $piscina -> margem_em_cm }} cm</td>
                    <td scope='col'>{{ $piscina -> formato }}</td>
                    <td scope='col'>{{ round($calculos["cloro"], 3) }} Kg/mês</td>
                    <td scope='col'>{{ round($calculos['clarificante'], 3)}} L/mês</td>
                    <td scope='col'>{{ round($calculos['ph'], 3) }} Kg/mês</td>
                    <td scope='col'>{{ round($calculos['sulfato'], 3) }} Kg/mês</td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-4">
            
        </div>
    </div>
</div>

@endsection