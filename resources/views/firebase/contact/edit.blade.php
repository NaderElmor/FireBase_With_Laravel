@extends('firebase.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Contact List 
                            <a href="/contacts" class="btn btn-sm btn-danger float-end">Back</a>

                        </h4>
                    </div>
                    <div class="card-body">
                               <form action="{{ url('update-contact/'. $key) }}" method="POST">
                                   @csrf
                                   @method('PUT')

                                   <div class="form-group mb-3">
                                       <label for="name">Name</label>
                                       <input type="text" name="name" value="{{ $editData['name'] }}" class="form-control">
                                   </div> 
                                   
                                   <div class="form-group mb-3">
                                       <label for="email">Email</label>
                                       <input type="email" name="email" value="{{ $editData['email'] }}" class="form-control">
                                   </div>  
                                   
                                   <div class="form-group mb-3">
                                       <label for="phone">Phone</label>
                                       <input type="tel" name="phone" value="{{ $editData['phone'] }}" class="form-control">
                                   </div>
                                   
                                   <div class="form-group mb-3">
                                       <button type="submit" class="btn btn-sm btn-success">Update</button>
                                   </div>
                               </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection