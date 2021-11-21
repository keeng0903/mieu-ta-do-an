@extends('engkids.layout')
@section('content1')
<section id="contact">
    <div class="section-content">
        <h1 class="section-header"> <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Translate</span> your text</h1>
        <h3>Write and click <b>TRANSLATE</b></h3>
    </div>
    <div class="contact-section">
        <div class="container">
            <form>
                <div class="col-md-6 form-line">
                    <div class="form-group">
                        <label for ="from"> From</label>

                        <select name="from" id="input-language" autofocus>
                            @foreach($option_languages as $option_language)
                            <option value="{{$option_language->type}}">{{ucfirst($option_language->name)}}</option>
                            @endforeach
                        </select> </div>
                    <div class="form-group">

                        <textarea name="original"  class="form-control" id="original" placeholder="Enter Your Text"></textarea>
                        <div id="result_search"></div>
                    </div>
                    <br><br><br>
                    <div class="form-group" style="border: 1px solid;padding: 5px;">
                        <div class="form-control">
                            <h4 style="float: left">LỊCH SỬ</h4>
                        </div>
                        <div class="form-control">
                            <h4 style="float: left">Bản dịch từ : <i>Run</i></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="from" id="output_lang" disabled>
                            <option value="en">Tiếng Anh</option>
                        </select>
                    </div>@csrf
                    <div class="form-group">
                        <textarea name="translated" class="form-control" id="translated"
                                  placeholder="Translated text will be here"></textarea>
                    </div>
                    <div class="form-group" >
                        <button type="button" class="btn btn-default submit"><i class="fa" aria-hidden="true"></i>Chi tiết</button>
                    </div>
                    <br><br><br>
                    <div class="form-group" style="border: 1px solid;padding: 5px;">
                        <div class="form-control">
                            <h4 style="float: left">Bản dịch từ : <i>Run</i></h4>
                        </div>
                        <div class="form-control" style="display: table">
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                            <a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a><p class="button-result">,</p><a href="" class="button-result"><p>hello</p></a>
                        </div>
                        <div class="form-control" style="display: table">
                            <h4>DAnh từ : </h4>
                            <p class="text-color"> Chạy</p>
                            <i class="text-color">sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</i>
                        </div>
                    </div>
                </div>
            </form>
        </div></div>
</section>
<script>
    $(document).ready(function () {
        $('#input-language').change(function () {
            var type_language = $('#input-language').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('home.output_lang') }}",
                method: "GET",
                data: {type_language: type_language,_token: _token},
                success: function (data) {
                    $('#output_lang').html(data);
                }
            })
        })
        $('#input-language').focus()

        $('#original').keyup(function () {
            var type = $('#input-language').val();
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('home.result_search') }}",
                    method: "GET",
                    data: {query: query,type: type, _token: _token},
                    success: function (data) {
                        $('#result_search').fadeIn();
                        $('#result_search').html(data);
                    }
                });
            }
        });
        $('#output_lang').focus()

        $(document).on('click', 'li', 'a', function () {
            $('#original').val($(this).text());
            $('#result_search').fadeOut();
            var translated = $(this).text();
            var type_output = $('#output_lang').val();
            var type_input = $('#input-language').val();
            $.ajax({
                url: "{{ route('home.translated') }}",
                method: "GET",
                data: {translated: translated,type_output: type_output, type_input: type_input},
                success: function (data_translated) {
                    $('#translated').fadeIn();
                    $('#translated').html(data_translated);
                }
            });
        });

    });
</script>
@endsection

