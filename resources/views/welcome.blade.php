@extends('layout.app')

@section('content')
<div id="msgSuccess" class="alert alert-info"></div>
<div id="msgErrors" class="alert alert-danger"></div>
<form id="msgForm">
        @csrf
      <div class="form-group">
        <label>name</label>
        <input type="text" class="form-control" name="name" placeholder="name">
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" rows="5" name="msg" placeholder="Message"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('scripts')
<script>
    $('#msgSuccess').hide()
    $('#msgErrors').hide()
    $('#msgForm').submit(function(e){
        e.preventDefault()
        $('#msgSuccess').hide()
        $('#msgErrors').hide()
        $('#msgErrors').empty()
        let msgData = new FormData($('#msgForm')[0])
        $.ajax({
            type: "POST",
            url: "{{route('messageSend')}}",
            data: msgData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#msgSuccess').show()
                $('#msgSuccess').text(data.success)
                //console.log(data.success);
            },
            error: function (xhr,status,error) {
                $('#msgErrors').show()
                $.each(xhr.responseJSON.errors,function(key,item){
                    $('#msgErrors').append("<p class='mb-0'>"+item+"</p>")
                });    
            }
        });
        
        // console.log(msgData.get('msg'));

    })
</script>
@endsection