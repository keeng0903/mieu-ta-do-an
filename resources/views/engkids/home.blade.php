@extends('/templates.master')
@section('content')

@if(isset($_SESSION['home']) && count(array($_SESSION['home'])) > 0)
<div class="content-home">
    <div class="content-infor">
        <div class="container-fuild content-container">
            <div class="row">
                <div class="col-12 engkids-mean">
                    <h2 class="mb-4">
                        What is EngKids?
                    </h2>
                </div>
                <div class="col-6 engkids-mean-left">
                    <img src="{{asset('asset/image/logo2.png')}}" alt="">
                </div>
                <div class="col-6 engkids-mean-right">
                    <div class="engkids-mean-right-set-width">
                        <h4 class="mt-5">Engkids is an English learning application </h4>
                        <p class="my-3 decription-small">#Vietnamese apps / TCP</p>
                        <p class="decription">
                            Engkids is an English learning application, the idea of ​​Vietnamese people. The application was established and operated in 2021 to serve the needs of people to learn English. Vocabulary problems will be solved through typing search words, identifying
                            objects around you. The idea of object recognition is to overcome forgetting vocabulary, making it easier for users.
                        </p>
                    </div>
                </div>

                <!-- <div class="col-12 mt-5 pt-5">
                    <h5>EngKids' contributions</h5>
                </div> -->
                <div class="col-6 contributions-left">
                    <div class="contributions-left-img">
                        <img src="{{asset('asset/image/vocabulary.png')}}" alt="">
                        <p class="text-vocabulary">
                            Vocabulary <span style="color: red">100000 +</span>
                        </p>
                    </div>
                </div>
                <div class="col-6 decription-word-vocabulary">

                </div>
                <div class="col-6 contributions-left">
                    <div class="contributions-left-img">
                        <img src="{{asset('asset/image/detection.png')}}" alt="">
                        <p class="text-vocabulary">
                            Object recognition <br><span style="color: red">over 90% accuracy </span>
                        </p>
                    </div>
                </div>
                <div class="col-6 decription-word-detect">
                    <p>object recognition results in better user experience, making it easier and more convenient to search for words. Just a few simple steps, put an object in front of the camera, the word you need to search will appear</p></div>
                <div class="col-12 mt-5 pt-5">
                    <h5>Engkids' object recognition</h5>
                </div>
                <div class="col-4 detection-decription-left">
                    <div class="image-detection">
                        <img src="{{asset('asset/image/detection.png')}}" alt="">
                    </div>
                </div>

                <div class="col-4 detection-decription-center">
                    <div class="blue-btn">
                        <a class="first-link" href="{{ route('engkid.camera')}}">
                            Get Started
                        </a>
                        <a href="{{ route('engkid.camera')}}">
                            Try now
                        </a>
                    </div>
                </div>
                <div class="col-4 detection-decription-right">
                    <div class="image-decription">
                        <img src="{{asset('asset/image/detection-decription1.png')}}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif
@endsection
