window.onload = function() {
    // Functions dropdown - dependend on department
    $('select[name="department"]').on('change', function(){
        var departmentId = $(this).val();
        if(departmentId) {
            $.ajax({
                url: `${window.location.pathname}/functions/get/${departmentId}`,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="function"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="function"]').append(`<option value=${key}>${value}</option>`);

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="function"]').empty();
        }
    });
}