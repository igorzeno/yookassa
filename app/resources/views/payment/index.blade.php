@section('content')
    <h1>Текущий баланс</h1>
    <div>
    @if(cache()->has('balance')) {{ cache()->get('balance')}} @else 0 @endif
    </div>
    <br>
    <h1>Пополнить баланс</h1>
    <br>
    <form method="POST" action="{{ route('payment.create') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Сумма платежа</label>
            <input type="number" name="amount" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Описание платежа</label>
            <textarea class="form-control" type="text" name="description"  rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
    </form>
    <br><br>
    <h1>Список транзакций</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Сумма</th>
            <th scope="col">Описание</th>
            <th scope="col">Статус</th>
            <th scope="col">Дата</th>
        </tr>
        </thead>
        <tbody>
        @forelse($transactions as $transaction)
            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{$transaction->amount}}</td>
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->status}}</td>
                <td>{{$transaction->created_at}}</td>
            </tr>
        @empty
            Транз нет
        @endforelse

        </tbody>
    </table>
    <br>


