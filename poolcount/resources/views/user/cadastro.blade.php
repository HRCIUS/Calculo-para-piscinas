@extends("layout.layout")

@section("title", "Cadastrar Piscina")

@section('content')
<form method="post" action="/cadastrado" class="px-5 py-4">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required/>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
            <label class="form-label" for="local">Local</label>
            <input type="text" id="local" name="local" class="form-control" required />
        </div>
      </div>
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="formato">Formato</label>

    <select type="text" id="formato" class="form-control" required name="formato">
        <option id="selecionar" aria-disabled="true" value="">selecione...</option>
        <option value="circular">Circular</option>
        <option value="quadrangular">Quadrangular</option>
    </select>
    </div>
    <div class="form-outline mb-4">
        <label for="alturaMaior" class="form-label">Altura 1 (Em centímetros)</label>
        <input type="number" step="any" name="alturaMaior" class="form-control" id="alturaMaior" placeholder="Ex.: 200" required>
    </div>
    <div class="form-outline mb-4">
        <label for="alturaMenor" class="form-label">Altura 2 (Em centímetros) - <b>Desconsidere se a piscina não possui diferença de altura</b></label>
        <input type="number" step="any" name="alturaMenor" class="form-control" id="alturaMenor" placeholder="Ex.: 180">
    </div>
    <div class="form-outline mb-4">
        <label for="comprimento" class="form-label">Comprimento (Em centímetros) - <b>Desconsidere se a piscina é circular</b></label>
        <input type="number" step="any" name="comprimento" class="form-control" id="comprimento" placeholder="Ex.: 1500">
    </div>
    <div class="form-outline mb-4">
        <label for="largura" class="form-label">Largura (Em centímetros) - <b>Caso a piscina seja circular digite o tamanho do diâmetro (Também em centímetros)</b></label>
        <input type="number" step="any" name="largura" class="form-control" id="largura" placeholder="Ex.: 500" required>
    </div>
    <div class="form-outline mb-4">
        <label for="nivel" class="form-label">Margem da borda da piscina até o nível da água (Em centímetros)</label>
        <input type="number" step="any" name="nivel" class="form-control" id="nivel" placeholder="Ex.: 30" required>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-success col-4 mb-4">Cadastrar</button>
  </form>
@endsection