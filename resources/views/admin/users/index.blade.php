@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Users</div>

                        <div class="card-body">

                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">User Name</th>
                                  <th scope="col">Full Name</th>
                                  <th scope="col">address</th>
                                  <th scope="col">mobile no</th>
                                  <th scope="col">D.O.B</th>
                                  <th scope="col">Gender</th>
                                  <th scope="col">Bloodtype</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Roles</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach ($users  as  $user)
                                     <tr>
                                          <th scope="row">{{ $user->id }}</th>
                                          <td>{{$user->user_name}}</td>
                                          <td>{{$user->full_name}}</td>
                                          <td>{{$user->address}}</td>
                                          <td>{{$user->mobile_no}}</td>
                                          <td>{{$user->date_of_birth}}</td>
                                          <td>{{$user->gender}}</td>
                                          <td>{{$user->bloodt_type}}</td>
                                          <td>{{$user->email}}</td>
                                          <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}} </td>
                                         <td>

                                             @can('edit-users')
                                             <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-outline-primary float-left mr-2">Edit</button></a>
                                             @endcan

                                             <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                                 @csrf
                                                 {{ method_field('DELETE') }}
                                                 <button type="submit" class="btn btn-outline-danger float-left">Delete</button>
                                             </form>

                                         </td>
                                     </tr>
                                 @endforeach


                              </tbody>
                            </table>

                        </div>
                    </div>
        </div>
    </div>

</div>

@endsection
