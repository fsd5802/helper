 
    $(".save-data").click(function(event){
        event.preventDefault(); 
        var form = document.getElementById("commentform");
        var fd = new FormData(form);  
        $.ajax({
            url: "{{route('dashboard.ticket_comments.store')}}",
            type:"POST",
            data:fd,
            contentType: false,
            processData: false,
            success:function(response){
                if(response) {
                    $("#comment").val('');   
                }
            },
            error: function (xhr) {
                if (xhr.status == 422) { 
                    var allErrors = JSON.parse(xhr.responseText);
                    var commentError =  allErrors.errors['comment'];
                    if (commentError) { 
                        $("#comment").addClass('is-invalid');
                        $("#comment_error").removeClass('d-none');
                        $("#comment_error strong").text(commentError); 
                    }
                }
            }
        });
    });
     
 