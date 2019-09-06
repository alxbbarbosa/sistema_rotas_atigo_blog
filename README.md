
# Sistema de Rotas MVC

Este é um sistema de rotas completo que pode ser compreendido como uma pequena parte de um Framework. O código foi desenvolvido nos 3 artigos do blog.
Ele lembra em alguns aspectos o funcionamento dos sistemas de rotas do Laravel.

## Getting Started

Você pode fazer o clone deste artigo, mas caso queira entender como foi construído e os detalhes de funcionamento, pode acompanhar o desenrolar do projeto no blog.
[PRIMEIRA PARTE](https://alexandrebbarbosa.wordpress.com/2019/04/17/phpconstruir-um-sistema-de-rotas-para-mvc-primeira-parte/)
[SEGUNDA PARTE](https://alexandrebbarbosa.wordpress.com/2019/04/19/phpconstruir-um-sistema-de-rotas-para-mvc-segunda-parte/)
[TERCEIRA PARTE](https://alexandrebbarbosa.wordpress.com/2019/04/23/phpconstruir-um-sistema-de-rotas-para-mvc-terceira-parte/)

A imagem transmite a ideia:

![](/roteamento_requsicao.png)

Neste desenho, o fluxo está completo, mas no artigo e neste repositório, não temos apenas última classe que gera o objeto de resposta. 

Tudo se inicia na requisição do usuário, então um objeto "request" é instanciado a para administrar esta requisição do usuário. Este objeto "request" é passado como argumento para o método resolve de um objeto "router", gerado pela classe de roteamento. O router conta com a sua coleção de rotas, que está contida em um objeto "route collection". Então, utilizando o seu próprio método find, "router" procura na sua "route collection" por um padrão que casa com a uri informada em "request". Route collection possui um método "where", que é usado pelo método find do "router". O método find espera por um objeto "route" e para isso, conta com ajuda de "route collection" para verificar em si mesmo através do método "where", se há algum padrão definido que case com a uri informada pelo "router". Se você se lembra, router coletou essa uri no objeto "request", que ele recebeu através do seu método resolve.

Assim, se verdadeiro, ou seja, a uri casou com um padrão em "route collection" é porque uma definição de rota mapeando para um método de um controller existe. Então "route collection" devolve um objeto "route" para o método find de "router", onde contem as informações de mapeamento da rota: controller, método, parâmetros. 

O "router" cumpre seu papel entregando "route" para o objeto Despachante "dispacher" tratar. Tudo isso porque, não é responsabilidade de router fazer esta etapa, mas "dispacher" existe para tratar esse assunto. Dispacher sabe como chegar nos controllers, como invovar os seus métodos e informar os argumentos exigido.

Os artigos cumprem bem o seu papel explicando até aqui todo processo e construção passo a passo. O percurso completo, como já mencionado acima, seria a implementação da resposta através de um objeto "response", mas este é um tema para outro momento. 

É claro que existem outras coisas necessárias a ser implementadas no router, como por exemplo: aplicar middlewares para permitir autenticação. Além disso, o objeto "request" é bem minimalista e não administra cabeçalhos, o que seria importante para permitir uma melhor manipulação da requisição. De toda forma, estes artigos lhe dão base para criar um bom sistema de rotas.

### Prerequisites

Você precisa ter instalado PHP 7.X. Além disso, o modo Rewrite precisa estar ativo no servidor web que você estiver utilizando. Se estiver utilizando Linux, muitas vezes o LAMP lhe apresentará todo ambiente perfeito com base no Apache2. No Windows, muitos costumam utilizar o XAMP. Todavia, não faz parte desde documento, apresentar as etapas de instalação de cada elemento do ambiente.


### Installing

Após baixar o código, se estiver compactado, extrai-os e coloque-os no diretório de sua preferencia para rodar com o servidor web embutido no php.

você deve estar certo de que o script esteja em um diretório que possa ser lido pelo servidor web local ou, que tenha permissões suficiente de acesso ao diretório para utilizar o servidor embutido do php. 
Em geral para se utilizar o servidor embutido, utiliza-se o seguinte comando no diretório do projeto:

```
php -S localhost:8080

```

Após inicia o servidor embutido, será possível invocar o programa no browser através de um endereço URL como:

```
http://localhost:8080

```

## Usage

Esteja atento que o ponto de partida do programa é script index.php no diretório public.

A definição das rotas devem ser feitas no arquivo route.php no diretório routes

```php

use Src\Route as Route;
Route::get('/', function(){
	echo "Página inicial";
});
Route::get(['set' => '/cliente', 'as' => 'clientes.index'], 'Controller@index');
Route::get(['set' => '/cliente/{id}/show', 'as' => 'clientes.show'], 'Controller@show');
Route::delete(['set' => 'cliente/delete', 'as' => 'clientes.delete'], 'Controller@teste');

```

Um controller exemplo foi criado no diretório app, a fim de exemplificar o roteamento.




## Authors

* **Alexandre Bezerra Barbosa** - *Initial work* - [Exemplos MVC](https://github.com/alxbbarbosa)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
