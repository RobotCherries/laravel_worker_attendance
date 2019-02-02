window.onload = function() {
    console.log('connected');
    $('select[name="department_id"]').on('change', function(){
        var departmentId = $(this).val();
        if(departmentId) {
            $.ajax({
                url: '/functions/get/'+ departmentId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="function_id"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="function_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="function_id"]').empty();
        }

    });
}