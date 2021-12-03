@extends('firebase.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Contact List
                            <a href="{{ url('add-contact') }}" class="btn btn-sm btn-primary float-end">Add Contact</a>
                        </h4>
                    </div>
                    <div class="card-body">
                               <form action="{{ url('add-contact') }}" method="POST">
                                   @csrf

                                   <div class="form-group mb-3">
                                       <label for="name">Name</label>
                                       <input type="text" name="name" class="form-control">
                                   </div> 
                                   
                                   <div class="form-group mb-3">
                                       <label for="email">Email</label>
                                       <input type="email" name="email" class="form-control">
                                   </div>  
                                   
                                   <div class="form-group mb-3">
                                       <label for="phone">Phone</label>
                                       <input type="tel" name="phone" class="form-control">
                                   </div>
                                   
                                   <div class="form-group mb-3">
                                       <button type="submit" class="btn btn-sm btn-success">Save</button>
                                   </div>
                               </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection