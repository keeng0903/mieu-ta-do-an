@extends('/templates.master')
@section('content')


<div class="content-search">
    <div class="content-main">
        @if ($output->count()  > 0)
            @foreach($output as $hehe)
            <h1>{{$hehe->word}}</h1>
            <p class="custom-content">{!!$hehe->content!!}</p>
            @endforeach
        @else
        <h1 class="custom-notfound mb-5"><i class="fas fa-exclamation-circle"></i> Vocabulary not found</h1>
        @endif



        <table class="table-vocabulary">
            <thead>
                <th>Related Vocabulary</th>
            </thead>
            <tbody>
                @foreach($output1 as $hehe1)
                <tr>
                    <td>
                        <a href="{{ route('engkid.detail',['id' => $hehe1->id]) }}">
                            <p>{{$hehe1->word}}</p>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection