    @extends('layouts/master')
    @section('title','Admin Dashboard')
    @section('content') 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('item.create') }}" class="btn btn-md btn-success mb-3">ADD ITEM</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($item as $row)
                                <tr>
                                    <td>{{ $row->item_name }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>{{ $row->category_name }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Are you sure ?');" action="{{ route('item.destroy', $row->id) }}" method="POST">
                                            <a href="{{ route('item.edit', $row->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">REMOVE</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data item Nothing.
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