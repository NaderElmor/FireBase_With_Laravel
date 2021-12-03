@extends('firebase.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h4 class="alert alert-warning mb-2">{{ session('status') }}</h4>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Contact List <sup>{{ $totalContacts }}</sup>
                            <a href="{{ url('add-contact') }}" class="btn btn-sm btn-primary float-end">Add Contact</a>
                        </h4>
                    </div>
                    <div class="card-body">
                               <table class="table table-bordered table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    @php $i=1 @endphp
                                    @forelse ($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $contact['name'] }}</td>
                                            <td>{{ $contact['email'] }}</td>
                                            <td>{{ $contact['phone'] }}</td>
                                            <td><a href="{{ url('edit-contact/'. $key) }}" class="btn btn-sm btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ url('delete-contact/'. $key) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>                                               
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse                                   
                               </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection