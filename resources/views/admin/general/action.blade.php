<div class="btn-group" role="group">
        {{--Edit Button--}}
        <a class="btn btn-xs mr-1 pr-2" href="{{ route($params['route'].'.edit',$params['id']) }}">
            <i class="fas fa-edit"></i>
        </a>
        {{--Delete Button--}}
        <a class="btn btn-xs " href="javascript:;"
           onclick="confirmation('delete-{{$params['id']}}')">
            <i class="fas fa-trash"></i>
            {!! Form::open(['route' => [$params['route'].'.destroy',$params['id']], 'method' => 'delete', 'id'=>'delete-'.$params['id']]) !!}
            {!! Form::close() !!}
        </a>
</div>
<script type="text/javascript">
    function confirmation(formId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Do It!"
        }).then(function(result) {
            if (result.value) {
                document.getElementById(formId).submit();
                Swal.fire(
                    "Done!",
                    "Your action has been completed.",
                    "success"
                )
            }
        });
    };
</script>
