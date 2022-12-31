@extends("layout.layout")

@section("title", 'Bem-vindo(a)')
@section("content")
<h5 class="bg-secondary p-5 text-white text-center">Faça o cálculo necessário para cada uma das suas piscinas</h5>
<div class="row row-cols-1 row-cols-md-3 g-4 my-5 mx-2">
    <div class="col">
      <div class="card h-100">
        <img src="/img/circular.jpg" class="card-img-top"
          alt="Hollywood Sign on The Hill" />
        <div class="card-body">
          <h5 class="card-title">Piscinas Circulares</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="/img/quadrangular.jpg" class="card-img-top"
          alt="Los Angeles Skyscrapers" />
        <div class="card-body">
          <h5 class="card-title">Piscinas Quadrangulares</h5>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="/img/trapezoidal.jpg" class="card-img-top"
          alt="" />
        <div class="card-body">
          <h5 class="card-title">Piscinas Trapezoidais</h5>
        </div>
      </div>
    </div>
  </div>
@endsection