@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    @sharedAlerts

    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-5">
            <div class="card bg-light text-dark border-0">

                <div class="row">
                    <div class="col-lg-5 col-sm-7 col-7 col-md-7">
                        <h5 class="p-3"> New Message</h5>
                    </div>

                    <div class="col-lg-7 col-md-5 col-sm-5 col-5">
                        <div class="row">
                            <div class="col-5">
                                <a href="/create/message" class="btn btn-block btn-outline-secondary mt-3" style="border-radius: 50px;"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col-5">
                                <a href="/messages" class="btn btn-block btn-outline-secondary mt-3" style="border-radius: 50px;"><i class="fas fa-users"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-2">
                	<form method="POST" style="width: 100%;">
                		@csrf
	                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 m-auto">

	                        <div class="input-group mb-3">
							  	<select class="people-select form-control" name="to_user_id" required>	
								</select>
							</div>
	                    </div>

	                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 m-auto">

	                        <div class="input-group mb-3">
							  	<textarea name="message" class="form-control" rows="10" required></textarea>
							</div>
	                    </div>

	                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 m-auto">

	                        <button type="submit" class="btn btn-info" style="width: 100%;"> Send</button>
	                    </div>
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            $('.people-select').select2({
                placeholder: "Send to",
                allowClear: true
            });
        });



        $(document).ready(function(){
            $( ".people-select" ).select2({
                ajax: { 
                    url: {{ route('message.users') }},
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endsection
