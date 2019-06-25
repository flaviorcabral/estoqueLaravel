@extends('layout.principal')

@section('conteudo')

  @if (isset($produto))
    <h1>Novo produto</h1>
  @else
    <h1>Editar produto</h1>
  @endif

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action={{ empty($produto) ? "/produtos/adiciona" : "/produtos/editar" }} method="post">
    <div class="form-group">
        <input name="_token" type="hidden" value="{{{ csrf_token() }}}" />
      @if (isset($produto))
        <input name="id" type="hidden" value="{{ $produto->id }}" />
      @endif
        <label>Nome</label>
        <input name="nome"class="form-control" value="{{ empty($produto) ? old('nome') : $produto->nome }}">
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <input name="descricao" class="form-control" value="{{ empty($produto) ? old('descricao') : $produto->descricao }}">
    </div>

    <div class="form-group">
      <label>Valor</label>
      <input name="valor" class="form-control" value="{{ empty($produto) ? old('valor') : $produto->valor }}">
    </div>

    <div class="form-group">
      <label>Quantidade</label>
      <input name="quantidade" type="number" class="form-control" value="{{ empty($produto) ? old('quantidade') : $produto->quantidade }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">{{ empty($produto) ? 'Adicionar' : 'Editar' }}</button>
</form>

@stop
