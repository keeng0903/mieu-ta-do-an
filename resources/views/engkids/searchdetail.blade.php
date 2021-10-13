@extends('/templates.master')
@section('content')


<div class="content-search">
    <div class="content-main">
            <h1>{{$vocabulary->word}}</h1>
            <p class="custom-content">{!!$vocabulary->content!!}</p>

        <table class="table-vocabulary">
            <thead>
                <th>Related Vocabulary</th>
            </thead>
            <tbody>
                @foreach($vocabulary1 as $hehe1)
                <tr>
                    <td>
                        <a href="{{ route('engkid.detail',['id' => $hehe1->id]) }}">
                            <p>{{$hehe1->word}}</p></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection