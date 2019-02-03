window.onload = function() {
    // Functions dropdown - dependend on department
    $('select[name="department"]').on('change', function(){
        var departmentId = $(this).val();
        if(departmentId) {
            $.ajax({
                url: '/functions/get/'+ departmentId,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="function"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="function"]').append(`<option value=${key}>${key} - ${value}</option>`);
                    });
                },
            });
        } else {
            $('select[name="function"]').empty();
        }
    });
}