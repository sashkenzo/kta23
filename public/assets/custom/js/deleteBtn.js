    $(document).ready(function(){
    $.ajax.Setup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click','.delete-item',function(event){
        event.preventDefault()

        let deleteUrl =$(this).attr('href');
            $.ajax({
                type:'DELETE',
                url: deleteUrl,
                    success: function (data){
                        console.log(data);
                    },
                    error: function (xhr,status,error){
                        console.log(error);
                    }
            })
        })
}
