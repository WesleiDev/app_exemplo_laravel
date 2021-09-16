# App Laravel
<h3>Aplicação desenvolvida em Laraval 8</h3>

<h4>Recursos utilizados</h4>
   - [x] Queues
   - [x] Resources
   - [x] Seeder
   - [x] Factory
   - [x] Mutators
   - [x] Casts
   - [x] Observers
   - [x] FormRequest


<h4>Instruções para utilização da plataforma.</h4>   

<p>Clone o repositório, acesse o repositório e execute os seguinte comandos  </p>

```composer install```
</br>
```php artisan migrate```
</br>
```php artisan db:seed``` (Opcional para criar alguns registros para testes)
</br>
```php artisan serve```
</br>
```php artisan queue:work```

<p><b>**Necessário realizar configuração do email e banco de dados no aquivo .env**</b></p>

<h4>Funcionalides e regras da plataforma</h4>
<p>Foi desenvolvido o CRUD completo referente aos Models BOLO e INTERESSADO.
Sempre que for adicionar um interessado é necessário informar o ID do bolo que esse interessado vai ser adicinoado.
Após a inclusão de um novo interessado, o sistema vai verificar se existe uma quantidade disponível para o bolo informado e se possuir, será enviado um 
email informando a disponibilidade do bolo. Se alterar a quantidade do bolo de 0 para uma quantidade maior que zero,
o sistema também vai verificar a lista de interessados e disparar o email. E sempre que enviar o email, remove o interessado
da lista de interessados (É feito uma espécie de exclusão lógica para manter o histórico e caso necessário é possível adicionar 
esse mesmo interessado novamente a lista para receber o email novamente quando houver disponibilidade do produto ). Todo esse processo 
é realizado através de fila</p>



