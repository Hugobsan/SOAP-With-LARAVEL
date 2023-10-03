## Aplicação SOAP Simples com Laravel
Esse repositório tem como objetivo hospedar um simples serviço SOAP implementado com o Framework Fullstack Laravel.

Ele implementa a soma de dois quatérnions, passados via parâmetro, retornando assim o quatérnion resultado da soma.

Um quatérnion é um número hipercomplexo que estende o conceito de número complexo.
Ele é um elemento de um espaço vetorial de dimensão 4 sobre os números reais. Possui parte escalar e parte vetorial, sendo a parte escalar um número real e a parte vetorial um vetor tridimensional de números complexos.

Sendo assim, um quatérnion é definido como:

```
x + yi + zj + wk
```

Onde x, y, z e w são números reais e i, j e k são números complexos.

Os quatérnions possuem aplicabilidade nas áreas de matemática, física, computação gráfica, entre outras.

## Requisitos
Para executar o projeto, é necessário ter instalado o PHP 8.1 ou superior, e o Composer.

## Instalação
Para instalar o projeto, basta clonar o repositório e executar o comando `composer install` na pasta raiz do projeto. Este comando irá instalar todas as dependências do projeto.

Será necessário criar o arquivo .env na raiz do projeto, para isso, basta copiar o arquivo .env.example e renomeá-lo para .env. Após isso, será necessário gerar uma nova chave para a aplicação, para isso, basta executar o comando `php artisan key:generate` na raiz do projeto.

## Execução
Para executar o projeto, basta executar o comando `php artisan serve` na raiz do projeto. Após isso, a aplicação estará disponível no endereço http://localhost:8000.

## Utilização
Para utilizar o serviço, basta enviar uma requisição POST com o Postman ou outro software de sua preferência para o endereço http://localhost:8000/sum. A requisição deve conter 2 parâmetros, sendo eles os 2 quatérnions a serem somados no formato:

```
    "quat1": "x, y, z, w",
    "quat2": "x, y, z, w
```

Onde x, y, z e w são números reais.

O Header da requisição deve conter o Content-Type como "text/xml; charset=utf-8";

O Body da requisição deve conter o seguinte conteúdo:

```
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Header>
    <!-- Cabeçalhos opcionais podem ser definidos aqui, se aplicável -->
  </soap:Header>
  <soap:Body>
    <sumQuaternions xmlns="http://127.0.0.1:8000/">
      <quat1>x,y,z,w</quat1>
      <quat2>x,y,z,w</quat2>
    </sumQuaternions>
  </soap:Body>
</soap:Envelope>
```

Onde x, y, z e w devem ser substituídos por números reais.
Na consumação da API, os daos do Body não influenciam, pois os quatérnions lidos são os que estão nos parâmetros da requisição. O Body é apenas para ilustrar o padrão para a requisição SOAP.

Após isso, espera-se uma resposta no formato de envelope de requisição SOAP. O resultado da soma estará no Body da resposta.

## Limitações
A aplicação não possui validação de dados, portanto, é necessário que os quatérnions sejam passados no formato correto, caso contrário, o resultado não será o esperado.

A aplicação não consome os parâmetros passado no corpo da requisição SOAP e sim os parâmetros da requisição POST, portanto, o corpo da requisição SOAP não influencia no resultado da soma.