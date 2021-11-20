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

                        <select name="from" id="input-language">
                            @foreach($option_languages as $option_language)
                            <option value="{{$option_language->type}}">{{ucfirst($option_language->name)}}</option>
                            @endforeach
                        </select> </div>
                    <div class="form-group">

                        <textarea name="original"  class="form-control" id="original" placeholder="Enter Your Text"></textarea>
                        <div id="result_search"></div>
                    </div>
                    @csrf
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for ="from"> From</label>

                        <select name="from" id="output-language">
                            @foreach($option_languages as $option_language)
                                <option value="{{$option_language->type}}">{{ucfirst($option_language->name)}}</option>
                            @endforeach
                        </select> </div>
                    <div class="form-group">
                        <textarea name="translated"  class="form-control" id="translated" placeholder="Translated text will be here"></textarea>
                    </div>
                    <div>

                        <button type="button" class="btn btn-default submit"><i class="fa fa-globe" aria-hidden="true"></i>   translate</button>
                    </div>

                </div>
            </form>
        </div></div>
</section>
<script>
    $(document).ready(function () {

        $('#original').keyup(function () {
            var type
            $('#input-language').change(function() {
                type = this.value;
            });
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('home.result_search') }}",
                    method: "GET",
                    data: {query: query, type: type, _token: _token},
                    success: function (data) {
                        $('#result_search').fadeIn();
                        $('#result_search').html(data);
                    }
                });
            }
        });


        $(document).on('click', 'li', 'a', function () {
            $('#original').val($(this).text());
            $('#result_search').fadeOut();
            var translated = $(this).text();
            $.ajax({
                url: "{{ route('home.translated') }}",
                method: "GET",
                data: {translated: translated},
                success: function (data_translated) {
                    $('#translated').fadeIn();
                    $('#translated').html(data_translated);
                }
            });
        });

    });
</script>
@endsection

