@extends("layout.layout")

@section("title", 'Bem-vindo(a)')
@section("content")

<h1>Olá, </h1>
<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
          alt="Hollywood Sign on The Hill" />
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            This is a longer card with supporting text below as a natural lead-in to
            additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
    </div>
</div>

@endsection