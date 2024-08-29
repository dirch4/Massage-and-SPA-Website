@if ($errors->any())
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: '@foreach ($errors->all() as $error){{ $error }} <br> @endforeach'
              });
            });
          </script>
 @endif
@if (Session::has('pesan'))
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'success',
                title: '{{ Session::get('pesan') }}'
              }); 
            });
          </script>
 @endif


