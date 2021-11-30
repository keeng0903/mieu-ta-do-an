@extends('engkids.layout')
@section('content1')
<section id="contact">
    <div class="section-content">
        <h1 class="section-header"> <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Translate</span> your text</h1>
        @if(!empty(Session()->get('user')))
            <h3>Hello <b><?php echo Session()->get('name_user') ?></b></h3>
        @else
        <h3>Write and click <b>TRANSLATE</b></h3>
        @endif
    </div>
    <div class="contact-section">
        <div class="container">
            <form>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for ="from"> From</label>
                        <input type="hidden" id="user_id" value="<?php echo Session()->get('user_id') ?>">
                        <select name="from" id="input-language" autofocus>
                            @foreach($option_languages as $option_language)
                            <option value="{{$option_language->type}}">{{ucfirst($option_language->name)}}</option>
                            @endforeach
                        </select> </div>
                    <div class="form-group">

                        <textarea name="original"  class="form-control" id="original" placeholder="Enter Your Text"></textarea>
                        <div id="result_search"></div>
                    </div>
                    @if(!empty(Session()->get('user')))
                        <div class="form-group">
                            <button type="button" id="btn-hide-history" class="btn btn-default submit" style="display: none"><i class="fa"
                                                                                                     aria-hidden="true"></i>Ẩn
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-history" class="btn btn-default submit"><i class="fa"
                                                                                                     aria-hidden="true"></i>Lịch
                                sử
                            </button>
                        </div>
                    @endif
                    <br><br><br>
                    <div class="form-group" id="show-language" style="display: none">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="from" id="output_lang" disabled>
                            <option value="en">Tiếng Anh</option>
                        </select>
                    </div>@csrf
                    <div class="form-group">
                        <textarea name="translated" class="form-control" id="translated" readonly
                                  placeholder="Translated text will be here"></textarea>
                    </div>
                    <div class="form-group" >
                        <button type="button" class="btn btn-default submit" style="display: none" id="btn-hide-details"><i class="fa" aria-hidden="true"></i>Ẩn</button>
                    </div>
                    <div class="form-group" >
                        <button type="button" class="btn btn-default submit" id="btn-details"><i class="fa" aria-hidden="true"></i>Chi tiết</button>
                    </div>
                    <br><br><br>
                    <div class="form-group" id="lang_details" style="padding: 5px;">

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
        $('#output_lang').focus()

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
                        var translated = query;
                        var type_output = $('#output_lang').val();
                        var type_input = $('#input-language').val();
                        $.ajax({
                            url: "{{ route('home.input_translated') }}",
                            method: "GET",
                            data: {translated: translated,type_output: type_output, type_input: type_input},
                            success: function (data_translated) {
                                $('#translated').fadeIn();
                                $('#translated').html(data_translated);
                            }
                        });
                    }
                });
            }else{
                $('#result_search').hide();
                // document.querySelector('#translated').value = '';
            }
        });
        $('#output_lang').focus()
        $('#user_id').focus()

        $(document).on('click', 'li', 'a', function () {
            $('#original').val($(this).text());
            $('#result_search').fadeOut();
            var translated = $(this).text();
            var type_output = $('#output_lang').val();
            var type_input = $('#input-language').val();
            var user_id = $('#user_id').val()

            $.ajax({
                url: "{{ route('home.translated') }}",
                method: "GET",
                data: {translated: translated,type_output: type_output, type_input: type_input},
                success: function (data_translated) {
                    $('#translated').fadeIn();
                    $('#translated').html(data_translated);
                    if (user_id) {
                        $.ajax({
                            url: "{{ route('home.insert_history') }}",
                            method: "GET",
                            data: {type_input: type_input,translated: translated},
                            success: function (data_history) {
                                $.ajax({
                                    url: "{{ route('home.histories') }}",
                                    method: "GET",
                                    data: {user_id: user_id},
                                    success: function (data_translated) {
                                        if ($("#show-language").is(":display") == true){
                                            $('#show-language').fadeIn();
                                            $('#show-language').html(data_translated);
                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });
        });

        $('#translated').focus()

        $('#btn-details').on('click', function () {
            var lang_translated = $('#translated').val();
            var type_output = $('#output_lang').val();
            if (lang_translated) {
                $('#btn-details').hide();
                $('#btn-hide-details').show();
                $.ajax({
                    url: "{{ route('home.lang_details') }}",
                    method: "GET",
                    data: {lang_translated: lang_translated, type_output: type_output},
                    success: function (data_translated) {
                        $('#lang_details').fadeIn();
                        $('#lang_details').html(data_translated);
                    }
                });
            }
        });
        $('#btn-hide-details').on('click', function () {
            $('#btn-details').show();
            $('#btn-hide-details').hide();
            $('#lang_details').hide();
        });

        $('#btn-history').on('click', function () {
            $('#btn-history').hide();
            $('#btn-hide-history').show();
            var user_id = $('#user_id').val();
            $.ajax({
                url: "{{ route('home.histories') }}",
                method: "GET",
                data: {user_id: user_id},
                success: function (data_translated) {
                    $('#show-language').fadeIn();
                    $('#show-language').html(data_translated);
                }
            });
        });

        $('#btn-hide-history').on('click', function () {
            $('#btn-history').show();
            $('#btn-hide-history').hide();
            $('#show-language').hide()
        });
    });
</script>
@endsection

