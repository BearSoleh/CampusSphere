@extends('layouts.admin')

@section('content')
 
    <div class="container-fluid  ">
        <h1 p-5 bg-primary text-white text-center>User</h1>
         
      </div>

      <div class="container-fluid">
         
        
        
        <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>Name</th> 
              <th>Email </th>
              <th>Role </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td> 
              <td>{{ $user->email }}</td> 
              <td>{{ $user->roles->role }}</td>
            </tr>


            
            @endforeach 
          </tbody>
        </table>


          
      </div>
 
@endsection
