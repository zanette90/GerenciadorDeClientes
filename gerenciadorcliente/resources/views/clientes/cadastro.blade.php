<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body >
<div class="container ">
    <div class="mb-3 text-center">
        <h3>Cadastro de Clientes</h3>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-3 ">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h4>Dados Cliente</h4>
            </div>
            <form class="form-control" method="POST" action="{{ route('cliente.salvar') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-12 col-md-5 mb-3">
                        <label for="name">Nome</label>
                        <input class="form-control"
                               id="name"
                               name="name"
                               type="text"
                               placeholder="Digite o nome"
                               autocomplete="off"
                               required
                        >
                        @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-5 mb-3">
                        <label for="cpf">CPF ou CNPJ</label>
                        <input class="form-control"
                               id="documento"
                               name="documento"
                               type="text"
                               placeholder="Digite o cpf ou cpnj"
                               autocomplete="off"
                               required
                        >
                        @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-5 mb-3">
                        <label for="telefone">Telefone</label>
                        <input class="form-control"
                               id="telefone"
                               name="telefone"
                               maxlength="14"
                               type="tel"
                               placeholder="Digite o telefone"
                               autocomplete="off"
                               required
                        >
                        @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-5 mb-3">
                        <label for="email">Email</label>
                        <input class="form-control"
                               id="email"
                               name="email"
                               type="email"
                               placeholder="Digite o cpf ou cpnj"
                               autocomplete="off"
                               required
                        >
                        @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h4>Endereco</h4>
                    </div>

                        <div class="form-group col-sm-12 col-md-5 mb-3">
                            <label for="cep">CEP</label>
                            <input class="form-control"
                                   id="cep"
                                   name="cep"
                                   type="text"
                                   placeholder="Digite o CEP"
                                   autocomplete="off"
                                   required>
                            @error('cep')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group col-sm-12 col-md-5 mb-3">
                        <label for="cep">Numero</label>
                        <input class="form-control"
                               id="numero"
                               name="numero"
                               type="text"
                               placeholder="Digite o numero"
                               autocomplete="off"
                               required>
                        @error('cep')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                        <div class="form-group col-sm-12 col-md-5 mb-3">
                            <label for="rua">Logradouro</label>
                            <input class="form-control"
                                   id="rua"
                                   name="rua"
                                   type="text"
                                   placeholder="Digite o logradouro"
                                   autocomplete="off"
                                   required>
                        </div>

                        <div class="form-group col-sm-12 col-md-5 mb-3">
                            <label for="bairro">Bairro</label>
                            <input class="form-control"
                                   id="bairro"
                                   name="bairro"
                                   type="text"
                                   placeholder="Digite o bairro"
                                   readonly>
                        </div>

                        <div class="form-group col-sm-12 col-md-5 mb-3">
                            <label for="cidade">Cidade</label>
                            <input class="form-control"
                                   id="cidade"
                                   name="cidade"
                                   type="text"
                                   placeholder="Digite a cidade"
                                   autocomplete="off"
                                   required>
                        </div>

                        <div class="form-group col-sm-12 col-md-5 mb-3">
                            <label for="uf">Estado</label>
                            <select id="estado"
                                    name="estado"
                                    id="estado"
                                    class="form-select">
                                <option value="" selected disabled>Estado</option>
                                @foreach(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'] as $estado)
                                    <option value="{{ $estado }}" {{ old('uf') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div>

                </div>
                <button class="btn btn-dark">Salvar</button>
                <a href="{{ route('dashboard') }}" class="btn btn-dark">Voltar</a>
            </form>
        </div>
    </div>

</div>

<script>
    document.getElementById('cep').addEventListener('blur', function() {
        
        cep = this.value.replace(/\D/g, '');

        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('rua').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                    } else {
                        alert('CEP não encontrado. Verifique e tente novamente.');
                    }
                })
                .catch(error => console.error('Erro ao buscar o CEP:', error));
        } else {
            alert('CEP inválido! Digite um CEP com 8 números.');
        }
    });
</script>
</body>
</html>

