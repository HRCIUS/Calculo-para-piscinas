@extends("layout.layout")

@section("title", "Editar - ". $piscina -> nome )

@section('content')
<form method="post" action="/piscina/update/{{ $piscina -> id }}" class="px-5 py-4">
    @csrf
    @method('PUT')
    <h1 class="text-center">Editando: {{ $piscina -> nome }}</h1>
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $piscina -> nome }}" required/>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
            <label class="form-label" for="local">Local</label>
            <input type="text" id="local" name="local" class="form-control" required value="{{ $piscina -> local }}" />
        </div>
      </div>
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="formato">Formato</label>

    <select type="text" id="formato" class="form-control" required name="formato">
        <option {{ $piscina -> formato  == 'circular' ? "selected" : ""}} value="circular">Circular</option>
        <option {{ $piscina -> formato  == 'quadrangular' ? "selected" : ""}} value="quadrangular">Quadrangular</option>
    </select>
    </div>
    <div class="form-outline mb-4">
        <label for="alturaMax_em_cm" class="form-label">Altura 1 (Em centímetros)</label>
        <input type="number" step="any" min="0" max="999999999999" name="alturaMax_em_cm" class="form-control" id="alturaMax_em_cm" value="{{ $piscina -> alturaMax_em_cm }}" required>
    </div>
    <div class="form-outline mb-4">
        <label for="alturamin_em_cm" class="form-label">Altura 2 (Em centímetros) - <b>Desconsidere se a piscina não possui diferença de altura</b></label>
        <input type="number" step="any" min="0" max="999999999999" name="alturamin_em_cm" class="form-control" id="alturamin_em_cm" value="{{ $piscina -> alturamin_em_cm }}">
    </div>
    <div class="form-outline mb-4">
        <label for="comprimento" class="form-label">Comprimento (Em centímetros) - <b>Desconsidere se a piscina é circular</b></label>
        <input type="number" step="any" min="0" max="999999999999" name="comprimento" class="form-control" id="comprimento" value="{{ $piscina -> comprimento }}">
    </div>
    <div class="form-outline mb-4">
        <label for="largura_em_cm" class="form-label">Largura (Em centímetros) - <b>Caso a piscina seja circular digite o tamanho do diâmetro (Também em centímetros)</b></label>
        <input type="number" step="any" min="0" max="999999999999" name="largura_em_cm" class="form-control" id="largura_em_cm" value="{{ $piscina -> largura_em_cm }}" required>
    </div>
    <div class="form-outline mb-4">
        <label for="margem_em_cm" class="form-label">Margem da borda da piscina até o nível da água (Em centímetros)</label>
        <input type="number" step="any" min="0" max="999999999999" name="margem_em_cm" class="form-control" id="margem_em_cm" value="{{ $piscina -> margem_em_cm }}" required>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-info col-4 mb-4">Editar</button>
  </form>
@endsection