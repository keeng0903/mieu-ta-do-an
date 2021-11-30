@extends('engkids.layout')
@section('content1')


<div class="content-camera">
    <div class="content-main">
        <div class="content-left">
            <div class="shadow" style="height: 300px">
                <div class="box" id="webcam-container">
                    <button type="button" onclick="init()" class="button-start" id="button-start">Start</button>
                    <form action="" class="form-seach-detect" method="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="word" id="label-container" aria-describedby="helpId" placeholder="" value="" readonly>
                            <button class="button-search" value="submit"><i class="fas fa-search"></i></button>
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
