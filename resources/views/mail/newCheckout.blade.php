@component('mail::message')

    <h1 style="text-align: center">Informações sobre o pedido: <span
        style="color: #d85e02">{{$checkout->id}}</span>
        </h1>
@component('mail::subcopy')

@endcomponent
<div style="font-family: inherit; text-align: inherit">
<strong>Olá {{$user->name}}</strong>
</div>
<div
style="font-family: inherit; text-align: inherit">
O seu pedido {{$checkout->id}} foi realizado com sucesso!

</div>
<h3 style="text-align: center">Status: <strong>{{$checkout->status}}</strong></h3>


@component('mail::table')
| Produtos       | Qtd    | Valor  | SubTotal  |
| ------------- |:--------:| :------:|--------:|
@foreach ($checkoutProducts as $item)
| {{($prod = $item->product)->name}} | {{$item->quant}}  | {{$prod->value}}   | {{$item->subtotal}}   |
@endforeach
| | | Total: | {{$checkout->value_total}}|
@endcomponent

@component('mail::button',['url'=> route('checkouts.getCheckout',['checkout'=>$checkout->id])])
Acompanhe seu pedido
@endcomponent

@endcomponent
