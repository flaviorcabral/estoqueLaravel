      @extends('layout.principal')

      @section('conteudo')

      @if(empty($produtos))
        <div>Você não tem nenhum produto cadastrado.</div>

      @else
            <h1>Listagem de produtos</h1>
            <table class="table table-striped table-bordered table-hover">
              @foreach ($produtos as $p)
                <tr class=" {{ $p->quantidade <= 1 ? 'danger' : '' }} ">
                  <!--<td><?= $p->nome ?> </td>
                  <td><?= $p->valor ?> </td>
                  <td><?= $p->descricao ?> </td>
                  <td><?= $p->quantidade ?> </td>
                  <td>-->
                    <!--<a href="/produtos/mostra?id=<?= $p->id ?>">
                    <a href="/produtos/mostra/<?= $p->id ?>">
                      <span class="glyphicon glyphicon-search"></span>
                    </a>
                  </td>-->
                  <td>{{ $p->nome }}</td>
                  <td>R$ {{ $p->valor }}</td>
                  <td>{{ $p->descricao }}</td>
                  <td>{{ $p->quantidade }}</td>
                  <td>
                    <!--<a href="/produtos/mostra?id=<?= $p->id ?>">-->
                    <a href="/produtos/mostra/{{ $p->id }}">
                      <span class="glyphicon glyphicon-search"></span>
                    </a>
                  </td>
                  <td>
                    <a href="/produtos/editaForm/{{ $p->id }}">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                  </td>
                  <td>
                    <a href="/produtos/remove/{{ $p->id }}">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </table>
          @endif

            <h4>
              <span class="label label-danger pull-right">
                  Um ou menos itens no estoque
              </span>
            </h4>

          @if(old('nome'))
            <div class="alert alert-success">
              <strong>Sucesso!</strong> O produto {{ old('nome') }} foi Salvo com Sucesso!
            </div>
          @endif

          @stop
