    @extends('layouts/master')
    @section('title','Admin Dashboard')
    @section('content') 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('category.create') }}" class="btn btn-md btn-success mb-3">ADD CATEGORY</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Parent Category</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($category as $row)
                                <tr>
                                    <td>{{ $row->category_name }}</td>
                                    <td>{!! $row->parent_category !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Are you sure ?');" action="{{ route('category.destroy', $row->id) }}" method="POST">
                                            <a href="{{ route('category.edit', $row->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">REMOVE</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data category belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{-- {{ $categorys->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@endsection
</html>