<h1>Jobs</h1>
<div id="lista_jobos">
	@foreach($jobs as $job)

	<a href="{{ route('jobs.show', ['job' => $job->id]) }}" class="item_jobo">
		<div class="logo_emp">
			<img src="{{$job->logo}}" onerror="this.src='/images/logop.png'" alt="Imagem indisponivel !">
		</div>

		<div class="evt_status" style="background-color:{{$job->color}}">
			{{$job->status}}
		</div>

		<div class="desc_jobo">
			<table>
				<tr>
					<td>Preço:</td>
					<td>{{$job->price}}</td>
				</tr>
				<tr>
					<td>Transport:</td>
					<td>{{$job->transport}}</td>
				</tr>

				<tr>
					<td>Tax:</td>
					<td>{{$job->tax}}</td>
				</tr>
                <tr>
					<td>final_price:</td>
					<td>{{$job->final_price}}</td>
				</tr>
                <tr>
					<td>start_time:</td>
					<td>{{$job->start_time}}</td>
				</tr>
                <tr>
					<td>end_time:</td>
					<td>{{$job->end_time}}</td>
				</tr>
                <tr>
					<td>status:</td>
					<td>{{$job->status}}</td>
				</tr>
                <tr>
					<td>observation:</td>
					<td>{{$job->observation}}</td>
				</tr>
            </table>
        </div>
    </a>
	@endforeach
</div>