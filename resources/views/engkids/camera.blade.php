@extends('/templates.master')
@section('content')


<div class="content-camera">
    <div class="content-main">
        <!-- <div>
            <img src="http://c1.staticflickr.com/9/8620/16412941287_6ed1e841a5_h.jpg">
            <div class="outFrame">
                <div class="frameTopBorder"></div>
                <div class="frameLeftBorder"></div>
            </div>
            <div class="midFrame">
                <div class="midFrameTopBorder"></div>
                <div class="midFrameLeftBorder"></div>
            </div>
        </div> -->
        <div class="content-left">
            <div class="shadow">
                <div class="box" id="webcam-container">
                    <button type="button" onclick="init()" class="button-start" id="button-start">Start</button>
                    <form action="{{route('engkid.search')}}" class="form-seach-detect" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="word" id="label-container" aria-describedby="helpId" placeholder="" value="" readonly>
                            <button class="button-search"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="content-bottom">
        <div>
            <p></p>
        </div>
    </div>
</div>
@endsection