<div class="wrapper">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>

<script>    
function modelDelete(id, title){   
    Swal.fire({
      title: '{{__("messages.delete")}}',
      text: '{{__("messages.confirm_delete")}} '+title+'?',
      type: "warning",
      buttons: true,
      dangerMode: true,
      confirmButtonText: '{{__("messages.confirm")}}',
      cancelButtonText: '{{__("messages.cancel")}}',      
      showCancelButton: true,
      reverseButtons: true
    }).then((result) =>{
        if(result.value){
          $.ajax({                
            url: window.location.origin + window.location.pathname + '/delete/' + id,
            type: "GET",
            success: function(){
              Swal.fire({
                title: '{{__("messages.deleted")}}', 
                text: '{{__("messages.success_delete")}}', 
                type: "success"
                }).then(() => {
                    document.location.reload(true);
                });
            },
            error: function(error){              
              Swal.fire(
                '{{__("messages.oops")}}',
                '{{__("messages.error_delete")}}',
                'error');
            },
          });
        }
    });
}

function modelRestore(id, title){  
  console.log(window.location.origin + window.location.pathname + '/restore/' + id);
    Swal.fire({
      title: '{{__("messages.restore")}}',
      text: '{{__("messages.confirm_restore")}} '+title+'?',
      type: "warning",
      buttons: true,
      dangerMode: true,
      confirmButtonText: '{{__("messages.confirm")}}',
      cancelButtonText: '{{__("messages.cancel")}}',      
      showCancelButton: true,
      reverseButtons: true
    }).then((result) =>{
        if(result.value){
          $.ajax({                
            url: window.location.origin + window.location.pathname + '/restore/' + id,
            type: "GET",
            success: function(){
              Swal.fire({
                title: '{{__("messages.restored")}}', 
                text: '{{__("messages.success_restore")}}', 
                type: "success"
                }).then(() => {
                    document.location.reload(true);
                });
            },
            error: function(error){              
              Swal.fire(
                '{{__("messages.oops")}}',
                '{{__("messages.error_restore")}}',
                'error');
            },
          });
        }
    });
}
</script>