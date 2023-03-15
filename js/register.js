  function submitData(){
    $(document).ready(function(){
      var data = {
        name: $("#name").val(),
        user: $("#user").val(),
        pas: $("#pas").val(),
        contact: $("#contact").val(),
        action: $("#action").val()
      };
      console.log($("#contact").val());
      localStorage.setItem('user',$("#user").val())                                                                                                             

      $.ajax({
        url: 'php/register.php',
        type: 'post',
        data: data,
        success:function(response){
          // alert(response);
          if(response == "Login Successful"){
            window.location.pathname = "/project1/home.html";
          }
        }
      });
    });
  }

