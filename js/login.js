
function submitDataLogin(){
  $(document).ready(function(){
    var data = {
      name: $("#name").val(),
      user: $("#user").val(),
      pas: $("#pas").val(),
      action: $("#action").val(),
  };
  $.ajax({
      url: 'php/login.php',
      type: 'post',
      data: data,
      success:function(response){
        alert(response);
        create(response);
      }
    });  
  });


  function create(r){
    const r1 = JSON.parse(r);
    console.log(r1);
    localStorage.setItem('dataUser', r1[0].name)
    localStorage.setItem('dataAge', r1[0].age)
    localStorage.setItem('dataContact', r1[0].contactnumber)
    location.pathname = "/home.html"
  }
}