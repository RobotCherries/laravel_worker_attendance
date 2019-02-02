window.onload = function() {

    // Functions dropdown - dependend on department
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

                        $('select[name="function_id"]').append(`<option value=${key}>${key} - ${value}</option>`);

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

    // Date hired - date picker
    // console.log('connected');
    // $('input[name="date_hired"]').datepicker();
}